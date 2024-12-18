<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\genre;
use App\Models\buku;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('adminPage.buku.post', ['genres'=>genre::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_buku' => 'required',
            'deskripsi' => 'required',
            'id_genre' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'stock' => 'required|numeric',
            'cover' => 'required|mimes:jpeg,jpg,png|max:2048',
            'file_data' => 'required|mimes:pdf|max:10240',
        ]);

        //  

        $cover = $request->file('cover');
        $file = $request->file('file_data');

        $filePath = $file->storeAs('public/assets/file', $file->hashName());
        $coverPath = $cover->storeAs('public/assets/cover', $cover->hashName());

        try{
            $buku = buku::create([
                'judul_buku' => $validatedData['judul_buku'],
                'deskripsi' => $validatedData['deskripsi'],
                'id_genre' => $validatedData['id_genre'],
                'penulis' => $validatedData['penulis'],
                'penerbit' => $validatedData['penerbit'],
                'tahun_terbit' => $validatedData['tahun_terbit'],
                'stock' => $validatedData['stock'],
                'cover' => $coverPath,
                'file_data' => $filePath, // Menyimpan path file dalam database
            ]);
        }catch(\Exception $e){
            dd($e->getMessage());
        }

        return redirect('/admin/buku')->with('success', 'berhasil menambahkan buku');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_buku)
    {
        //
        $item = buku::where('id_buku', $id_buku)->first();
        $genre = genre::where('id_genre', $item->id_genre)->first();

        return view('userPage.peminjaman', compact('item', 'genre'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_buku)
    {
        //
        $item = buku::where('id_buku', $id_buku)->first();
        $genres = genre::all();
        return view('adminPage.buku.edit', compact('item', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_buku)
    {
        //
        $validatedData = $request->validate([
            'judul_buku' => 'required',
            'deskripsi' => 'required',
            'id_genre' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'stock' => 'required|numeric',
            'cover' => 'required|mimes:jpeg,jpg,png|max:2048',
            'file_data' => 'required|mimes:pdf|max:10240',
        ]);

        $item = buku::where('id_buku', $id_buku)->first();

        if($request->hasFile('cover') && $request->hasFile('file_data')){
            $cover = $request->file('cover');
            $file = $request->file('file_data');

            $filePath = $file->storeAs('public/assets/file', $file->hashName());
            $coverPath = $cover->storeAs('public/assets/cover', $cover->hashName());

            Storage::delete('public/assets/cover'.$item->cover);
            Storage::delete('public/assets/file'.$item->file_data);

            $item->update([
                'judul_buku' => $request->judul_buku,
                'deskripsi' => $request->deskripsi,
                'id_genre' => $request->id_genre,
                'penulis' => $request->penulis,
                'penerbit' => $request->penerbit,
                'tahun_terbit' => $request->tahun_terbit,
                'stock' => $request->stock,
                'cover' => $coverPath,
                'file_data' => $filePath,
            ]);
        } else {
            $item->update([
                'judul_buku' => $request->judul_buku,
                'deskripsi' => $request->deskripsi,
                'id_genre' => $request->id_genre,
                'penulis' => $request->penulis,
                'penerbit' => $request->penerbit,
                'tahun_terbit' => $request->tahun_terbit,
                'stock' => $request->stock,
            ]);
        }

        return redirect('/admin/buku')->with('success', 'berhasil update buku');
    }
    public function destroy(string $id_buku)
    {
        //
        $item = buku::where('id_buku', $id_buku);
        $item->delete();

        return redirect('/admin/buku')->with('success', 'berhasil menghapus buku');
    }
}
