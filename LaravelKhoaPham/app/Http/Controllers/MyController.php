<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function XinChao()
    {
    	echo "Hello asd";
    }
    public function KhoaHoc($ten){
    	echo "Khoa hoc: ".$ten;
    }
}
