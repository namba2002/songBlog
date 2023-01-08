<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    public function getPaginateByLimit(int $limit_count = 5){
        return $this::with('user')->orderBy('updated_at','DESC')->paginate($limit_count);
    }
    protected $fillable = [
        'song',
        'artist',
        'score',
        'body',
        'user_id',
    ];
    
    public function user(){
        return $this->belongsTo(user::class);
    }
}
