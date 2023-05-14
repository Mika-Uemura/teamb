<x-app-layout>
    <x-slot name="header">
        　create
    </x-slot>
    
        <h1>掲示板に投稿！</h1>
        <h2>投稿作成</h2>
        <form enctype="multipart/form-data" action="/posts" method="POST">
            @csrf
            <div>
                <p>イベントの日付：<a href="/posts/{{ $post->id }}">{{ $post->date }}</a></p>
                <h2>タイトル</h2>
                <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            
            <div><h3>画像</h3>
                <input type="file" name="image" />
            </div>

            
            <div>
                <h2>本文</h2>
                <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。">{{ old('post.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <div>
                <h2>カテゴリー</h2>
                <select name="post[category_id]">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">保存</button>
        </form>
        <div><a href="/">戻る</a></div>
 </x-app-layout>