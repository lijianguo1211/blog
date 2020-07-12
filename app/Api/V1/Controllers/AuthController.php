<?php


namespace App\Api\V1\Controllers;


class AuthController extends BaseController
{
    public function login()
    {
        return $this->response->array(['status' => 200, 'message' => 'success']);
    }
}
