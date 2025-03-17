@extends('dashboard.layouts.layout')

@section('content')
<article>
  <h3 class="mt-3 text-3xl font-semibold text-gray-900 group-hover:text-gray-600">
      {{ $post->title }}
  </h3>

  <div x-data="{ isOpen: false}" class="flex gap-2">
    <a href="/dashboard/posts" class="bg-gray-400 rounded flex pe-2 font-semibold"><iconify-icon icon="material-symbols:arrow-back-rounded" width="24" height="24"></iconify-icon> Back to all my posts</a>
    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="bg-[#F6DC43] rounded flex pe-2 font-semibold"><iconify-icon icon="material-symbols:edit-document-outline-rounded" width="24" height="24"></iconify-icon> Edit</a>

    <button type="button" @click="isOpen = true" class="!bg-[#E52020] rounded flex pe-2 font-semibold"><iconify-icon icon="material-symbols:scan-delete-outline-rounded" width="24" height="24"></iconify-icon> Delete</button>

    <div
    x-show="isOpen"
    x-transition:enter="ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
    x-transition:leave="ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
     class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
      <!--
        Background backdrop, show/hide based on modal state.
    
        Entering: "ease-out duration-300"
          From: "opacity-0"
          To: "opacity-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100"
          To: "opacity-0"
      -->
      <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>
    
      <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:items-center sm:p-0">
          <!--
            Modal panel, show/hide based on modal state.
    
            Entering: "ease-out duration-300"
              From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
              To: "opacity-100 translate-y-0 sm:scale-100"
            Leaving: "ease-in duration-200"
              From: "opacity-100 translate-y-0 sm:scale-100"
              To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          -->
          <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
              <div class="sm:flex sm:items-start">
                <div class="mx-auto flex size-12 shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:size-10">
                  <svg class="size-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                  </svg>
                </div>
                <div class="sm:mt-0 sm:ml-4 sm:text-left">
                  <h3 class="text-base font-semibold text-gray-900" id="modal-title">Hapus Postingan</h3>
                  <div class="mt-2">
                    <p class="text-sm text-gray-500">Kamu yakin ingin menghapus postingan ini?. This action cannot be undone.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 gap-2">
              <form action="/dashboard/posts/{{ $post->slug }}" method="POST">
                @method('delete')
                @csrf
                <button type="submit" class="mt-3 inline-flex w-full justify-center rounded-md !bg-red-500 hover:!bg-red-400 px-3 py-2 text-sm font-semibold text-white ring-1 shadow-xs ring-gray-300 ring-inset sm:mt-0 sm:w-auto">Delete</button>
              </form>
              
              <button type="button" @click="isOpen = !isOpen" class="mt-3 inline-flex  justify-center rounded-md border !border-gray-900 px-3 py-2 text-sm font-semibold text-gray-900 ring-1 shadow-xs ring-gray-300 ring-inset hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="flex flex-col mt-5 mb-5">
    <img src="https://picsum.photos/500/300?grayscale" alt="..." class="max-h-100 rounded object-fill">
  </div>
  {!! $post->body !!}
</article>
@endsection