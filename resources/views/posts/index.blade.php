<x-app-layout>
    <x-slot name="header">
        　index
    </x-slot>

        <h1>掲示板</h1>
        @if(Auth::user()->authority==1)
        <a href='/posts/create'>新規投稿</a>
        @endif
        
        <div>
            @foreach ($posts as $post)
                <div style='border:solid 1px; margin-bottom: 10px;'>
                    <p>イベントの日付：{{ $post->date }}</p>
                    <p>タイトル：<a href="/posts/{{ $post->id }}">{{ $post->title }}</a></p>
                    <img src='{{asset($post->img_path)}}' alt='画像'>
                    <p>カテゴリー：{{ $post->category->name }}</a></p>
                    <p>{{$post->user->name}}</p>
                    @auth
                    @if($post->user_id==Auth::id())
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                    </form>
                    @endif
                    @endauth
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
