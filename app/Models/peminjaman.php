<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    use HasFactory;

    protected $guarded = [
        'id_peminjaman'
    ];

    protected $primaryKey = 'id_peminjaman';

    protected $table = 'peminjaman';

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function buku()
    {
        return $this->belongsTo(buku::class, 'id_buku');
    }
}
