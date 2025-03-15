@extends('dashboard.layouts.layout')

@section('content')
<article>
  <h3 class="mt-3 text-3xl font-semibold text-gray-900 group-hover:text-gray-600">
      {{ $post->title }}
  </h3>

  <div class="flex gap-2">
    <a href="/dashboard/posts" class="bg-gray-400 rounded flex pe-2 font-semibold"><iconify-icon icon="material-symbols:arrow-back-rounded" width="24" height="24"></iconify-icon> Back to all my posts</a>
    <a href="/dashboard/posts" class="bg-[#F6DC43] rounded flex pe-2 font-semibold"><iconify-icon icon="material-symbols:edit-document-outline-rounded" width="24" height="24"></iconify-icon> Edit</a>
    <a href="/dashboard/posts" class="bg-[#E52020] rounded flex pe-2 font-semibold"><iconify-icon icon="material-symbols:scan-delete-outline-rounded" width="24" height="24"></iconify-icon> Delete</a>
  </div>
  
  
  <div class="flex flex-col mt-5 mb-5">
    <img src="https://picsum.photos/500/300?grayscale" alt="..." class="max-h-100 rounded object-fill">
  </div>
  <p class="mt-2">{{ $post->body }}</p>
</article>
@endsection