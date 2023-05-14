<x-app-layout>
    <x-slot name="header">
        　index
    </x-slot>

        <h1>掲示板</h1>
        <a href='/posts/create'>新規投稿</a>
        <div>
            @foreach ($posts as $post)
                <div style='border:solid 1px; margin-bottom: 10px;'>
                    <p>イベントの日付：</p><input type="date">
                    <p>タイトル：<a href="/posts/{{ $post->id }}">{{ $post->title }}</a></p>
                    <p>作成者：{{ $user->name }}</p>
                    {{--写真--}}
                    {{--<img src="{{ asset('storage/二郎.jpg')}}">--}}
                    <p>カテゴリー：{{ $post->category->name }}</a></p>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                    </form>
                </div>
            @endforeach
        </div>
        <div>
            {{ $posts->links() }}
        </div>
        <script>
            function deletePost(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
 </x-app-layout>
