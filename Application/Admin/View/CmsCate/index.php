<extend name="./master" />
<block name="content">
    <form action="" method="post">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-hover">
                    <colgroup>
                        <col class="col-xs-1">
                        <col class="col-xs-4">
                        <col class="col-xs-4">
                    </colgroup>
                    <thead>
                    <tr >
                        <th>分类编号</th>
                        <th>分类名称</th>
<!--                        <th style="text-align: left">分类排序</th>-->
                        <th >操作</th>
                    </tr>
                    </thead>
                    <tbody>
                        <foreach name="CmsCate" key="k" item="v">
                            <tr >
                                <td >{$v['cid']}</td>
                                <td>{$v['_cname']}</td>
                                <td >
                                    <div class="btn-group">
                                        <a href="{:U('addSon',['cid'=>$v['cid']])}" class="btn btn-primary btn-sm">添加子分类</a>
                                        <a href="" role="button" class="btn btn-warning btn-sm">修改<a/>
                                        <a href="javascript:;" onclick="del({$v['cid']},'{$v.cname}')" role="button" class="btn btn-danger btn-sm">删除<a/>
                                    </div>
                                </td>
                            </tr>
                        </foreach>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
    <script>
        function del(cid,cname)
        {
            var obj = util.modal({
                title:'确认删除？',//标题
                content:cname,//内容
                footer:'<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button><button type="button" class="btn btn-danger confirm" data-dismiss="modal">确定</button>',//底部
                width:600,//宽度
                events:{
                    confirm:function(){
                        //哪个元素上有.confirm类，被点击就执行这个回调
                        location.href = "{:U('del')}" + '&cid=' + cid;
                    }
                }
            });
            //显示模态框
            obj.modal('show');
        }
    </script>
</block>
