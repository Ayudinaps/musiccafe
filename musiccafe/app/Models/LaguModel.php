<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaguModel extends Model
{
    use HasFactory;
    protected $table        = "lagu";
    protected $primaryKey   = "id_lagu";
    protected $fillable     = ['id_lagu','kode_lagu','judul','penyanyi','kategori'];
}