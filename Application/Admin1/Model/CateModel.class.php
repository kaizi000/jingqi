<?php namespace Admin\Model;

use Think\Model;
/**
* 类型模型
*/
class CateModel extends Model
{
	protected $tableName = 'cate';

	protected $_validate = array(
			// array(array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]))
			array('cname','require','分类名不能为空',self::MUST_VALIDATE,'regex',self::MODEL_BOTH),
		);


	/**
	 * 增加和修改方法
	 * @return [type] [description]
	 */
	public function store($cid)
	{
		if ($this ->create()){

			$action = $cid ? 'save' : 'add';

			$this ->$action();

			return true;
		}

		return false;
		// p($this ->data);die;

	}

	/**
	 * 编辑获得旧数据方法
	 * @param  [type] $cid [description]
	 * @return [type]      [description]
	 */
	public function edit($cid)
	{
		// echo "string";die;
		//获得当前级别下的所有子级
        $cidArr = get_childs_id($this ->select(), $cid);
        $cidArr[] = $cid;

// $cateData = level($cate);
        $map['cid'] = array('not in',$cidArr);
        // p($map['cid']);die;
        $noSelfSon =  level($this ->where($map) ->select());
        // p($noSelfSon);die;
       return $noSelfSon;
	}


}
