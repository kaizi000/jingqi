<extend name='./master'/>

<block name='content'>
    <link href="__PUBLIC__/info/iconfont.css" rel="stylesheet" type="text/css" media="all">
    <div class="alert alert-info" role="alert">
        添加屏蔽词
    </div>
    <section>
        <form action="" method ="post">
            <ul class="ulColumn2">
                <li>
                    <span class="item_name">屏蔽词：</span>
                    <textarea placeholder="多个标签添加用|隔开" class="textarea" name="sh_name"></textarea>
                </li>

                <li>
                    <span class="item_name"></span>
                    <input type="submit" class="link_btn"/>
                </li>
            </ul>
        </form>
    </section>
</block>