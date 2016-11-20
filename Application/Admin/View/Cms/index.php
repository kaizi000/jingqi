<extend name="./master" />
<block name="content">
    <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
            <input type="text" class="form-control" name="">
        </div>
        <button type="submit" class="btn btn-default">搜索</button>
    </form>
    <table class="table table-bordered table-striped">
<!--        <colgroup>-->
<!--            <col class="col-xs-1">-->
<!--            <col class="col-xs-1">-->
<!--            <col class="col-xs-3">-->
<!--            <col class="col-xs-2">-->
<!--            <col class="col-xs-2">-->
<!--        </colgroup>-->
        <thead>
        <tr>
            <th>编号</th>
            <th>文章标题</th>
            <th>所属分类</th>
            <th>url</th>
            <th>点赞</th>
            <th>评论</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
            <foreach name="artData" item="v">
                <tr>
                    <td>{$v.art_aid}</td>
                    <td>{$v.art_title}</td>
                    <td>{$v.cname}</td>
                    <?php
                        $param = json_decode($v['param'],true);
                    ?>
                    <td>
                        <a href="{$param['url']}" target="_blank">{$param['url']}</a>
                    </td>
                    <td>{$v.art_click}</td>
                    <td>{$v.art_comment}</td>
                    <td>
                        <div class="btn-group">
                            <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">操作 <span class="caret"></span></button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="" role="button" class="btn btn-warning">修改</a></li>
                                <li class="divider"></li>
                                <li><a href="javascript:;" onclick="del({$v.art_aid},'{$v.art_title}')" role="button" class="btn btn-danger">删除</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </foreach>
        </tbody>
    </table>
    <script>
        function del(id,name)
        {
            var obj = util.modal({
                title:'确认删除？',//标题
                content:'删除<<'+name+'>>这篇文章吗？',//内容
                footer:'<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button><button type="button" class="btn btn-danger confirm" data-dismiss="modal">确定</button>',//底部
                width:600,//宽度
                events:{
                    confirm:function(){
                        //哪个元素上有.confirm类，被点击就执行这个回调
                        location.href = "{:U('del')}" + '&id=' + id;
                    }
                }
            });
            //显示模态框
            obj.modal('show');
        }
    </script>
</block>
