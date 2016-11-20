<extend name="./master" />
<block name="content">
    <form class="form-horizontal" id="form" action="" method="post" onsubmit="return store()">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">分类管理</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">分类名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="cname" required class="form-control" placeholder="请填写分类名称">
                    </div>
                </div>
<!--                <div class="form-group">-->
<!--                    <label for="" class="col-sm-2 control-label">分类排序</label>-->
<!--                    <div class="col-sm-9">-->
<!--                        <input type="number" name="sort" min="0" required class="form-control" placeholder="请填写分类排序">-->
<!--                    </div>-->
<!--                </div>-->
            </div>
            <script>


                function store()
                {
                    var data = $('#form').serialize();
                    $.post("{:U('addCate')}",data,function(res){
                        if(res.status)
                        {
                            util.message(res.info,"{:U('index')}",'success');
                        }
                        util.message(res.info,'','添加失败');
                    },"json")
                    return false;
                }
            </script>
        </div>
        <button class="btn btn-primary" type="submit">确定</button>

    </form>


</block>
