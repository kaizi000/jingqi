<?php namespace System\Controller;

use Org\Upload\Upload;
use Think\Controller;
class ComponentController  extends Controller{
	//上传图片webuploader
	public function uploader() {

		$upModel = new Upload();
//		print_r(111);die;
//		$file = Upload::path( \Config::get( 'upload.path' ) . '/' . date( 'Y/m/d' ) )->make();
		$file = $upModel ->make();
		/*$file = 'upload/'.date('Y/m/d');

		is_dir( $file ) && ! mkdir( $file, 0755, TRUE );*/

		if ( $file ) {
			$data = [
				'name'       => $file[0]['name'],
				'filename'   => $file[0]['filename'],
				'path'       => $file[0]['path'],
				'extension'  => strtolower( $file[0]['ext'] ),
				'createtime' => time(),
				'size'       => $file[0]['size'],
				'data'       => I( 'post.data', '' ),
				'hash'       => I( 'post.hash', '' )
			];
			M( 'core_attachment' )->add( $data );
//			ajax( [ 'valid' => 1, 'message' => $file[0]['path'] ] );

			$this->ajaxReturn( [ 'valid' => 1, 'message' => $file[0]['path'] ] );
//			$data['status'] = 1; $data['content'] = 'content'; $this->ajaxReturn($data);
//			$this->ajaxReturn($data);
		} else {
//			ajax( [ 'valid' => 0, 'message' => \Upload::getError() ] );
			$this->ajaxReturn( [ 'valid' => 0, 'message' => $upModel ->getError() ] );
		}
	}

	//获取文件列表webuploader
	public function filesLists() {
//		$count = M( 'core_attachment' )
//		           ->where( 'hash', I( 'post.hash', '' ) )
//		           ->whereIn( 'extension', explode( ',', strtolower( $_POST['extensions'] ) ) )
//		           ->count();

		$map['hash'] = I( 'post.hash', '' );
		$map['extension'] = array('in',explode( ',', strtolower( $_POST['extensions'] ) ));
		$count = M( 'core_attachment' )->where($map) ->count();

//		$page  = Page::row( 32 )->pageNum( 8 )->make( $count );
		/*$data  = M( 'core_attachment' )
		           ->whereIn( 'extension', explode( ',', strtolower( $_POST['extensions'] ) ) )
		           ->where( 'hash', I( 'post.hash', '' ) )
		           ->limit( Page::limit() )
		           ->orderBy( 'id', 'DESC' )
		           ->get();*/

		$page = new \Think\Page($count,25);


		$data  = M( 'core_attachment' )
			->where($map)
			->limit( $page->firstRow.','.$page->listRows )
			->order( 'id desc' )
			->select();
//pp($data);die;
		foreach ( $data as $k => $v ) {
			$data[ $k ]['createtime'] = date( 'Y/m/d', $v['createtime'] );
			$data[ $k ]['size']       = get_size( $v['size'] );
		}
		$this->ajaxReturn( [ 'data' => $data, 'page' => $page ] );
	}

	//删除图片delWebuploader
	public function removeImage() {
		$db   = M( 'core_attachment' );
		$file = $db->where( 'id', $_POST['id'] )->find();
		if ( is_file( $file['path'] ) ) {
			unlink( $file['path'] );
		}
		$db->where( 'id', $_POST['id'] )->delete();
	}

	//百度编辑器
	public function ueditor() {
		$CONFIG = json_decode( preg_replace( "/\/\*[\s\S]+?\*\//", "", file_get_contents( "config.json" ) ), TRUE );
		$action = $_GET['action'];
		switch ( $action ) {
			case 'config':
				$result = json_encode( $CONFIG );
				break;
			/* 上传图片 */
			case 'uploadimage':
				/* 上传涂鸦 */
			case 'uploadscrawl':
				/* 上传视频 */
			case 'uploadvideo':
				/* 上传文件 */
			case 'uploadfile':
				$result = include( "action_upload.php" );
				break;
			/* 列出图片 */
			case 'listimage':
				$result = include( "action_list.php" );
				break;
			/* 列出文件 */
			case 'listfile':
				$result = include( "action_list.php" );
				break;

			/* 抓取远程文件 */
			case 'catchimage':
				$result = include( "action_crawler.php" );
				break;

			default:
				$result = json_encode( [
					'state' => '请求地址出错'
				] );
				break;
		}
		/* 输出结果 */
		if ( isset( $_GET["callback"] ) ) {
			if ( preg_match( "/^[\w_]+$/", $_GET["callback"] ) ) {
				echo htmlspecialchars( $_GET["callback"] ) . '(' . $result . ')';
			} else {
				echo json_encode( [
					'state' => 'callback参数不合法'
				] );
			}
		} else {
			echo $result;
		}
	}
}