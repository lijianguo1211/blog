<?php


namespace App\Api\V1\Controllers;


class AuthController extends BaseController
{
    public function login()
    {
        return $this->response->array(['status' => 200, 'message' => 'success', 'token' => 123456]);
    }

    public function logout()
    {

    }

    public function info()
    {
        return $this->response->array(
            [
                'status' => 200,
                'message' => 'success',
                'userInfo' => [
                    'name' => 'Jay',
                    'phone' => '15971896787',
                    'email' => '15398533402',
                    'img_path' => '/storage/jay/blog/timg-1.jpg'
                ]
            ]);
    }
}
