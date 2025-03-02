@extends('layouts.main')

@section('container')
  <h1 class="text-3xl font-semibold mb-1">Halaman about</h1>
  <h2 class="text-2xl font-semibold">{{ $name }}</h2>
  <p>{{ $email }}</p>
  <img class="mt-2 rounded-2xl" src="img/{{ $image }}" alt="" width="200">
@endsection