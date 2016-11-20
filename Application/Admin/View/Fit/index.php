<extend name="./master" />
<block name="content">
    <table class="table table-bordered table-striped">
        <colgroup>
            <col class="col-xs-1">
            <col class="col-xs-3">
            <col class="col-xs-3">
            <col class="col-xs-1">
            <col class="col-xs-1">
        </colgroup>
        <thead>
        <tr>
            <th>编号</th>
            <th>宜内容</th>
            <th>忌内容</th>
            <th>所属提示</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <foreach name='fitData' item='v'>
            <tr>
                <td>{$v.fitid}</td>
                <td>
                    {$v.fit_con}
                </td>
                <td>
                    {$v.unfit_con}
                </td>
                <td>
                    <switch name="v.fit_tipid">
                        <case value="1"><code>吃</code></case>
                        <case value="2"><code>睡</code></case>
                        <case value="3"><code>动</code></case>
                        <case value="4"><code>护</code></case>
                    </switch>
                </td>
            <td>
                <div class="btn-group">
                    <a href="" role="button" class="btn btn-warning btn-xs">修改<a/>
                    <a href="" role="button" class="btn btn-danger btn-xs">删除<a/>
                </div>
            </td>
        </foreach>
        </tbody>
    </table>
</block>
