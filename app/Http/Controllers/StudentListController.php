<?php

namespace App\Http\Controllers;
use App\Models\StudentList;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class StudentListController extends Controller
{
    public function AddStudent(Request $req)
    {
     
           $studentlis= new StudentList;
           $allacc=Account::where('email',$req->textinput)->first();
           if($allacc==null)
           {
            Cookie::queue('error',"Email không tồn tại",0.09);
               return  redirect()->route('lstStudent',['id'=>$req->id]);
           } 

        //    $IdExs= StudentList::all();
        
        //    foreach($IdExs as $var)
        //    {
        //        if($var->idaccount==$allacc->id && $var->idclassroom==$req->id)
        //        {
        //         Cookie::queue('error',"Sinh viên này đã tồn tại",0.09);
        //         return  redirect()->route('lstStudent',['id'=>$req->id]);
        //        }
        //    }

           $studentlis->stt=1;
           $studentlis->idaccount=$allacc->id;
           $studentlis->idclassroom=$req->id;
           $studentlis->save();
           return redirect()->route('lstStudent',['id'=>$req->id]);
    }

    public function DeleteStudent(Request $req)
    {
        $a= StudentList::where('idaccount',$req->id)->delete();
        return redirect()->route('lstStudent',['id'=>$req->code]);
    }

    public function AddStudentAdmin(Request $req)
    {
        $studentlis= new StudentList;
        $allacc=Account::where([['email' , '=' , $req->textinput],['deleted_at','=',null]])->first();
        if($allacc==null)
        {
            return view('admin/UnknowAccount');
        } 
        $studentlis->stt=1;
        $studentlis->idaccount=$allacc->id;
        $studentlis->idclassroom=$req->id;
        $studentlis->save();
        return redirect()->route('loadDSSV',['id'=>$req->id]);
    }
    public function DeleteStudentAdmin(Request $req)
    {
        $a= StudentList::where('idaccount',$req->id)->delete();
        return redirect()->route('loadDSSV',['id'=>$req->code]);
    }
}
