<x-app-layout>
    <x-slot name="header">
        　create
    </x-slot>
    
        <h1>掲示板に投稿！</h1>
        <h2>投稿作成</h2>
        <form enctype="multipart/form-data" action="/posts" method="POST">
            @csrf
            <div>
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
            <input type="submit" value="保存"/>
        </form>
        <div><a href="/">戻る</a></div>
 </x-app-layout>