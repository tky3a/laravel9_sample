@component('mail::message')
  # {{ $subject }}

  {{ $toUser->name }}さんこんにちは！

  新しく{{ $newUser->name }}さんが参加しました！
@endcomponent
