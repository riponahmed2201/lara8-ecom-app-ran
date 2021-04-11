<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function about() {
        return view('admin.about');
    }
    public function contact() {
        return 'contact';
    }
}
