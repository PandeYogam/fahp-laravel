@extends('layouts.main')

@section('container')
<div class="container-xxl bg-dark hero-header">
  <div class="row text-white justify-content-center">
    <div style=" height: 100px"></div>
    <div class="col-8">
      <h1 class=" text-center text-white">Daftar Paket Wisata</h1>

      <h5 class=" p-0 m-0 text-light text-center  mb-4">Total Paket Wisata : {{$jumlahwisata}}</h5>
      {{-- "jumlahwisata" => $jumlahwisata, --}}

      
      @foreach($paketWisata as $paket)
          @php
            $randomPosts = $posts->random();
          @endphp
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col-9 p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-success-emphasis">
                <i class="bi bi-star-fill pe-1"></i>
                {{ $paket->rating }} / 10
              </strong>
              <h3 class="mb-0"><a href="/paketwisata/{{ $paket->slug }}">{{ $paket->nama }}</a></h3>
              <div class="mb-1 text-body-secondary">{{ $paket->created_at->diffForHumans() }}</div>
              <p class="mb-2">{{ $randomPosts->body }}</p>
              <a href="/paketwisata/{{ $paket->slug }}">
                Continue reading
              </a>
            </div>
            
            <div class="col-3 d-none d-lg-block">
              <img src="{{ asset('storage/' . $randomPosts->image) }}" alt="{{ $randomPosts->title }}"  height="222px">
            </div>
            
          </div>
        @endforeach
      
      <ul>
      </ul>
    </div>
  </div>
</div>
@endsection