<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, Uuids, SoftDeletes;

    protected $table = "post";
    protected $fillable = ['title','content','img', 'status','kategori_id','author'];

    public function kategori(){
        return $this->belongsTo(\App\Models\Kategori::class);
    }

    public function user(){
        return $this->belongsTo(\App\Models\User::class, 'author');
    }
}
