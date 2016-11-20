<extend name="./master" />

<block name="content">

	<div class="alert alert-info" role="alert">
        温馨提示
    </div>
	 <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <colgroup>
                <col class="col-xs-1">
                <col class="col-xs-3">
                <col class="col-xs-1">
                <col class="col-xs-1">
                <col class="col-xs-2">
            </colgroup>
            <thead>
            <tr class="danger">
                <th>编号</th>
                <th>标题</th>
                <th>更新时间</th>
                <th>发布时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <foreach name='artData' item='v'>
            <tr>
                <td>
                    {$v['aid']}
                </td>
                <td><code>{$v['title']}</code></td>
                <td>{$v['uptime'] | date="Y-m-d",###}</td>
                <td>{$v['sendtime'] | date="Y-m-d",###}</td>
                <td>
                    <a class="inner_btn danger_btn" href="{:U('del',array('aid'=>$v['aid']))}">删除</a>
                    <a class="inner_btn warning_btn" href="{:U('add',array('aid'=>$v['aid']))}">编辑</a>
                </td>
            </tr>
        </foreach>

            </tbody>
        </table>
    </div>
</block>
