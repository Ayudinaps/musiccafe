<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DjModel extends Model
{
    use HasFactory;
    protected $table        = "dj";
    protected $primaryKey   = "id_dj";
    protected $fillable     = ['id_dj','nama_dj','hp'];
}
