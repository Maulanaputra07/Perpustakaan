<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengembalian;
use App\Models\buku;
use App\Models\peminjaman;
use Carbon\Carbon;


class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $id_user = auth()->user()->id;
        // dd($id_user);
        $bukus = Buku::select('bukus.id_buku', 'bukus.judul_buku', 'bukus.penulis', 'bukus.cover', 'peminjaman.id_peminjaman')
                ->join('peminjaman', 'bukus.id_buku', '=', 'peminjaman.id_buku')
                ->where('peminjaman.id_user', '=', $id_user)
                ->where('peminjaman.status', '=', 'dikembalikan')
                ->get();

        // $peminjamans = peminjaman::where('id_user', $id_user);

        return view('userPage.buku.dikembalikan', ["bukus" => $bukus]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $idUser, $id_buku, $id_peminjaman)
    {
        //
        $item = buku::where('id_buku', $id_buku)->first();

        $bukus = Buku::select('bukus.id_buku', 'bukus.judul_buku', 'bukus.penulis', 'bukus.cover', 'peminjaman.id_peminjaman')
                ->join('peminjaman', 'bukus.id_buku', '=', 'peminjaman.id_buku')
                // ->leftJoin('pengembalian', 'peminjaman.id_peminjaman', '=', 'pengembalian.id_peminjaman')
                ->where('peminjaman.id_user', '=', $idUser)
                ->where('peminjaman.status', '=', 'dipinjam')
                ->get();

        $pengembalian = new pengembalian();
        $pengembalian->id_user = $idUser;
        $pengembalian->id_buku = $id_buku;
        $pengembalian->tgl_pengembalian = Carbon::now(); // Menambahkan 7 hari dari tanggal saat ini
        $pengembalian->save();



        $item->stock += 1;
        $item->save();

        $peminjaman = peminjaman::where('id_peminjaman', $id_peminjaman)->first();
        $peminjaman->status = 'dikembalikan';
        $peminjaman->save();

        return redirect()->route('pengembalian.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
