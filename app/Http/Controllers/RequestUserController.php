<?php

namespace App\Http\Controllers;

use App\Models\bookingcake;
use Illuminate\Support\Facades\Auth;

class RequestUserController extends Controller
{
    public function index()
    {

        $bookingcake = bookingcake::where('user_id', Auth::user()->id)->paginate(5);

        return view('page.user.request.index', compact('bookingcake'));

    }
}
