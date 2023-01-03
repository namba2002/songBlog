<x-app-layout>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>タイムライン</h1>
        
        <div class=create>
            <a href='/posts/create'>新規投稿</a>
        </dvi>
        <div class='main'>
        
        <div class='main'>
            <a href="/posts/mypage">マイページ</a>
        </div>
        
        </div>
        
        <div class="footer">
            <a href="/">戻る</a>
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