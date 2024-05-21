<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\peminjaman;
use App\Models\pengembalian;
use App\Models\buku;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id_user = auth()->user()->id;
        // dd($id_user);
        $bukus = Buku::select('bukus.id_buku', 'bukus.judul_buku', 'bukus.penulis', 'bukus.cover', 'peminjaman.id_peminjaman')
                ->join('peminjaman', 'bukus.id_buku', '=', 'peminjaman.id_buku')
                ->where('peminjaman.id_user', '=', $id_user)
                ->where('peminjaman.status', '=', 'dipinjam')
                ->get();

                $tgl_pengembalian = [];

                foreach($bukus as $buku){
                    $tgl_pengembalian[$buku->id_buku] = peminjaman::select('tgl_pengembalian')
                                                ->where('id_user', $id_user)
                                                ->where('id_buku', $buku->id_buku)
                                                ->first();
                }
                
                    foreach ($tgl_pengembalian as $id_buku => $tgl) {
                        if ($tgl && Carbon::now()->greaterThan(Carbon::parse($tgl->tgl_pengembalian))) {
                            session()->flash('batas', 'Tanggal pengembalian buku melewati batas.');
                            return view('userPage.buku.borrowed', ["bukus" => $bukus, "tgl_kembali" => $tgl_pengembalian]);
                        }
                    }

        

        // $peminjamans = peminjaman::where('id_user', $id_user);

        return view('userPage.buku.borrowed', ["bukus" => $bukus, "tgl_kembali" => $tgl_pengembalian]);
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
    public function store(Request $request, $idUser, $id_buku)
    {
        
        $item = buku::where('id_buku', $id_buku)->first();
        // Periksa apakah pengguna sudah meminjam buku dengan id_buku yang sama sebelumnya
        $existingPeminjaman = Peminjaman::where('id_user', $idUser)
        ->where('id_buku', $id_buku)
        ->exists();

        if($existingPeminjaman){
            return redirect('/user')->with('pesan','anda gagal meminjam buku '. $item->judul_buku . ' karena telah terdapat di peminjaman');
        }
        //
        $peminjaman = new peminjaman();
        $peminjaman->id_user = $idUser;
        $peminjaman->id_buku = $id_buku;
        $peminjaman->tgl_peminjaman = Carbon::now(); // Menggunakan tanggal saat ini
        $peminjaman->tgl_pengembalian = Carbon::now()->addDays(7); // Menambahkan 7 hari dari tanggal saat ini
        $peminjaman->save();

        $item->stock -= 1;
        $item->save();

        $judul_buku = $item->judul_buku;
        $pesan = 'berhasil meminjam buku '. $judul_buku;
        return redirect('/user')->with('pesan', $pesan);
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
