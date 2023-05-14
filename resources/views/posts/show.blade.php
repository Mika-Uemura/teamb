<x-app-layout>
    <x-slot name="header">
        　show
    </x-slot>
    
        <h1>詳細画面</h1>
        <div>
            <p>日付：{{ $post->date }}</p>
            <p>タイトル：{{ $post->title }}</p>
            <p>本文：{{ $post->body }}</p>
            <p>カテゴリー：<a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a></p>
            <img src='{{asset($post->img_path)}}' alt='画像'>
            
        </div>
        <div>
            <p class="edit">[<a href="/posts/{{ $post->id }}/edit">編集</a>]</p>
            <a href="/">戻る</a>
        </div>
 </x-app-layout>