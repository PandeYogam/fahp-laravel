@extends('layouts.main')

@section('container')
<div class="container-xxl bg-dark hero-header">
  <div class="row justify-content-center text-white">
    <div style=" height: 100px"></div>
    <div class="col-8">
      
        <h1 class="mb-3 text-white text-center">{{ $paketWisata->nama }}</h1>
        
        {{-- @if ($post->image)
          <div style="max-height: 350px; overflow:hidden" >
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid mt-3">
          </div>
        @else
          <img src="https://source.unsplash.com/600x400?{{ $post->title }}" class="card-img-top" alt="{{ $post->title }}">
        @endif --}}

        <div id="carouselExample" class="carousel slide">
          <div class="carousel-inner">
            {{-- @php
              $randomPosts = $total_posts->random($jumlahwisata);
            @endphp --}}
            @foreach ($wisataPosts as $index => $randomPost)
              <div class="carousel-item{{ $index === 0 ? ' active' : '' }}">
                <img src="{{ asset('storage/' . $randomPost->image) }}" class="d-block mx-auto" alt="...">
              </div>
            @endforeach
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
  
        <article class="my-3 fs-5">
          <h3 class="text-white text-center m-0">Wisata yang dikunjungi</h3>
          <div class=" justify-content-center text-center mb-2">
            @foreach ($wisataPosts as $key => $post)
                <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
                @if (!$loop->last)
                    |
                @endif
            @endforeach
          </div>
          <h3 class="text-white align-items">Details</h3>
              {{-- <p>Lokasi : {{ $paketWisata->lokasi }}, {{ $paketWisata->lokasi_Detail }}</p> --}}
              <ul>
                <li>Harga Paket wisata : {{ $paketWisata->terbilang }}</li>
                <li>Popularitas paket ini dipesan dalam seminggu : {{ $paketWisata->popularitas }} kali</li>
                <li>
                  Rating Paket wisata  : 
                  <i class="bi bi-star-fill pe-1"></i>
                  {{ $paketWisata->rating }} / 10
                </li>
                <li>
                  Durasi Paket wisata  : 
                  @if ($paketWisata->durasi == 0.5)
                    1/2 Hari
                  @else
                    {{ $paketWisata->popularitas }} Hari
                  @endif
                </li>
                <li>Jumlah Wisata Dikunjungi : {{ $paketWisata->jumlah_wisata_dikunjungi }}</li>
              </ul>
          


          {{-- @php
            $randomPosts = $total_posts->random();
          @endphp --}}
          {!! $paketWisata->body !!}
        </article>

        {{-- <div class="container text-center text-white">
          <div class="row justify-content-start">
            <div class="table-responsive mb-1 mt-3 text-center">
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th width="20%" class=" bg-light text-secondary">Harga</th>
                    <th width="20%" class=" bg-light text-secondary">Popularitas</th>
                    <th width="20%" class=" bg-light text-secondary">Rating</th>
                    <th width="20%" class=" bg-light text-secondary">Durasi</th>
                    <th width="20%" class=" bg-light text-secondary">Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="text-white">
                    <td class="text-center border border-left-0">{{ $paketWisata->harga}}</td>
                    <td class="text-center border border-left-0">{{ $paketWisata->popularitas}}</td>
                    <td class="text-center border border-left-0">{{ $paketWisata->rating}}</td>
                    <td class="text-center border border-left-0">{{ $paketWisata->durasi}}</td>
                    <td class="text-center border border-left-0">{{ $paketWisata->jumlah_wisata_dikunjungi}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div> --}}
    </div>
  </div>
</div>
@endsection