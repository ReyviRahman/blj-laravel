@extends('dashboard.layouts.layout')

@section('content')
<div>
  <h1 class="text-3xl">Edit Post</h1>
</div>

<form method="POST" action="/dashboard/posts/{{ $post->slug }}" enctype="multipart/form-data">
  @method('put')
  @csrf
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <div class="mt-2 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
          <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
          <div class="mt-2">
            <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 @error('title') !outline-red-500 @enderror ">
          </div>
          @error('title') 
            <span class="text-red-500 text-sm">{{ $message }}</span>
          @enderror
        </div>

        <div class="sm:col-span-3">
          <label for="slug" class="block text-sm/6 font-medium text-gray-900">Slug</label>
          <div class="mt-2">
            <input type="text" name="slug" id="slug" value="{{ old('slug', $post->slug) }}" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 @error('slug') !outline-red-500 @enderror">
          </div>
          @error('slug') 
            <span class="text-red-500 text-sm">{{ $message }}</span>
          @enderror
        </div>

        <div class="col-span-full">
          <label id="listbox-label" class="block text-sm/6 font-medium text-gray-900">Category</label>
          <div x-data="{ isOpen: false, selected: '{{ old('category_name', $post->category->name) }}', nilai: '{{ old('category_id', $post->category_id) }}' }" class="relative mt-2">
            <button type="button" @click="isOpen = !isOpen" class="grid w-full cursor-default grid-cols-1 rounded-md bg-white py-1.5 pr-2 pl-3 text-left text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
              <span class="col-start-1 row-start-1 flex items-center gap-1 pr-6 ps-2">
                <iconify-icon icon="material-symbols:category-outline" width="24" height="24"></iconify-icon>
                <span class="block truncate" x-text="selected"></span>
              </span>
              <svg class="col-start-1 row-start-1 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.22 10.22a.75.75 0 0 1 1.06 0L8 11.94l1.72-1.72a.75.75 0 1 1 1.06 1.06l-2.25 2.25a.75.75 0 0 1-1.06 0l-2.25-2.25a.75.75 0 0 1 0-1.06ZM10.78 5.78a.75.75 0 0 1-1.06 0L8 4.06 6.28 5.78a.75.75 0 0 1-1.06-1.06l2.25-2.25a.75.75 0 0 1 1.06 0l2.25 2.25a.75.75 0 0 1 0 1.06Z" clip-rule="evenodd" />
              </svg>
            </button>
        
            <ul x-show="isOpen" x-transition @click.away="isOpen = false" class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base ring-1 shadow-lg ring-black/5 focus:outline-none sm:text-sm" tabindex="-1" role="listbox" aria-labelledby="listbox-label">
              @foreach ($categories as $category)
              <li @click="selected = '{{ $category->name }}'; nilai = '{{ $category->id }}'; isOpen = false" class="hover:bg-amber-200 relative cursor-pointer py-2 pr-9 pl-3 text-gray-900 select-none" role="option">
                <div class="flex items-center">
                  <span class="ml-3 block truncate font-normal">{{ $category->name }}</span>
                </div>
              </li>
              @endforeach
            </ul>
            <input type="hidden" name="category_id" x-model="nilai">
            <input type="hidden" name="category_name" x-model="selected">
          </div>
        </div>

        <div class="col-span-full">
          <label for="body" class="block text-sm/6 font-medium text-gray-900">Body</label>
          <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
          <trix-editor input="body"></trix-editor>
          @error('body') 
            <span class="text-red-500 text-sm">{{ $message }}</span>
          @enderror
        </div>

        <div class="col-span-full">
          <label for="cover-photo" class="block text-sm/6 font-medium text-gray-900">Post Image</label>
          <input type="hidden" name="oldImage" value="{{ $post->image }}">
          <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 @error('image') !border-red-500 @enderror px-6 py-10">
            <div class="text-center">
              @if ($post->image)
                <img id="img-preview" src="{{ asset('storage/' . $post->image) }}" alt="preview" class="max-h-50 rounded object-fill">
                <svg id="placeholderImage" class="hidden mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                  <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                </svg>
              @else
                <img id="img-preview" src="" alt="preview" class="hidden max-h-50 rounded object-fill">
                <svg id="placeholderImage" class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                  <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                </svg>
              @endif

              <p class="inifilenya text-xs/5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
              <div class="mt-4 text-sm/6 text-gray-600">
                <label for="image" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 focus-within:outline-hidden hover:text-indigo-500">
                  <span>Upload a file</span>
                  <input id="image" name="image" type="file" class="sr-only">
                </label>
                <span>or drag and drop</span>
              </div>
              <p class="text-xs/5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
            </div>
          </div>
          @error('image') 
            <span class="text-red-500 text-sm">{{ $message }}</span>
          @enderror
        </div>
      </div>
    </div>
    <div class="border-b border-gray-900/10 pb-12">
      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
      </div>
    </div>
  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <a href="/dashboard/posts" class="font-semibold text-white rounded-md bg-red-600 hover:!bg-red-500 px-3 py-2 text-sm">Cancel</a>
    <button type="submit" class="rounded-md !bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:!bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 !focus-visible:outline-indigo-600">Save</button>
  </div>
</form>
@endsection

@section('scripts')
<script>
  
  document.addEventListener("DOMContentLoaded", function () {
  const dropArea = document.querySelector(".border-dashed");
  const fileInput = document.getElementById("image");

  dropArea.addEventListener("dragover", (event) => {
    event.preventDefault();
    dropArea.classList.add("border-indigo-600");
  });

  dropArea.addEventListener("dragleave", () => {
    dropArea.classList.remove("border-indigo-600");
  });

  dropArea.addEventListener("drop", (event) => {
    event.preventDefault();
    dropArea.classList.remove("border-indigo-600");

    if (event.dataTransfer.files.length > 0) {
      fileInput.files = event.dataTransfer.files;
      displayFileName(fileInput.files[0]);
    }
  });

  fileInput.addEventListener("change", () => {
    const imgPreview = document.getElementById('img-preview');

    if (fileInput.files.length > 0) {
      displayFileName(fileInput.files[0]);
    }
    document.getElementById('placeholderImage').style.display = 'none';

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(fileInput.files[0]);

    oFReader.onload = (oFREvent) => {
      imgPreview.src = oFREvent.target.result;
      console.log('tetrtukar')
    }
  });

  function displayFileName(file) {
    const textContainer = dropArea.querySelector(".inifilenya");
    textContainer.textContent = `Selected file: ${file.name}`;
  }
});

  const title = document.getElementById('title');
  const slug = document.getElementById('slug');

  title.addEventListener('change', () => {
    fetch('/dashboard/posts/checkSlug?title=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  })
</script>
@endsection
