@extends('layouts.main')

@section('container')

  <h1 class="text-3xl font-bold mb-8 text-center">{{ $title }}</h1>

  <form action="/blog">
    @if (request('category'))
      <input type="hidden" name="category" value="{{ request('category') }}">
    @endif
    @if (request('user'))
      <input type="hidden" name="user" value="{{ request('user') }}">
    @endif
    <div class="col-span-full">
      <div class="mt-2 flex gap-2">
        <input value="{{ request('search') }}" type="text" name="search" id="search" autocomplete="search" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="Search..." >
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 cursor-pointer">Search</button>
      </div>
      
    </div>
    
  </form>
  

  @if ($posts->count())
    <div class="bayang rounded mt-5">
      <div class="flex flex-col ">
        <img src="https://picsum.photos/500/300?grayscale" alt="..." class="max-h-100 rounded object-fill">
      </div>
      <div class="p-4 text-center"> 
        <h1 class="text-2xl font-semibold"> <a href="/blog/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a></h1>
        <p>By: <a href="/blog?user={{ $posts[0]->user->username }}" class="font-semibold relative text-gray-900 hover:text-gray-600 
          after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] 
          after:bg-gray-600 after:transition-all after:duration-300 hover:after:w-full">{{ $posts[0]->user->name }}</a> in <a href="/blog?category={{ $posts[0]->category->slug }}" class="relative text-gray-900 hover:text-gray-600 
          after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] 
          after:bg-gray-600 after:transition-all after:duration-300 hover:after:w-full font-semibold">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}</p>
        <p>{{ $posts[0]->excerpt }}</p>
      </div>
    </div>
  

  <div class="grid grid-cols-3 gap-4 mt-5">
    @foreach ($posts->skip(1) as $post)
      <div class="bayang rounded">
        <div class="flex flex-col ">
          <img src="https://picsum.photos/500/300?grayscale" alt="..." class="max-h-100 rounded object-fill">
        </div>
        <div class="p-4 text-center"> 
          <h1 class="text-2xl font-semibold"> <a href="/blog/{{ $post->slug }}">{{ $post->title }}</a></h1>
          <p>By: <a href="/blog?user={{ $post->user->username }}" class="font-semibold relative text-gray-900 hover:text-gray-600 
            after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] 
            after:bg-gray-600 after:transition-all after:duration-300 hover:after:w-full">{{ $post->user->name }}</a> in <a href="/blog?category={{ $post->category->slug }}" class="relative text-gray-900 hover:text-gray-600 
            after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] 
            after:bg-gray-600 after:transition-all after:duration-300 hover:after:w-full font-semibold">{{ $post->category->name }}</a> {{ $post->created_at->diffForHumans() }}</p>
          <p>{{ $post->excerpt }}</p>
        </div>
      </div>
    @endforeach
  </div>

  @else
    <p class="text-center">No Post Found</p>
  @endif

  <div class="mt-5">
    {{ $posts->links() }}
  </div>
@endsection