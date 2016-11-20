<?php
return array(
	//'配置项'=>'配置值'

	//数据库配置信息
	// 数据库类型
	'DB_TYPE' => 'mysql',
	// 服务器地址
	'DB_HOST' => '127.0.0.1',
	// 数据库名
	'DB_NAME' => 'jq_app',
	// 用户名
	'DB_USER' => 'root',
	// 密码
	'DB_PWD' => '',
	// 端口
	// 'DB_PORT' => 80,
	// 数据库表前缀
	'DB_PREFIX' => '',
	// 字符集
	'DB_CHARSET'=> 'utf8',
	// 数据库调试模式 开启后可以记录SQL日志
	// 'DB_DEBUG' => TRUE,
// THINK_PATH . 'Tpl/dispatch_jump.tpl'
	//成功提示模板

	/* 错误页面模板 */
	 // 默认错误跳转对应的模板文件
	'TMPL_ACTION_ERROR'     =>  MODULE_PATH.'View/Public/error.html',
	 // 默认成功跳转对应的模板文件
	'TMPL_ACTION_SUCCESS'   =>  MODULE_PATH.'View/Public/success.html',
	// 异常页面的模板文件
	'TMPL_EXCEPTION_FILE'   =>  MODULE_PATH.'View/Public/exception.html',

);