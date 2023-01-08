<x-app-layout>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <style>
            .main{
                display: flex;
            }
            .main2{
                width: 50%;
            }
        </style>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="main">
            <font size=10>マイページ</font>
            <div class="post font-bold text-blue-500 py-2 px-4 my-8 border-8 w-1 border-blue-100 rounded-lg" >
                        <font size=5>ユーザー名</font>
                        &emsp;{{ $user->name }}</br>
                        <font size=5>メールアドレス</font>
                        &emsp;{{ $user->email }}</br>
                        <font size=5>性別</font>
                        &emsp;{{ $user->gender }}</br>
                        <font size=5>年齢</font>
                        &emsp;{{ $user->age }}</br>
                        <font size=5>声の高さ</font>
                        @if ($user->pitch==1) 
                        	&emsp;声がとても低い</br>
                        @endif 
                        @if($user->pitch==2) 
                        	&emsp;声が低い</br>
                        @endif
                        @if($user->pitch==3) 
                        	&emsp;普通</br>
                        @endif
                        @if($user->pitch==4) 
                        	&emsp;高い</br>
                        @endif
                        @if($user->pitch==5) 
                        	&emsp;声がとても高い</br>
                        @endif
            </div>
            <div class='main2'>
                @foreach ($posts as $post)
                    <div class="post font-bold text-blue-500 py-2 px-4 my-8 border-8 w-1 border-blue-100 rounded-lg" >
                        <font size=5>ユーザー名</font>
                        &emsp;<a href="/users/{{$post->user->id}}">{{ $post->user->name }}</a></br>
                        <font size=5>曲名</font>
                        &emsp;{{ $post->song }}</br>
                        <font size=5>アーティスト名</font>
                        &emsp;{{ $post->artist }}</br>
                        <font size=5>点数</font>
                        &emsp;{{ $post->score }}</br>
                        <font size=5>感想</font>
                        &emsp;{{ $post->body }}</br>
                    </div>
                @endforeach
        </div>
        
    </body>
</html>
</x-app-layout>