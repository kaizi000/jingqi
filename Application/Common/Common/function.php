<?php

/**
 * 递归无限级分类组合一维数组
 * @return [type] [description]
 */
function level($cate, $pid = 0, $lv = 0){
	$arr = array();
	// static $arr = array();
	foreach($cate as $v){
		if($v['pid'] == $pid){
			$v['level'] = $lv;
			$v['_cname'] = $v['cname'];
			for ($i=0; $i < $v['level']; $i++) {
				$v['_cname'] = '|———'.$v['_cname'];
			}
			$arr[] = $v;

			$arr = array_merge($arr, level($cate, $v['cid'], $lv + 1));
			//打开与static $arr = array();对应使用(两种方式)
			// level($cate, $v['cid'], $lv + 1);
		}

	}
	return $arr;
}


/**
 * 传递一个父级ID返回所有子级ID
 */
function get_childs_id($cate, $pid){
	$arr = array();
	foreach($cate as $v){
		if($v['pid'] == $pid){
			$arr[] = $v['cid'];
			$arr = array_merge($arr, get_childs_id($cate, $v['cid']));
		}
	}
	return $arr;
}



