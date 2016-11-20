<extend name="./master" />

<block name="content">
    <div class="alert alert-info" role="alert">
        屏蔽词列表
    </div>
    <table class="table">
        <colgroup>
            <col class="col-xs-1">
<!--            <col class="col-xs-4">-->
            <col class="col-xs-4">
        </colgroup>
        <!-- <thead> -->
        <tr class="danger">
            <th>编号</th>
            <th>屏蔽词</th>
        </tr>
        <!-- </thead> -->
        <tbody>
            <foreach name='shield' item='v'>
                <tr>
                    <td>{$v['sh_id']}</td>
                    <td>{$v['sh_name']}</td>
                </tr>
            </foreach>
        </tbody>
    </table>

</block>