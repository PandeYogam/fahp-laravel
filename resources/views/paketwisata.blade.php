@extends('layouts.main')

@section('container')
<div class="container-xxl bg-dark hero-header">
  <div class="row justify-content-center text-white">
    <div style=" height: 100px"></div>
    <div class="col-8 text-center">
      <h2>ini 1</h2>

      <h2>

        @foreach ($paketwisata as $paket)
          
          {{ $paket->nama }}
          {{ $paket->slug }}
        @endforeach
        
      </h2>
    </div>
  </div>
</div>

  
@endsection