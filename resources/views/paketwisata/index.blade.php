@extends('layouts.main')

@section('container')
<div class="container-xxl bg-dark hero-header">
  <div class="row text-white justify-content-center">
    <div style=" height: 100px"></div>
    <div class="col-8">
      <h1 class=" text-center text-white mb-2">Daftar Paket Wisata</h1>
      
      @foreach($posts as $post)
        @foreach($paketWisata as $paket)

          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-success-emphasis">Design</strong>
              <h3 class="mb-0"><a href="/paketwisata/{{ $paket->slug }}">{{ $paket->nama }}</a></h3>
              <div class="mb-1 text-body-secondary">{{ $paket->created_at->diffForHumans() }}</div>
              <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
              <a href="/paketwisata/{{ $paket->slug }}">
                Continue reading
              </a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <img width="200" height="350" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid">
            </div>
          </div>
        @endforeach
      @endforeach
      
      <ul>
      </ul>
    </div>
  </div>
</div>
@endsection