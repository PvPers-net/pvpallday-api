<?php

namespace App\Http\Controllers;

use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;

use App\Http\Requests;

class TestController extends Controller
{
    use Helpers;

    /**
     * @return mixed
     */
    public function test() {
        return $this->response->array(['test' => 'is ok']);
    }
}
