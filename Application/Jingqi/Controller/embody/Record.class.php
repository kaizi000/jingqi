<?php namespace Jingqi\Controller\embody;

class Record extends GetToken{


    public function upRecord()
    {
        $cramp_date = I('get.cramp_date');
    }

    //处理记录页上传数据的接口
    public function reurl()
    {
       $data = [
           'mood' =>'www.baidu.com',
           'beauty' =>'www.baidu.com',
           'sleep' =>'www.baidu.com',
           'weight' =>'www.baidu.com',
           'love' =>'www.baidu.com',
       ];

        $status = I('get.status');

        if(!in_array($status,[1,2,3])){
            return;
        }

        switch($status){
            case 1:
                $data['cramp'] = 'www.baidu.com';
                $data['bodys'] = 'www.baidu.com';
                break;
            case 2:
                $data['cramp'] = 'www.baidu.com';
                $data['bodys'] = 'www.baidu.com';
                $data['tiwen'] = 'www.baidu.com';
                break;
            case 3:
                $data['tiwen'] = 'www.baidu.com';
                $data['yunzhen'] = 'www.baidu.com';
                break;
        }

        json_encode($data);

    }


    //请求接口
    public function handle()
    {
        //获取最近结束时间

        $stage = 1;
        //最近30条记录

        switch(true){
            case $stage == 1:
                $allData = M('menstrual_diary')
                    ->field('mood,mood_num,sleep_start,sleep_end,bodys,tong_')
                    ->where('uid = 507')
                    ->order('diary_date desc')
                    ->limit(30)->select();
                break;
            case $stage == 2:
                $allData = M('menstrual_diary')
                    ->field('mood,mood_num,sleep_start,sleep_end,bodys,ti_wen')
                    ->where('uid = 507')
                    ->order('diary_date desc')
                    ->limit(30)->select();
                break;
            case $stage == 3:
                $allData = M('menstrual_diary')
                    ->field('mood,mood_num,sleep_start,sleep_end,yunzheng,ti_wen')
                    ->where('uid = 507')
                    ->order('diary_date desc')
                    ->limit(30)->select();
                break;
        }

        //睡眠

        $hour = array_column($allData,'sleep_start');

        //爱爱
        $love = array_column($allData,'sleep_start');


        pp($allData);


        foreach ($allData as $k =>$v){
            //睡眠
            $hour[] = date('H',$v['sleep_start']);
            //爱爱
            $love[] = $v['make_love'];
            //体重
            $weight[] = $v['weight'];
            //身体症状
            $bodys[] = $v['bodys'];
            //备孕
            if(I('get.status') == 2){
                //体温
                $tiwen[] = $v['tiwen'];
            }elseif(I('get.status') == 3){//怀孕
                //体温
                $tiwen[] = $v['tiwen'];
                //孕症
                $yunzhen[] = $v['yunzheng'];
            }
        }
/*
        //体温
//        $minTiwen = isset(min($tiwen)) ? min($tiwen) : '';*/

        /*switch(true){
            case $stage == 1:
                $data['cramp'] =  $this ->cramp();
                $data['bodys'] = $this ->bodyIll($bodys);

                break;
            case $stage == 2:
                $data['cramp'] =  $this ->cramp();
                $data['bodys'] = $this ->bodyIll($bodys);
                $data['ti_wen'] = $this ->bodyIll($bodys);
                break;
            case $stage == 3:

                $data['yunzheng'] = $this ->bodyIll($bodys);
                $data['ti_wen'] = $this ->bodyIll($bodys);
                break;
        }*/




        echo json_encode(
             [
                //睡眠时间
                'sleep' =>$this ->sleep($hour),
                //爱爱
                'love' =>avg_sum($love),
                //体重
                'weight' =>[
                    'late_weight' =>$weight['0'],
                    'avg_weight' =>avg_sum($weight)
                ],
                //身体症状
                'bodys' =>$this ->bodyIll($bodys),


                //经期

                'cramp' => $this ->cramp(),
                //心情
                'mood_num' => M('menstrual_diary') ->where('uid = 507 AND mood_num != 0') ->order('re_time desc,up_time desc') ->limit(7) ->avg('mood_num'),
            ]
        );
    }

    public function cramp()
    {

//        $stage = I('get.stage');
        $stage = 1;

        $data = M('menstrual_period')
                ->field('start_time,end_time,cycle,day,real_endtime,real_cycle,ti_zhong,')
                ->where("uid = 507 AND stage=$stage")
                ->order('start_time DESC')
                ->limit(3)
                ->select();

        //开始时间
        $startTime = $data[count($data)-1]['start_time'];

        //结束时间

        $endTime = $data[0]['real_endtime'] ? $data[0]['real_endtime'] : $data[0]['end_time'];

//        $endTime =

        $periodData = M('menstrual_diary')
            ->field('diary_date,jing_liang')
            ->where("uid = 507 AND diary_date BETWEEN $startTime AND $endTime")
            ->select();

//        echo date('Y-m-d H:i:s',$startTime).'<+>'.date('Y-m-d H:i:s',$endTime).'<+>'.date('Y-m-d H:i:s',1392912000);
//        echo date('Y-m-d H:i:s',1392220800).'<+>'.date('Y-m-d H:i:s',1395072000);
//        ,ti_zhong,tong_fang,mood,sleep_start,sleep_end,mood_num,beauty,bodys
        /*switch(true){
            case $stage == 1 || $stage == 2:
                $periodData = M('menstrual_diary')
                                ->field('diary_date,jing_liang')
                                ->where("uid = 507 AND diary_date BETWEEN $startTime AND $endTime")
                                ->select();
                break;
            case $stage == 3 :
                $periodData = M('menstrual_diary')
                                ->field('diary_date,ti_zhong,tong_fang,mood,sleep_start,sleep_end,mood_num,ti_wen,yunzheng')
                                ->where("uid = 507 AND diary_date = $endTime")
                                ->select();
                break;
        }*/

        //用户设置的经期
        $jqLeng = array_column($data, 'day');
        //真正周期
        $zqLeng = array_column($data, 'real_cycle');
        //计算姨妈量
        $jqNum = array_column($periodData, 'jing_liang');


        //如果记录的统计小于周期的统计，取用户设置的经期长度，姨妈量用统计的数据的均值
        //平均经期
        $jqLeng = count($periodData) < count($data) ? avg_sum($jqLeng) : count($periodData)/count($data);
        //平均姨妈量
        $jqNum = avg_sum($jqNum);

        //平均周期
        $zqLeng = avg_sum($zqLeng);

        echo $jqLeng.'--'.$jqNum.'--'.$zqLeng;

        pp($periodData,0);
        pp($data);

    }


    //睡眠
    private function sleep($hour)
    {
        $num = 0;
        foreach ($hour as $v) {
            //晚于23:00
            if($v >= 23){
                $num +=1;
            }
        }
        //比值
        return $avgHour = $num/count($hour);
    }

    //身体症状或孕期症状
    private function bodyIll($bodys)
    {
       /* pp($bodys,0);

        //症状全部转为数组
        foreach ($bodys as $k =>$v) {
            $bodys[$k] = explode(',',$v);
            foreach ($bodys[$k] as $vv) {
                $ills[] = $vv;
            }
        }
        //症状统计
        $illData = array_count_values($ills);*/
        $illData = each_count($bodys);
        //top症状次数
        $topNum = max($illData);
        //top症状
        $topIll = array_search($topNum,$illData);

        return [
            'top_num' =>$topNum,
            'top_ill' =>$topIll,
        ];
    }








}