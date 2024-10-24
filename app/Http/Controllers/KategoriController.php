<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return DataTables::of(Kategori::all())
            ->addColumn('action', function ($row) {
                $btn = '<a class="btn btn-danger btn-sm" href="/kategori/' . $row->id . '" style="margin-right:5px;"><i class="bi bi-eye"></i></a>';
                $btn .= '<a href="/kategori/' . $row->id . '/edit" class="btn btn-danger btn-sm" style="margin-right:5px;"><i class="bi bi-pencil"></i></a>';
                $btn .= '<button type="button" onclick="alert_delete(\'' . $row->id . '\')" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>';

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
            'nama' => 'required|unique:kategori,nama',
        ]);

        Kategori::create($request->all());

        return redirect(route('kategori.index'))->with('message', 'Data kategori berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|unique:kategori,nama,' . $id,
        ]);

        $kategori = Kategori::findOrFail($id);

        $kategori->update($request->all());

        return redirect(route('kategori.index'))->with('message', 'Kategori berhasil diperbarui.');
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
