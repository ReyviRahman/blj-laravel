@extends('dashboard.layouts.layout')

@section('content')
@if (session()->has('success'))
  <p>{{ session('success') }}</p>
@endif

<a href="/dashboard/categories/create" class="bg-[#4F959D] rounded text-white px-3 py-1 font-semibold mb-5">Create Post Category</a>

<div x-data="{ isOpen: false, categoryId: '' }">
  <table class="w-full overflow-x-auto table-auto border-collapse border border-gray-400 rounded-lg">
    <thead class="bg-gray-200!">
      <tr>
        <th class="border border-gray-400! p-3 text-center">No</th>
        <th class="border border-gray-400! p-3 text-center">Category Name</th>
        <th class="border border-gray-400! p-3 text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $category)
        <tr class="even:bg-gray-200">
          <td class="border border-gray-400! py-2 px-4 text-center">{{ $loop->iteration }}</td>
          <td class="border border-gray-400! py-2 px-4">{{ $category->name }}</td>
          <td class="border border-gray-400! py-2 px-4">
            <div class="flex gap-2 justify-center">
              <a href="/dashboard/categories/{{ $category->slug }}" class="bg-gray-400 px-2 py-1 rounded-md flex items-center transition hover:bg-gray-500">
                <iconify-icon icon="material-symbols:file-export-outline" width="24" height="24"></iconify-icon>
              </a>
              <a href="/dashboard/categories/{{ $category->slug }}/edit" class="bg-[#F6DC43] px-2 py-1 rounded-md flex items-center transition hover:bg-yellow-400">
                <iconify-icon icon="material-symbols:edit-document-outline-rounded" width="24" height="24"></iconify-icon>
              </a>
              <button type="button" @click="isOpen = true; categoryId = '{{ $category->slug }}'" class="!bg-[#E52020] px-2 py-1 rounded-md flex items-center transition hover:!bg-red-500">
                <iconify-icon icon="material-symbols:scan-delete-outline-rounded" width="24" height="24"></iconify-icon>
              </button>
              </form>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  
  <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <!--
      Background backdrop, show/hide based on modal state.
  
      Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <div 
    x-show="isOpen"
      x-transition:enter="transition ease-out duration-100 transform"
      x-transition:enter-start="opacity-0 scale-95"
      x-transition:enter-end="opacity-100 scale-100"
      x-transition:leave="transition ease-in duration-75 transform"
      x-transition:leave-start="opacity-100 scale-100"
      x-transition:leave-end="opacity-0 scale-95"
    class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>
  
    <div 
    x-show="isOpen"
      x-transition:enter="ease-out duration-300"
      x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
      x-transition:leave="ease-in duration-200"
      x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
      x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    class="fixed inset-0 z-10 w-screen overflow-y-auto">
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
                  <p class="text-sm text-gray-500">Kamu yakin ingin menghapus postingan?. This action cannot be undone.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 gap-2">
            <form :action="'/dashboard/categories/' + categoryId" method="POST">
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
@endsection