<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resep extends Model
{
    use HasFactory;

    protected $table = 'post_resep';

    protected $fillable = [
        'judul', 'deskripsi', 'bahan', 'langkah', 'img', 'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getImgAttribute($value){
        return url('storage/', $value);
    }

}
