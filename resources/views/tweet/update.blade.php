<x-layout title="編集 | つぶやきアプリ">
  <x-layout.single>
    <h2 class="mt-8 mb-8 text-center text-4xl font-bold text-blue-500">つぶやきアプリ</h2>
    @php
      $breadcrumbs = [['href' => route('tweet.index'), 'label' => 'TOP'], ['href' => '#', 'label' => ' 編集']];
    @endphp
    <x-element.breadcrumbs :breadcrumbs="$breadcrumbs">

    </x-element.breadcrumbs>
    <x-tweet.form.put :tweet="$tweet"></x-tweet.form.put>
  </x-layout.single>
</x-layout>
