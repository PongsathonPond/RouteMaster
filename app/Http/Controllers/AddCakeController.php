<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Carbon\Carbon;
class AddCakeController extends Controller
{
    public function index()
    {   
            $products=Products::all();
            return view('page.admin.AddProduct.index',compact('products'));
    }



    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'image' => 'required|mimes:jpg,jpeg,png',
            'price' => 'required|max:255',

        ],
            ['name.required' => "กรุณาป้อนชื่อสินค้า",
          
            ]

        );
        //เข้ารหัสรูปภาพ
        $room_image = $request->file('image');
        //gennerat ชื่อภาพ
        $name_gen = hexdec(uniqid());
        //ดึงนามสกุลไฟล์ภาพ
        $img_ext = strtolower($room_image->getClientOriginalExtension());
//รวมชื่อไฟล์กับนามสกุล
        $img_name = $name_gen . '.' . $img_ext;

        //อัพโหลดและบันทึกข้อมูล

        //สร้างไดเรกทอรี่
        $upload_location = 'img/cake/';
        $full_path = $upload_location . $img_name;
        //อัพโหลดลงดาต้าเบส ด้วย model

        $addcal = new Products;
        $addcal->name = $request->name;
        $addcal->price = $request->price;
    
    
        $addcal->image = $full_path;

        $addcal->created_at = Carbon::now();

        $addcal->save();
        //อัพโหลดภาพไปไดเรกทอรี่
        $room_image->move($upload_location, $img_name);

        return redirect()->back()->with('success', "บันทึกข้อมูลเรียบร้อย");

    }



    public function delete($id)
    {
        //ลบภ่าพ

        $img = Products::find($id)->image;

        unlink($img);

        //ลบข้อมูล
        $delete = Products::find($id)->delete();
        return redirect()->back()->with('delete', "ลบเรียบร้อยแล้ว");

    }




    public function update(Request $request, $id)
    {


        
        $request->validate([

            'name' => 'required|max:255',
            'price' => 'required|max:255',
            // 'service_image'=>'mimes:jpg,jpeg,png'
        ],
            [
                'name.required' => "กรุณาป้อนชื่อ",
                'name.max' => "ห้ามป้อนเกิน 255 ตัวอักษร",

            ]

        );
        $location_Image = $request->file('image');

        if ($location_Image) {
            //อัพเดทภาพและชื่อ
            $name_gen = hexdec(uniqid());

            $img_ext = strtolower($location_Image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;

            $upload_location = 'img/cake/';
            //ลบภาพเก่าและอัพภาพใหม่

            //อัพเดทข้อมูล

            $full_path = $upload_location . $img_name;
            Products::find($id)->update([

                'image' => $full_path,

            ]);
            //ลบภาพเก่าและอัพภาพใหม่
            $old_image = $request->old_image;
            unlink($old_image);
            $location_Image->move($upload_location, $img_name);
            return redirect()->back()->with('update', "อัพเดตข้อมูลเรียบร้อย");

        } else {

            Products::find($id)->update([
                'name' => $request->name,
                'price' => $request->price,

            ]);
            return redirect()->back()->with('update', "อัพเดตข้อมูลเรียบร้อย");

        }

    }
}
