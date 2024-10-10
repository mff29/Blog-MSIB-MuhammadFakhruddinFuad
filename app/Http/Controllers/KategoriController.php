<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return DataTables::of(Kategori::get())
            ->addColumn('action', function($row){
                $btn = "<a href='/kategori/" . $row->id . "/edit' class='btn btn-danger btn-sm ' style='margin-right:5px'><i class='bi bi-pencil-square'></i></a>";
                $btn .= "<a href='/kategori/" . $row->id . "' class='btn btn-danger btn-sm ' style='margin-right:5px'><i class='bi bi-eye'></i></a>";
                $btn .= '<button type="button" onclick="alert_delete(\'' . $row->id . '\')" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('kategori.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required',
        ]);

        Kategori::create($request->all());
    
        return redirect(route('kategori.index'))->with('message', 'Data kategori berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['kategori'] = Kategori::findOrFail($id);
        return view('kategori.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['kategori'] = Kategori::findOrFail($id);
        return view('kategori.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'deskripsi' => 'required',
        ]);

        $data = Kategori::findOrFail($id);
        $data->update($request->all());

        return redirect(route('kategori.index'))->with('message', 'Data kategori berhasil di update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        return $kategori->delete();
    }

}
