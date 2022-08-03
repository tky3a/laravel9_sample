<!doctype html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, minimum-scale=1.0">
  <title>つぶやきアプリ</title>
</head>

{{-- <body> --}}
<x-layout title="TOP | つぶやき">
  <x-layout.single>
    <h2 class="mt-8 mb-8 text-center text-4xl font-bold text-blue-500">
      つぶやきアプリ
    </h2>
    <x-tweet.form.post></x-tweet.form.post>
    <x-tweet.list :tweets="$tweets"></x-tweet.list>
  </x-layout.single>
</x-layout>

</html>
