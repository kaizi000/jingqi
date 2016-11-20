<?php namespace Jingqi\Controller\embody;

class RecordDetail{

    //月经
    /*public function crampDetail()
    {
        $row = I('get.row',0);
        $uid = 507;
        //限制数量
        $limits = 80;

        //本次数据
        //获取本次经期数据
        $curObj = ( new Record() ) ->curTime('507');
        //获取本次经期对应的开始时间
//        $curStartTime =  $curObj['curSatrtTime'];

        $curReid = $curObj['curReid'];
//        echo $curReid;
        //上一次的结束时间，下一条数据
        $preLateTime = M('jq_record') ->where('reid < '.$curReid .' AND uid = '.$uid) ->order('cramp_start DESC')
            ->limit(1) ->getField('cramp_start');

//        echo $preLateTime;

        for($i=0;$i<8;$i++){
            if(is_null($preLateTime)){
                break;
            }

            //在最近时间-7天统计
            $endTime = $preLateTime - 7*24*60*60*60;

            //查询条件
            $map['uid'] = 507;
            $map['cramp_start'] = ['between',"$endTime,$preLateTime"];

            //获取满足条件的数据
            $ifData = M('jq_record') ->where($map) ->order('cramp_start DESC') ->select();

            //获取本次结束的reid
            $minId = $ifData[count($ifData) -1]['reid'];
            echo $minId;
            //下一次经期结束时间
            $nextTime = M('jq_record') ->where('reid < '.$minId)->order('cramp_start DESC') ->getField('cramp_start');
echo $nextTime;
            $preLateTime = $nextTime;

//            $crampData[] =
            pp($ifData);
        }
    }*/


    public function crampDetail()
    {
        $conts = M('menstrual_period') ->where('uid = 507') ->count('uid');

        pp($conts);
    }

    //心情详情
    public function moodDetail()
    {
        $uid = 507;
        $moodData = M('jq_record')->where('uid = '.$uid) ->field('reid,mood_num,mood,re_time') ->select();

        echo json_encode($moodData);

//        pp($moodData);
    }

    //睡眠
    public function sleepDetail()
    {

        $uid = 507;
        $sleepData = M('jq_record')->where('uid = '.$uid) ->field('reid,sleep_end,mood,sleep_start,re_time') ->select();

        /*foreach ($sleepData as $k => $v) {
            $sleepData[$k]['sleep_leng'] = ($v['sleep_end'] - $v['sleep_start'])/(60*60*60);
        }*/

        pp($sleepData);
//        echo json_encode($moodData);
    }


    //美颜生活
    public function beautyDetail()
    {
//        phpinfo();
        $uid = 507;
        //获取当前年月
        $startTiem = strtotime(date('Y-m'));
        //默认本月的心情
        $endTiem = time();
        $beautyData = M('jq_record')->where('uid = '.$uid .' AND re_time between '.$startTiem.' AND '.$endTiem ) ->field('reid,beauty,re_time') ->select();
//        pp($beautyData);
        //统计数组
        $checkData = array_column($beautyData, 'beauty');
        //
        $countData = each_count($checkData);

        //年月压入
        $countData['y_m'] =  date('Y-m');

        echo json_encode($countData);

//        pp($countData);
    }


    //身体症状
    //可能会调整
    public function bodyDetail()
    {
        $uid = 507;

        $bodyData = M('jq_record')->where('uid = '.$uid ) ->getField('re_time,bodys');
        $bodyData = data_exp($bodyData);
        pp($bodyData);
    }


    //爱爱

    public function loveDetail()
    {
        $uid = 507;
        $loveData = M('jq_record') ->where('uid = '.$uid) ->field('make_love,love_protect,re_time') ->select();

        pp($loveData);
    }

    //体重
    public function weightDetail()
    {
        $uid = 507;

        $weightData = M('jq_record') ->where('uid = '.$uid) ->field('weight,total_weight,re_time') ->select();

//        pp($weightData);

        foreach ($weightData as $k =>$v) {
            //用户初次记录的变化
            if(!isset($weightData[$k-1])){
                $weightData[$k]['weight_change'] = $weightData[$k]['weight'];
            }
            $weightData[$k]['weight_change'] = $weightData[$k]['weight'] - $weightData[$k-1]['weight'];
        }

        echo json_encode($weightData);
//        pp($weightData);

    }





}