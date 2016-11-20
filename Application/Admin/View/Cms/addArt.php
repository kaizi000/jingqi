<extend name="./master" />
<block name="content">
    <form class="form-horizontal" id="form" onsubmit="return add()" action="" method="post">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">文章管理</h3>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">文章标题</label>
                    <div class="col-sm-9">
                        <input type="text" name="art_title" required class="form-control" placeholder="请填写文章标题">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">文章缩略图</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="text" class="form-control" name="art_thumb" readonly="" value="">
                            <div class="input-group-btn">
                                <button onclick="upImage(this)" class="btn btn-default" type="button">选择图片
                                </button>
                            </div>
                        </div>

                        <div class="input-group" style="margin-top:5px;">
                            <img src="__PUBLIC__/admin/images/nopic.jpg" class="img-responsive img-thumbnail liebiaotu" width="150">
                        </div>
                        <span class="help-block">建议大小(130×130)</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">文章分类</label>
                    <div class="col-sm-9">
                        <select class="js-example-basic-single form-control" name="cid">
                            <option value="0">请选择分类</option>
                            <foreach name="cateData" item="v">
                                <option value="{$v.cid}">{$v._cname}</option>
                            </foreach>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for=""  class="col-sm-2 control-label">文章摘要</label>
                    <div class="col-sm-9">
                        <textarea id="container1" style="height:300px;width:100%;" name="art_desc"></textarea>
                        <script>
                            util.ueditor('container1', {hash:2,data:'hd1'}, function (editor) {
                                //这是回调函数 editor是百度编辑器实例
                            });
                        </script>
                    </div>
                </div>

                <div class="form-group">
                    <label for=""  class="col-sm-2 control-label">文章内容</label>
                    <div class="col-sm-9">
                        <textarea id="container" style="height:300px;width:100%;" name="art_content"></textarea>
                        <script>
                            util.ueditor('container', {hash:2,data:'hd'}, function (editor) {
                                //这是回调函数 editor是百度编辑器实例
                            });
                        </script>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">文章url(选填)</label>
                    <div class="col-sm-9">
                        <input type="text" name="art_url" class="form-control" placeholder="请填写文章url">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">文章排序(选填)</label>
                    <div class="col-sm-9">
                        <input type="number" name="art_sort" min="0" class="form-control" placeholder="请填写分类排序">
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
                    $("[name='art_thumb']").val(images[0]);
                    $(".img-thumbnail").attr('src', images[0]);
                }, options)
            });
        }
       /* //移除图片 
        function removeImg(obj) {
            $(obj).prev('img').attr('src', 'resource/images/nopic.jpg');
            $(obj).parent().prev().find('input').val('');
        }*/
        //表单提交添加
        function add()
        {
            var data = $('#form').serialize();
            $.post("{:U('addArt')}",data,function(res){

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
