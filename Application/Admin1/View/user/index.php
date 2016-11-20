<extend name="./master" />

<block name="content">

    <div class="alert alert-info" role="alert">
        用户列表
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="danger">
                    <th>编号</th>
                    <th>状态</th>
                    <th>昵称</th>
                    <th>魅力值</th>
                    <th>头像</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>经期</td>
                    <td>美女</td>
                    <td>20</td>
                    <td>
                        <img src="" alt="">
                    </td>
                    <td>
                        <a class="inner_btn warning_btn" href="">小黑屋</a>
                        <a class="inner_btn danger_btn" href="">删除</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</block>