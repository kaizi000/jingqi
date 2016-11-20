<extend name="./master" />
<block name="content">
    <form class="form-horizontal" id="form" action="" method="post">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">贴士管理</h3>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">贴士分类</label>
                    <div class="col-sm-9">
                        <select class="js-example-basic-single form-control" name="fit_tipid">
                            <option value="0">请选择</option>
                            <option value="1">吃</option>
                            <option value="2">睡</option>
                            <option value="3">动</option>
                            <option value="4">护</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">宜的内容</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" rows="3" name="fit_con"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">忌的内容</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" rows="3" name="unfit_con"></textarea>
                    </div>
                </div>

            </div>
        </div>
        <button class="btn btn-primary" type="submit">确定</button>
        <input type="hidden" name="__TOKEN__" value="">
    </form>
</block>
