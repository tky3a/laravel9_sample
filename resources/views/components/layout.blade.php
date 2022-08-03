{{-- デフォルトの大枠 --}}
<!doctype html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, minimum-scale=1.0">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <title>{{ $title ?? 'つぶやきアプリ' }}</title>
  {{-- stackすることで@pushしたCSSを読み込み可能 --}}
  @stack('css')
</head>

<body class="bg-gray-100 pl-2 pr-2">
  {{ $slot }}
</body>

</html>
