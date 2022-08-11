<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserManageController extends Controller
{
    public function index()
    {

        
        $users = User::all();
            return view('page.admin.userManage.index',compact('users'));
    }


    public function delete($id)
    {

        //ลบข้อมูล
        $delete = User::find($id)->delete();
        return redirect()->back()->with('success', "ลบเรียบร้อยแล้ว");

    }
    
}
