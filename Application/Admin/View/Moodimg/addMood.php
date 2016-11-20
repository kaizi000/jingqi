<extend name="./master" />
<block name="content">
    <form class="form-horizontal" id="form" onsubmit="return add()" action="" method="post">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">心情管理</h3>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">心情名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="mood_name" class="form-control" placeholder="请填写心情名称">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">心情图片</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="text" class="form-control" name="pic" readonly="" value="">
                            <div class="input-group-btn">
                                <button onclick="upImage(this)" class="btn btn-default" type="button">选择图片
                                </button>
                            </div>
                        </div>

                        <div class="input-group" style="margin-top:5px;">
                            <img src="__PUBLIC__/admin/images/nopic.jpg" class="img-responsive img-thumbnail liebiaotu" width="150">
                        </div>
                        <span class="help-block">建议大小(宽100高100)</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for=""  class="col-sm-2 control-label">心情描述</label>
                    <div class="col-sm-9">
                        <textarea id="container" style="height:300px;width:100%;" name="mood_desc"></textarea>
                        <script>
                            util.ueditor('container', {hash:2,data:'hd'}, function (editor) {
                                //这是回调函数 editor是百度编辑器实例
                            });
                        </script>
                    </div>
                </div>

            </div>
        </div>
        <button class="btn btn-primary" type="submit">确定</button>
    </form>
    <script>
        //上传图片
        function upImage(obj) {
            require(['util'], function (util) {
                options = {
                    multiple: false,//是否允许多图上传
                    data:'',
                    hash:1
                    //hash为确定上传文件标识（可以以用户编号，标识为此用户上传的文件，系统使用这个字段值来显示文件列表），data为数据表中的data字段值，开发者根据业务需要自行添加
                };
                util.image(function (images) {             //上传成功的图片，数组类型 
                    $("[name='pic']").val(images[0]);
                    $(".img-thumbnail").attr('src', images[0]);
                }, options)
            });
        }
        //移除图片 
        function removeImg(obj) {
            $(obj).prev('img').attr('src', 'resource/images/nopic.jpg');
            $(obj).parent().prev().find('input').val('');
        }
        //表单提交添加
        function add()
        {
            var data = $('#form').serialize();
            $.post("{:U('addMood')}",data,function(res){
//                                    alert(1);
//                                    console.log(res);
                /*if(res.valid)
                 {
                 util.message(res.message,"{:U('index')}",'success');
                 }
                 util.message(res.message,'','error');*/
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


