<?php

namespace App\Http\Controllers\Api;

use Dingo\Api\Http\Request;

interface APIInterface
{
    public function index(Request $request);
}
