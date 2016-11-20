<?php
return array(
	//'配置项'=>'配置值'

	//模板文件后缀名配置
	'TMPL_TEMPLATE_SUFFIX'=>'.php',
	//Auth配置
    'AUTH_CONFIG' => array(
        // 用户组数据表名
        'AUTH_GROUP' => 't_group',
        // 用户-用户组关系表
        'AUTH_GROUP_ACCESS' => 't_gro_access',
        // 权限规则表
        'AUTH_RULE' => 't_rule',
        // 用户信息表
        'AUTH_USER' => 'user',
    ),
    //超级管理组
    // 'ADMIN_AUTH_KEY' =>'Admin',


    /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'bdm252851163.my3w.com', // 服务器地址
    'DB_NAME'               =>  'bdm252851163_db',          // 数据库名
    'DB_USER'               =>  'bdm252851163',      // 用户名
    'DB_PWD'                =>  'gaokao567',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  '',    // 数据库表前缀
    'DB_PARAMS'          	=>  array(), // 数据库连接参数
    'DB_DEBUG'  			=>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    'DB_DEPLOY_TYPE'        =>  0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'DB_RW_SEPARATE'        =>  false,       // 数据库读写是否分离 主从式有效
    'DB_MASTER_NUM'         =>  1, // 读写分离后 主服务器数量
    'DB_SLAVE_NO'           =>  '', // 指定从服务器序号
    //数据库表明不区分大小写
    'DB_PARAMS'    =>      array(
        \PDO::ATTR_CASE => \PDO::CASE_NATURAL
    ),

    //url模式改为兼容
    'URL_MODEL'             =>  3,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
    // 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式
    'URL_CASE_INSENSITIVE' =>true,


    //缓存设置
    'DATA_CACHE_PREFIX' => 'jq',

);