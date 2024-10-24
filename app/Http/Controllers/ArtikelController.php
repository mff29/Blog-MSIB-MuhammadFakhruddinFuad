<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index(Request $request){
        $data['allKategori'] = Kategori::all();
        $query = Post::query();

        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('kategori_id', $request->kategori);
        }

        $data['posts'] = $query->with('kategori', 'user')->get();

        return view('artikel.index', $data);
    }

    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        $otherPost = Post::where('id', '!=', $post->id)->limit(5)->get();

        return view('artikel.show', compact('post', 'otherPost'));
    }
}
