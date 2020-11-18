<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Role;
use App\Models\User;
use App\Models\Customer;

class CustomerController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function store(Request $request)
    {

        try {
            DB::beginTransaction();

            $id = DB::table('users')->insertGetId([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            DB::table('user_class')->insert([
                'user_id' => $id,
                'name' => 'customer'
            ]);
            DB::table('user_detail')->insert([
                'user_id' => $id,
                'birthday' => $request->birthday,
                'telephone' => $request->telephone,
                'sex' => $request->sex,
            ]);
            DB::table('user_address')->insert([
                'user_id' => $id,
                'address' => $request->address,
            ]);

            Session::flash('success', 'Đăng Kí Thành Công!');
            DB::commit();
            return redirect()->route('customer.index');
        } catch (\Exception $exception) {
            // dd($exception);
			Session::flash('error', 'Email đã tồn tại');
            return redirect()->route('customer.register');
        }
    }
    public function customer_login(Request $request) {

    // Kiểm tra dữ liệu nhập vào
        $rules = [
            'email' =>'required|email',
            'password' => 'required|min:8'
        ];
        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
    
    
        if ($validator->fails()) {
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
            return redirect()->route('customer.login')->withErrors($validator)->withInput();
        } else {
            // Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
            $email = $request->input('email');
            $password = $request->input('password');
     
            if( Auth::attempt(['email' => $email, 'password' =>$password])) {
                // Kiểm tra đúng email và mật khẩu sẽ chuyển trang

                $customer_session = DB::table('users')->where('email', '=', $email)->first();
                $customer       =   new Customer($customer_session);
                $customer->Create($customer_session);
                $request->session()->put('customer', $customer);

                return redirect()->route('customer.index');
            } else {

                // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
                Session::flash('error', 'Email hoặc mật khẩu không đúng!');
                return redirect()->route('customer.login');
            }
        }
    }
    public function customer_logout(Request $request) {
        Auth::logout();
        return redirect()->route('customer.login');
    }

}
