<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;

class AuthController extends Controller
{
    use ValidatesRequests;

    public function showRegister(){
        return view('auth.register',[
            'title' => 'Đăng ký tài khoản',
        ]);
    }

    /**
     * Đăng ký tài khoản.
     * @param Request $request
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên của bạn !',
            'email.required' => 'Vui lòng nhập email !',
            'password.required' => 'Vui lòng nhập mật khẩu !',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Email đã tồn tại'
        ]);
        $confirmPass = $request->confirmPassword;
        $pass = $request->password;
        if ($confirmPass == $pass) {
            // Kiểm tra xem email đã tồn tại chưa
            $emailExists = User::where('email', $request->email)->exists();

            if (!$emailExists) {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'role_id' => $request->type, 
                ]);
                Auth::login($user);
            } else {
                return back()->with('error', 'Email đã tồn tại');
            }
        } else {
            return back()->with('error', 'Xác nhận lại mật khẩu !');
        }
        return redirect('/'); // Điều hướng sau khi đăng ký
    }

    
    public function showLogin(){
        return view('auth.login',[
            'title' => 'Đăng nhập'
        ]);
    }

    /**
     * Đăng nhập.
     * @param Request $request
     */
   
     public function login(Request $request)
     {
         // Validate email và password
         $this->validate($request, [
             'email' => 'required|email',
             'password' => 'required',
         ], [
             'email.required' => 'Vui lòng nhập email !',
             'password.required' => 'Vui lòng nhập mật khẩu !',
             'email.email' => 'Email không hợp lệ'
         ]);
     
         // Lấy thông tin email và password
         $credentials = $request->only('email', 'password');
     
         // Kiểm tra thông tin đăng nhập
         if (Auth::attempt($credentials)) {
             // Đăng nhập thành công
             return redirect()->intended('home')->with('success', 'Đăng nhập thành công');
         }
     
         // Đăng nhập thất bại, trả về thông báo lỗi
         return back()->withErrors([
             'email' => 'Email hoặc mật khẩu không đúng',
         ])->withInput($request->only('email'));
     }

    /**
     * Đăng xuất.
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');    }
}
