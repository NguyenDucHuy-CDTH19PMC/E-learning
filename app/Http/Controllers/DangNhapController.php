<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
// Bạch: Ngộ thêm cả thư mục fonts(~E-learning\public\fonts) 
// và vendor(~E-learning\public\vendor) nhưng ghi chú hết thì trầm cảm lắm
class DangNhapController extends Controller
{
    public function dangNhap()
    {
        return view('Login');
    }

    public function xuLyDangNhap(Request $request)
    {
        // $user = Account::where('username',$request->username)->first();
        //  if(empty($user)){
        //     echo"Tên đăng nhập hoặc mật khẩu không đúng";
        //  }else if($user->password != $request->password){
        //     echo"Tên đăng nhập hoặc mật khẩu không đúng";
        //  }else{
        //      echo $user->hoTen;
        //  }
        
        $credentials = $request->only('username', 'password'); 
        //['username' =>$request->username, 'password' =>  $request->password]
         if (Auth::attempt($credentials)) { 
            // $user = Auth::user();
            //echo"Đăng nhập thành công";
            // //dd($user);
            // echo "{$user->hoTen}";
            return redirect()->route('HomePage'); 
         }else{
             echo"Tên đăng nhập hoặc mật khẩu không đúng";
         }
            
    }

    //MÃ hóa mật khẩu
    public function update()
        {
        $id=1;
        $data = Account::find($id);
        $data->password = Hash::make('123456');
        $data->save();
        echo 'Cập nhật thành viên thành công!';
    }

    //Cái này là đăng xuất
    public function dangXuat()
    {
        Auth::logout();
        return view('Login');
    }
}
