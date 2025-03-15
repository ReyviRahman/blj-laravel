@extends('dashboard.layouts.layout')

@section('content')
<table class="w-full overflow-x-auto table-auto border-collapse border border-gray-400 rounded-lg">
  <thead class="bg-gray-200!">
    <tr>
      <th class="border border-gray-400! p-3 text-center">No</th>
      <th class="border border-gray-400! p-3 text-center">Title</th>
      <th class="border border-gray-400! p-3 text-center">Category</th>
      <th class="border border-gray-400! p-3 text-center">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
      <tr class="even:bg-gray-200">
        <td class="border border-gray-400! py-2 px-4 text-center">{{ $loop->iteration }}</td>
        <td class="border border-gray-400! py-2 px-4">{{ $post->title }}</td>
        <td class="border border-gray-400! py-2 px-4">{{ $post->category->name }}</td>
        <td class="border border-gray-400! py-2 px-4">
          <div class="flex gap-2 justify-center">
            <a href="/dashboard/posts/{{ $post->slug }}" class="bg-gray-400 px-2 py-1 rounded-md flex items-center transition hover:bg-gray-500">
              <iconify-icon icon="material-symbols:file-export-outline" width="24" height="24"></iconify-icon>
            </a>
            <a href="/dashboard/posts/{{ $post->slug }}" class="bg-[#F6DC43] px-2 py-1 rounded-md flex items-center transition hover:bg-yellow-400">
              <iconify-icon icon="material-symbols:edit-document-outline-rounded" width="24" height="24"></iconify-icon>
            </a>
            <a href="/dashboard/posts/{{ $post->slug }}" class="bg-[#E52020] px-2 py-1 rounded-md flex items-center transition hover:bg-red-600">
              <iconify-icon icon="material-symbols:scan-delete-outline-rounded" width="24" height="24"></iconify-icon>
            </a>
          </div>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection