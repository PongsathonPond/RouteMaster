<?php

namespace App\Http\Controllers;

use App\Models\bookingcake;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddListController extends Controller
{
    public function index()
    {

        $products = Products::all();

        return view('page.user.addcake.index', compact('products'));
    }

    public function edit($id)
    {
        $products = Products::find($id);
        return view('page.user.addcake.add', compact('products'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'tel' => 'required|max:255',
            'name_cake_admin' => 'required|max:255',
            'date_end' => 'required|max:255',
            'name_cake_user' => 'required',
            'price' => 'required|max:255',
            'name' => 'required|max:255',

        ],
            ['tel.required' => "กรุณาป้อน",
                'name_cake_admin.required' => "กรุณาป้อน",
                'name_cake_user.required' => "กรุณาป้อน",

            ]

        );

        $addcal = new bookingcake;
        $addcal->tel = $request->tel;
        $addcal->name_cake_admin = $request->name_cake_admin;
        $addcal->name_cake_user = $request->name_cake_user;
        $addcal->user_id = Auth::user()->id;
        $addcal->date_end = $request->date_end;
        $addcal->price = $request->price;
        $addcal->name = $request->name;

        $addcal->save();

        return redirect()->route('add-list')->with('success', "บันทึกข้อมูลเรียบร้อย");

    }
}
