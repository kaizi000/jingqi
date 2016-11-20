<?php namespace Admin\Model;

use Think\Model;

/**
* 标签模型
*/
class TagModel extends Model
{
	protected $tableName = 'tag';
	protected $_validate = array(
			array('tname','require','标签名不能为空',self::MUST_VALIDATE,'regex',self::MODEL_BOTH),
			//新增是判断唯一性
			array('tname','require','标签名已存在',self::MUST_VALIDATE,'unique',self::MODEL_BOTH),
		);
	//修改写入tid
	// protected $updateFields = 'tname';
	//添加时不要tid字段，只要tname
	 protected $insertFields = array('tname');

	/**
	 * 增加和修改
	 * 黑科技|IT|VR|AR|火爆|激情
	 * @return [type] [description]
	 */
	public function store($tid)
	{
		if ($this ->create()) {
			// p($this ->data);
			// echo $tid;die;
			if ($tid) {//修改(只修改当前，不多个添加)
				$this ->save();
			} else {
				//增加
				$arr = array();
				$arr = explode('|',$this->data['tname']);
				foreach ($arr as $v) {
					$data['tname'] = $v;
					$this ->add($data);
				}
			}

			return true;
		}
		return false;
	}


}