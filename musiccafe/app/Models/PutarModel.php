<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PutarModel extends Model
{
    use HasFactory;
    protected $table        = "putar";
    protected $primaryKey   = "id_putar";
    protected $fillable     = ['id_putar','id_dj','id_pendengar','id_lagu'];

    //relasi ke dj
    public function dj()
    {
        return $this->belongsTo('App\Models\DjModel', 'id_dj');
    }

    //relasi ke pendengar
    public function pendengar()
    {
        return $this->belongsTo('App\Models\PendengarModel', 'id_pendengar');
    }

    //relasi ke lagu
    public function lagu()
    {
        return $this->belongsTo('App\Models\LaguModel', 'id_lagu');
    }
}