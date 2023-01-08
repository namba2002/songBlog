<x-app-layout>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <style>
            .main{
                display: flex;
            }
        </style>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>タイムライン</h1>
        
        <form class="flex items-center" action="/posts/serch" method="POST">
            @csrf
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-1/2">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="keyword" value="{{ old('keyword') }}" placeholder="Search">
            </div>
            </br></br>
            <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <span class="sr-only">Search</span>
            </button>
            <!-- checkbox -->
            <div class="flex">
                <input id="link-checkbox" type="checkbox" value="1" name="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="link-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">とても声が低い </label>&emsp;
                <input id="link-checkbox" type="checkbox" value="2" name="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="link-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">声が低い </label>&emsp;
                <input id="link-checkbox" type="checkbox" value="3" name="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="link-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">普通 </label>&emsp;
                <input id="link-checkbox" type="checkbox" value="4" name="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="link-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">声が高い </label>&emsp;
                <input id="link-checkbox" type="checkbox" value="5" name="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="link-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">とても声が高い </label>&emsp;
            </div>
        </form>

        <div class=create>
            <a href='/posts/create'>新規投稿</a>
        </dvi>
        <div class='main'>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class="post font-bold text-blue-500 py-2 px-4 my-8 border-8 w-1/2 border-blue-100 rounded-lg" >
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
                   @if($post->user->id==$user_id)
                    <form action="posts/{{$post->id}}" id="form_{{$post->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="buttom" onclick="deletePost({{$post->id}})">delete</button>
                    @endif
                </div>
            @endforeach
        </div>
        <div class='main'>
            <a href="/users/{{$user_id}}">マイページ</a>
        </div>
        
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        <div class="footer">
            <a href="/">戻りましょうか</a>
        </div>
        
        <script>
            function deletePost(id){
                'use strict'
                
                if(confirm('削除すると復元できません。\n本当に削除しますか？')){
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</html>
</x-app-layout>