<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use ValidatesRequests;

class PageController extends Controller
{
    public function about(){
        return view('pages.about',[
            'title' => 'Giới thiệu'
        ]);
    }

    public function contact(){ 
        return view('pages.contact',[
            'title' => 'Liên hệ'
        ]);
    }

    public function postContact(Request $request){
        $feedback = new Feedback;
        $feedback->fullname = $request->fullname;
        $feedback->phone_number = $request->phone_number;
        $feedback->email = $request->email;
        $feedback->title = $request->title;
        $feedback->contents = $request->contents;
        $feedback->save();
        return redirect()->back()->with('success', 'Gửi phản hồi thành công!');
    }
}
