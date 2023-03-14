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
            <div class="px-6 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20 scale-100">
                    <div class="grid gap-8 gap-y-12 sm:max-w-sm sm:mx-auto lg:max-w-full scale-150">
                        <div class="p-8 bg-white border rounded shadow-sm">
                            <p class="mb-5 text-gray-700">
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
                            </p>
                        </div>
                        
                    </div>
                </div>
        
            <div class='main2'>
                 @foreach ($posts as $post)
                <div class="px-6 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20 scale-100">
                    <div class="grid gap-8 gap-y-12 sm:max-w-sm sm:mx-auto lg:max-w-full scale-150">
                        <div class="p-8 bg-white border rounded shadow-sm">
                            <p class="mb-3 text-xs font-semibold tracking-wide uppercase">
                                <a href="/" class="transition-colors duration-200 text-deep-purple-accent-400 hover:text-deep-purple-800" aria-label="Category">weekend</a>
                                <span class="text-gray-600">— 1 Feb 2020</span>
                            </p>
                            
                            <p class="mb-5 text-gray-700">
                                <font size=5>曲名</font>
                                &emsp;{{ $post->song }}</br>
                                <font size=5>アーティスト名</font>
                                &emsp;{{ $post->artist }}</br>
                                <font size=5>点数</font>
                                &emsp;{{ $post->score }}</br>
                                <font size=5>感想</font></br>
                                {{ $post->body }}</br>
                            </p>
                            <div class="flex items-center">
                                <div class="flex items-center">
                                    <a href="/" aria-label="Author" title="Author" class="mr-3">
                                      <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=750&amp;w=1260" alt="avatar" class="object-cover w-10 h-10 rounded-full shadow-sm" />
                                    </a>
                                    <div>
                                      <a href="/users/{{$post->user->id}}" aria-label="Author" title="Author" class="font-semibold text-gray-800 transition-colors duration-200 hover:text-deep-purple-accent-400">{{$post->user->name}}</a>
                                      <p class="text-sm font-medium leading-4 text-gray-600">Author</p>
                                    </div>
                                </div>
                            </div>
            
                                <form action="posts/{{$post->id}}" id="form_{{$post->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="buttom" onclick="deletePost({{$post->id}})">delete</button>
                        </div>
                        
                    </div>
                </div>
            @endforeach
        </div>
        
    </body>
</html>
</x-app-layout>