<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Session;
use Hash;
use DB;
use App\Role;
use App\User;
use App\Customer;

class AdminController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }
    public function changePassword()
    {
        $user_ = Session::has('customer') ? Session::get('customer')->customer : null;
        $user =  DB::table('users')
            ->where('users.id', '=', $user_['id'])
            ->first();                  
        // $items = $this->item->first();
        // dd($user);

        return view('admin.changePassword', compact('user'));
    }

    public function admin_credential_rules(array $data)
    {
        $messages = [
            'current-password.required' => 'Please enter current password',
            'password.required' => 'Please enter password',
        ];

        $validator = Validator::make($data, [
            'current-password' => 'required',
            'password' => 'required|same:password',
            'password_confirmation' => 'required|same:password',     
        ], $messages);

        return $validator;
    }  
    public function updatePassword(Request $request)
    {
        if(Auth::Check()) {
            $request_data = $request->All();
            $validator = $this->admin_credential_rules($request_data);
            if($validator->fails()) {
                Session::flash('error', 'Mật Khẩu Nhập Lại Không Chính Xác');
                return redirect()->route('customer.changePassword');    
                // return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
            } else {  
                $current_password = Auth::User()->password;           
                if(Hash::check($request_data['current-password'], $current_password)) {           
                    $user_id = Auth::User()->id;                       
                    $obj_user = User::find($user_id);
                    $obj_user->password = Hash::make($request_data['password']);
                    $obj_user->save(); 
                    Session::flash('success', 'Đổi Mật Khẩu Thành Công!');
                    return redirect()->route('customer.changePassword');
                } else {           
                    Session::flash('error', 'Mật khẩu Cũ không đúng!');
                    return redirect()->route('customer.changePassword');
                }
            }        
        } else {
            return redirect()->to('/');
        }    
    }
    public function adminpostLogin(Request $request) {
        try{
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
                    return redirect()->back()->withErrors($validator)->withInput();
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

                        return redirect()->route('home');
                    } else {
                        // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
                        Session::flash('error', 'Email hoặc mật khẩu không đúng!');
                        return redirect()->back();
                    }
                }
        } catch (\Exception $exception) {
            return redirect()->to('/login');
        }
    }
}
