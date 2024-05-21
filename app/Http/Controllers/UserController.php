<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;

class UserController extends Controller
{
    //
    public function index() {
        return view('dashboard.user', ["bukus"=>buku::all()]);
    }
}
