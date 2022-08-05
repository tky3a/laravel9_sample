@props([
    'images' => [],
])

@if (count($images) > 0)
  <div x-data="{}" class="px-2">
    <div class="-mx-2 flex justify-center">
      @foreach ($images as $image)
        <div class="mt-5 w-1/6 px-2">
          <div class="bg-gray-400">
            <a @click="$dispatch('img-modal', {imgModalSrc: '{{ asset('storage/images/' . $image->name) }}' })"
              class="cursor-pointer">
              <img src="{{ asset('storage/images/' . $image->name) }}" alt="{{ $image->name }}" class="object-fit w-full">
            </a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endif

@once
  <div x-data="{ imgModal: false, imgModalSrc: '' }">
    <div @img-modal.window="imgModal = true; imgModalSrc = $event.detail.imgModalSrc;" x-cloak x-show="imgModal"
      x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform"
      x-transition:enter-end="opacity-100 transform" x-transition:leave="transition ease-in duration-300"
      x-transition:leave-start="opacity-100 transform" x-transition:leave-end="opacity-0 transform"
      x-on:click.away="imgModalSrc=''"
      class="h-100 fixed inset-0 z-50 flex w-full items-center justify-center overflow-hidden bg-black bg-opacity-75 p-2">
      <div @click.away="imgModal = ''" class="flex max-h-full max-w-3xl flex-col overflow-auto">
        <div class="z-50">
          <button @click="imgModal = ''" class="float-right pt-2 pr-2 outline-none focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="p-2">
          <img src="imgModalSrc" alt="imgModalSrc" class="h-1/2-screen object-contain">
        </div>
      </div>
    </div>
  </div>
  @push('css')
    <style>
      [x-cloak] {
        display: none !important;
      }
    </style>
  @endpush
@endonce
