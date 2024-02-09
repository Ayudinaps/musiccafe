<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendengarModel extends Model
{
    use HasFactory;
    protected $table        = "pendengar";
    protected $primaryKey   = "id_pendengar";
    protected $fillable     = ['id_pendengar','nop','nama_pendengar','jenis_kelamin','hp'];
}