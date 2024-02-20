<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;

class LoginController extends Controller
{

        public function login()
        {


        return view('admin.login');
        }
        public function XuLyLogin(Request $request)
        {
            $login = Admin::Where('ten_dn', $request->ten_dn)->where('mat_khau', $request->mat_khau)->first();
            if(empty($login))
            {
                return redirect()->route('login')->with('thong_bao', 'Sai tên tài khoản hoặc mật khẩu');
            }


            session(['admin_login' => $login]);
            return redirect()->route('san-pham.danh-sach');
        }
        public function dangXuat(){
            session()->forget('admin_login');
            return redirect()->route('login');
        }
}
