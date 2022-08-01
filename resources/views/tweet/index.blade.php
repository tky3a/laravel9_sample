<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, minimum-scale=1.0">
    <title>つぶやきアプリ</title>
</head>

<body>
    <h1>つぶやきアプリ</h1>
    @auth
        <div>
            <p>投稿フォーム</p>
            <form action="{{ route('tweet.create') }}" method="post">
                @csrf
                <label for="tweet-content">つぶやき</label>
                <span>140文字まで</span>
                <textarea name="tweet" id="tweet-content" type="text" placeholder="つぶやきを入力してください。"></textarea>
                @error('tweet')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
                <button type="submit">投稿</button>
            </form>
            <div>
                @foreach ($tweets as $tweet)
                    <details>
                        <summary>{{ $tweet->content }}</summary>
                        <div>
                            <a href="{{ route('tweet.update.index', ['tweetId' => $tweet->id]) }}">編集</a>
                            <form action="{{ route('tweet.delete', ['tweetId' => $tweet->id]) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit">削除</button>
                            </form>
                        </div>
                    </details>
                @endforeach
            </div>
        </div>
    @endauth
</body>

</html>
