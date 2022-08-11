<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;

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
}
