@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome back, {{ auth()->user()->name }}</h1>

  </div>
  <h3>Profile</h3>

  <h5>
    <b>Nama</b>  : {{ auth()->user()->name }} <br>
    <b>Email</b>  : {{ auth()->user()->email }} <br>
    <b>Dibuat</b>  : {{ auth()->user()->created_at->format('d F Y') }} || {{ auth()->user()->created_at->diffForHumans() }}<br>
    
  </h5>

  @can('admin', 'pengelola_paket_wisata','pengelola_wisata')  
    <h3>Activity</h3>
    @foreach ( $posts as $post)  
      @if ($loop->last)
        <h5>Total Post : {{$loop->count}}</h5>
      @endif
    @endforeach
  @endcan

@endsection