@component('mail::message')

  # {{ $count }}件のつぶやきが追加されました。

  {{ $toUser->name }}さんこんにちは！

  昨日は{{ $count }}件のつぶやきが追加されましたよ！最新のつぶやきを見に行きましょう。

  @component('mail::button', ['url' => route('tweet.index')])
    つぶやきを見にいく
  @endcomponent

@endcomponent
