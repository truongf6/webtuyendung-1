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
     * @param string $type (job_seeker hoặc company)
     */
    public function register(Request $request, $type)
    {
        // Xác định role_id dựa trên loại tài khoản
        $role_id = $type === 'job_seeker' ? 2 : ($type === 'company' ? 3 : null);
    
        if (!$role_id) {
            return back()->withErrors(['type' => 'Loại tài khoản không hợp lệ'])->withInput();
        }
    
        // Xác thực dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'Vui lòng nhập tên !',
            'email.required' => 'Vui lòng nhập email !',
            'email.email' => 'Email không hợp lệ !',
            'email.unique' => 'Email đã được sử dụng !',
            'password.required' => 'Vui lòng nhập mật khẩu !',
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự !',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp !',
        ]);
    
        // Kiểm tra nếu có lỗi
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        // Tạo tài khoản người dùng
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $role_id,
        ]);
    
        return redirect()->intended('home')->with('success', 'Đăng ký thành công');
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
