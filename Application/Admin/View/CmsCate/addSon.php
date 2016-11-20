<extend name="./master" />
<block name="content">
    <form class="form-horizontal" id="form" action="" method="post" onsubmit="return addSon()">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">子类添加</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">子类名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="cname" required class="form-control" placeholder="请填写子类名称">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">所属分类</label>
                    <div class="col-sm-9">
                        <select class="js-example-basic-single form-control" name="tid">
                            <option value="{$cateData.cid}">{$cateData.cname}</option>
                        </select>
                    </div>
                </div>

            </div>
        </div>
        <input type="hidden" name="pid" value="{$cateData.cid}">

        <button class="btn btn-primary" type="submit">确定</button>
    </form>

    <script>
        function addSon()
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

</block>