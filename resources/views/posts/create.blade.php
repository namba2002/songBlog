<x-app-layout>
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>投稿</title>
    </head>
    <body>
        とりあえずの変更
        変更2回目
        <h1>Blog Name</h1>
        <form action="/posts" method="POST">
            @csrf
            <div class="song">
                <h2>曲名</h2>
                <input type="text" name="post[song]" placeholder="曲名" value="{{old('post.song')}}"/>
                <p class="song__error" style="color:red">{{$errors->first('post.song')}}
            </div>
            <div class="artist">
                <h2>歌手名</h2>
                <input type="text" name="post[artist]" placeholder="歌手名" value="{{old('post.artist')}}"/>
                <p class="artist__error" style="color:red">{{$errors->first('post.artist')}}
            </div>
            <div class="score">
                <h2>点数</h2>
                <input type="text" name="post[score]" placeholder="点数" value="{{old('post.score')}}"/>
                <p class="score__error" style="color:red">{{$errors->first('post.score')}}
            </div>
            <div class="body">
                <h2>感想</h2>
                <textarea name="post[body]" placeholder="感想">{{ old('post.body') }} </textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
</x-app-layout>