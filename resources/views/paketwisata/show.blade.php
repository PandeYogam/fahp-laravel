@extends('layouts.main')

@section('container')
<div class="container-xxl bg-dark hero-header">
  <div class="row justify-content-center text-white">
    <div style=" height: 100px"></div>
    <div class="col-8 text-center">
      
        <h1 class="mb-3 text-white">{{ $paketWisata->nama }}</h1>
        
        @if ($post->image)
          <div style="max-height: 350px; overflow:hidden" >
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid mt-3">
          </div>
        @else
          <img src="https://source.unsplash.com/600x400?{{ $post->title }}" class="card-img-top" alt="{{ $post->title }}">
        @endif
  
        <article class="my-3 fs-5">
          {!! $post->body !!}
        </article>

        <div class="container text-center text-white">
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
        </div>
    </div>
  </div>
</div>
@endsection