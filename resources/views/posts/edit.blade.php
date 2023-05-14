<x-app-layout>
    <x-slot name="header">
        　edit
    </x-slot>
    
        <h1 class="title">編集画面</h1>
        <div class="content">
            <form enctype="multipart/form-data" action="/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='content__title'>
                    <p>イベントの日付</p>
                    <input type='text' name='post[date]' value="{{ $post->date }}">
                    <h2>タイトル</h2>
                    <input type='text' name='post[date]' value="{{ $post->date }}">
                </div>
                <div class='content__body'>
                    <h2>本文</h2>
                    <input type='text' name='post[body]' value="{{ $post->body }}">
                </div>
                 <img src='{{asset($post->img_path)}}' alt='画像'>
                <div><h3>画像</h3>
                <input type="file" name="image" />
                </div>
                <div>
                <h2>カテゴリー</h2>
                <select name="post[category_id]">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
                
                <input type="submit" value="保存">
            </form>
        </div>
        <div><a href="/">戻る</a></div>
 </x-app-layout>
