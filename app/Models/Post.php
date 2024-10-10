<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, Uuids, SoftDeletes;

    protected $table = "kategori";
    protected $fillable = ['deskripsi'];

    public function kategori(){
        return $this->belongsTo(\App\Models\Kategori::class);
    }
    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }
}
