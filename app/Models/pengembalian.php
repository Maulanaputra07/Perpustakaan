<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengembalian extends Model
{
    use HasFactory;

    protected $guarded = [
        'id_pengembalian'
    ];

    protected $table = 'pengembalians';

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function buku()
    {
        return $this->belongsTo(buku::class, 'id_buku');
    }
}
