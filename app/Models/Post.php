<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    public function getPaginateByLimit(int $limit_count = 10){
        return $this::with('user')->orderBy('updated_at','DESC')->paginate($limit_count);
    }
    
    protected $fillable = [
        'song',
        'artist',
        'score',
        'body',
        'user_id',
    ];
    
    #public function getNarrowing(int $narrow_id, int $limit_count=5){
    #    return Post::whereHas('user', function($query) use($narrow_id){
    #        $query->where('pitch', '=', $narrow_id);
    #    })->orderBy('updated_at','DESC')->paginate($limit_count);
    #}
    
    public function user(){
        return $this->belongsTo(user::class);
    }
}
