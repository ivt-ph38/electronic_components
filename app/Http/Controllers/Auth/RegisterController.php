<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Session;
// use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],
        
                    [
            'name.required' => 'Vui lòng nhập Họ và Tên',
            'name.max' => 'Họ và tên không quá 255 ký tự',
            'email.required' => 'Vui lòng nhập Email',
            'email.email' => 'Email không đúng định dạng',
            'email.max' => 'Email không quá 255 ký tự',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
            'password.confirmed' => 'Xác nhận mật khẩu không đúng',
            'address.required' => 'Vui lòng nhập địa chỉ'


        ]
        
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function getRegister() {
    return view('auth.register');
}

    public function postRegister(Request $request) {
    // Kiểm tra dữ liệu vào
    $allRequest  = $request->all(); 
    $validator = $this->validator($allRequest);
 
    if ($validator->fails()) {
        // Dữ liệu vào không thỏa điều kiện sẽ thông báo lỗi
        return redirect('register')->withErrors($validator)->withInput();
    } else {   
        // Dữ liệu vào hợp lệ sẽ thực hiện tạo người dùng dưới csdl
        if( $this->create($allRequest)) {
            // Insert thành công sẽ hiển thị thông báo
            Session::flash('success', 'Đăng ký thành viên thành công!');
            return redirect(route('welcome'));
        } else {
            // Insert thất bại sẽ hiển thị thông báo lỗi
            Session::flash('error', 'Đăng ký thành viên thất bại!');
            return redirect('register');
        }
    }
    }
    
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'role' => 'user',
            'password' => bcrypt($data['password']),
        ]);
 
    }


}
