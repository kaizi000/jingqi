<extend name="./master" />
<block name="content">
    <table class="table table-bordered table-striped">
        <colgroup>
            <col class="col-xs-1">
            <col class="col-xs-1">
            <col class="col-xs-3">
            <col class="col-xs-2">
            <col class="col-xs-2">
        </colgroup>
        <thead>
        <tr>
            <th>编号</th>
            <th>心情标题</th>
            <th>心情描述</th>
            <th>心情图</th>
<!--            <th>记录</th>-->
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <foreach name='moodData' item='v'>
            <tr>
                <td>{$v.mid}</td>
                <td>
                    {$v.mood_name}
                </td>
                <td>
                    {$v.mood_desc|html_entity_decode}
                </td>
                <td>
                    <img src="{$v.pic}" alt="" style="width:100px;">
                </td>
            <td>
                <div class="btn-group">
                    <a href="" role="button" class="btn btn-warning">修改<a/>
                    <a href="" role="button" class="btn btn-danger">删除<a/>
                </div>
            </td>
        </foreach>
        </tbody>
    </table>
</block>
