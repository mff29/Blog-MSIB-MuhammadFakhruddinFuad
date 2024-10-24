<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data['posts'] = Post::where('status','published')->with('kategori','user')->get();
        return view('home', $data);
    }
}
