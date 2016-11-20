<extend name="./master" />
<block name="content">
    <form class="form-horizontal" id="form" onsubmit="return add()" action="" method="post">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">采集节点管理</h3>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">采集名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="node_title" required class="form-control" placeholder="请填写采集名称">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">目标网址</label>
                    <div class="col-sm-9">
                        <input type="text" name="web_url" required class="form-control" placeholder="http://www.~~">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">文章标题</label>
                    <div class="col-sm-9">
                        <input type="text" name="art_title" required class="form-control" placeholder="请填写文章标题">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">开始标签</label>
                    <div class="col-sm-9">
                        <input type="text" name="sta_lab" required class="form-control" placeholder="请填写内容开始标签">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">结束标签</label>
                    <div class="col-sm-9">
                        <input type="text" name="end_lab" required class="form-control" placeholder="请填写内容结束标签">
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">确定</button>
    </form>
    <script>
        //表单提交添加
        function add()
        {
            var data = $('#form').serialize();
            $.post("{:U('addNode')}",data,function(res){

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