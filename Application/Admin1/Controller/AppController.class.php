<?php namespace Admin\Controller;

use Think\Controller;

class AppController extends Controller{
    /**
     * @api {get} /get 获取所有菜品列表
     * @apiSampleRequest  /app/feeling
     * @apiPermission none
     * @apiName all
     * @apiGroup user
     * @apiVersion 1.0.0
     * @apiDescription 获取用户心情
     * @apiSuccess {string} username 用户名
     * @apiSuccess {string} mail 心情
     * @apiSuccessExample {json} Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "uid": "1",
     *       "username": "用户",
     *       "mail":"心情不错"
     *     }
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 404 Not Found
     *     {
     *       "valid": 0,
     *       "message":" user not found"
     *     }
     */


    public function feeling()
    {
        $data = [
            'feeling' =>'心情不错'
        ];
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
    }


}