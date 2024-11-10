<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $Jobs = Job::orderByDesc("created_at")->take(6)->get();
        $count_job = Job::count();
        return view('home',compact('Jobs','count_job'),[
            'title' => 'Trang chủ'
        ]);
    }

}
