<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function list(Request $request)
    {
        $result = Province::get();
        echo json_encode($result);
    }
}
