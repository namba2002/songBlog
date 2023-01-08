<?php

namespace App\Http\Controllers;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function mypage(User $user)
    {
        return view('users/mypage')->with([
            'user'=>$user,
            'posts' => Post::where('user_id', '=', $user->id)->orderBy('updated_at',('DESC'))->paginate(10),
        ]);
    }
    
    public function index(Post $post){
        return view('posts/index')->with([
            'posts' => $post -> getPaginateByLimit(),
            'user_id'=>auth()->id(),
        ]);
    }
    
    public function create(){
        return view('posts/create');
    }
    
    public function store(Request $request, Post $post){
        $input = $request['post'];
        $input += ['user_id' => auth()->id()];
        $post->fill($input)->save();
        return redirect('/');
    }
    
    public function serch(Request $request, Post $post){
        $checkbox_id = $request['checkbox'];
        $keyword = $request['keyword'];
        
        $query = Post::query();
        
        
        if(!(is_null($keyword))){
            $query->where('song', 'like', '%'.$keyword.'%')
                    ->orWhere('artist', 'like', '%'.$keyword.'%');
        }
        
        if(!(is_null($checkbox_id))){
            $query->whereHas('user', function ($q) use($checkbox_id){
                $q->where('pitch', '=', $checkbox_id);
        });
        }
        return view('/posts/serch')->with([
            'posts' => $query-> with('user')->orderBy('updated_at',('DESC'))->paginate(10),
            'user_id'=>auth()->id(),
        ]);
    }
    
    public function delete(Post $post){
        $post->delete();
        return redirect('/');
    }
    
    
}
