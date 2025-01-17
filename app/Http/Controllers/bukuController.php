<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;
use App\Models\kategory;

class bukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.indexBuku',[
            'bukus'=>buku::paginate(30)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createBuku',[
            'kategoryes'=>kategory::orderBy('nama', 'ASC')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        buku::create([
            'judul'=>$request->namaBuku,
            'cover'=>$request->file('coverBuku')->store('coverbuku'),
            'ringkasan'=>$request->ringkasanBuku,
            'penulis'=>$request->penulisBuku,
            'penerbit'=>$request->penerbitBuku,
            'tahun_terbit'=>$request->tahunTerbitBuku,
            'stok'=>$request->stokBuku,
            'kategory_id'=>$request->kategory_id,
        ]);

        return redirect('/buku')->with('berhasil','Buku Berhasil Ditambah');
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
        return view('admin.editBuku',[
            'buku'=>buku::find($id),
            'kategoryes'=>kategory::orderBy('nama', 'ASC')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        dd($request);

        buku::create([
            'judul'=>$request->namaBuku,
            'cover'=>$request->file('coverBuku')->store('coverbuku'),
            'ringkasan'=>$request->ringkasanBuku,
            'penulis'=>$request->penulisBuku,
            'penerbit'=>$request->penerbitBuku,
            'tahun_terbit'=>$request->tahunTerbitBuku,
            'stok'=>$request->stokBuku,
            'kategory_id'=>$request->kategory_id,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
