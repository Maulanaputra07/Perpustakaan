<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genre extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guarded = [
        'id_genre'
    ];

    protected $fillable = [
        'nama_genre',
    ];

    public function buku(){
        return $this->hasMany(buku::class);
    }
}
