<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use App\Models\Classroom;
use App\Models\StudentList;
use Illuminate\Support\Facades\Cookie;
use App\Http\Requests\SubmitRequest;

class StudentController extends Controller
{
    public function layDanhSachSV()
    {
        $dsSV = Account::where([['accounttype','=','3'],['deleted_at','=',null]])->get();
        
        return view('StudentsList',compact('dsSV'));   
    }
    public function themSV()
    {
        return view('AddStudent');
    }
    public function xlThemSV(SubmitRequest $rq)
    {
        $sv = new Account;
        $sv->username = $rq->username;
        $sv->password = Hash::make($rq->password);
        $sv->hoten = $rq->hoten;
        $sv->ngaysinh = $rq->ngaysinh;
        $sv->diachi = $rq->diachi;
        $sv->sdt = $rq->sdt;
        $sv->email = $rq->email;
        $sv->accounttype = 3;
        $sv->created_at = date("Y-m-d");
        $sv->save();
        return redirect()->route('StudentsList');
    }
    public function suaSV($id)
    {
        $dsSV = Account::find($id);
        if($dsSV == null||$dsSV->deleted_at != NULL)
        {
            return view('UnknowAccount');
        }
        return view('UpdateStudent',compact('dsSV'));
    }
    public function xlSuaSV(SubmitRequest $rq,$id)
    {
        $sv = Account::find($id);
        $sv->username = $rq->username;
        $sv->password = Hash::make($rq->password);
        $sv->hoten = $rq->hoten;
        $sv->ngaysinh = $rq->ngaysinh;
        $sv->diachi = $rq->diachi;
        $sv->sdt = $rq->sdt;
        $sv->email = $rq->email;
        $sv->accounttype = 3;
        $sv->updated_at = date("Y-m-d");
        $sv->save();
        return redirect()->route('StudentsList');
    }
    public function xoaSV($id)
    {
        $dsSV = Account::find($id);
        if($dsSV == null||$dsSV->deleted_at != NULL)
        {
            return view('UnknowAccount');
        }
        $dsSV->deleted_at = date("Y-m-d");
        $dsSV->save();
        return redirect()->route('StudentsList');
    }

    public function showClassStudent(Request $request){
        $account=Account::where('username',$request->session()->get('username'))->first();
        $id=$account->id;
        $classlst=Account::find($id)->lstClassJoined;
        return View('student/HomePageStudent',compact('classlst'));
      }

      public function addClassStudent(Request $req)
      {
        $req->validate([
          'classcode'=>'required|max:6|min:6'
        ],[
          'classcode.required'=>'Vui lòng nhập đầu đủ mã lớp',
          'classcode.min'=>'Mã lớp phải có :min ký tự',
          'classcode.max'=>'Mã lớp phải có :max ký tự'
        ]);
        $account=Account::where('username',session('username'))->first();

        $Class=Classroom::all();
        $listClass=Classroom::where('malop',$req->classcode)->first();
        if($listClass==null||$listClass->deleted_at!=null)
        {
                Cookie::queue('error',"Lớp không tồn tại",0.09);
            return redirect()->route('AddClassStudent');
        }
        $IdExs= StudentList::all();
        foreach($IdExs as $var)
        {
            if($var->idaccount == $account->id && $var->idclassroom==$listClass->id)
            {

                Cookie::queue('error',"Lớp đã tồn tại",0.09);
                return redirect()->route('AddClassStudent');
               
            }      
        }
        $class= new StudentList;
        $class->idaccount=$account->id;
        $class->idclassroom=$listClass->id;
        $class->stt=1;
        $class->save();
        return redirect()->route('showClassStudent');
      }
}
