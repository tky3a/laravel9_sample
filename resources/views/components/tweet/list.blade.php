@props([
    'tweets' => [],
])

<div class="mt-5 mb-5 rounded-md bg-white shadow-lg">
  <ul>
    @foreach ($tweets as $tweet)
      <li class="flex items-start justify-between border-b border-gray-200 p-4 last:border-b-0">
        <div>
          <span class="mb-2 inline-block rounded-full bg-gray-100 px-2 py-1 text-xs text-gray-600">
            {{ $tweet->user->name }}
          </span>
          {{-- 改行コードを<br>に変換して表示 --}}
          <p>{!! nl2br(e($tweet->content)) !!}</p>
        </div>
      </li>
    @endforeach
  </ul>
</div>
