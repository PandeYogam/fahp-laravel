@extends('layouts.main')

@section('container')


<div class="fullDiv bg-dark hero-header">
  <div style=" height: 60px"></div>
  <div class=" text-center ">
    <h1 class="display-3 text-white animated mt-5">Hasil Rekomendasi Paket Pariwisata</h1> 
    <h4 class="text-white">Silahkan Pilih Paket pariwisata yang paling cocok </h4>
    <p class="text-white">Selamat datang di Badung</p>
  </div>

  <form action="">
    <div class=" bg-secondary container text-center mb-3 mt-5">
      <div class="row align-items-center mb-3">
        <div class=" col">
          <h5 class=" text-white animated">Budget</h5>
          <input type="number" step="1" pattern="\d+" min="0" max="10" class="form-control" id="budget">
        </div>
        <div class=" col">
          <h5 class=" text-white animated">Budget</h5>
          <input type="number" step="1" pattern="\d+" min="0" max="10" class="form-control" id="budget">
        </div>
        <div class=" col">
          <h5 class=" text-white animated">Budget</h5>
          <input type="number" step="1" pattern="\d+" min="0" max="10" class="form-control" id="budget">
        </div>
        <div class=" col">
          <h5 class=" text-white animated">Budget</h5>
          <input type="number" step="1" pattern="\d+" min="0" max="10" class="form-control" id="budget">
        </div>
        <div class=" col">
          <h5 class=" text-white animated">Budget</h5>
          <input type="number" step="1" pattern="\d+" min="0" max="10" class="form-control" id="budget">
        </div>
      </div>

      <button type="submit" class="btn btn-primary mt-5 px-3">Submit</button>
    </div>
  </form>

  <div class=" bg-danger container text-center mt-5">
    <div class="row align-items-center mb-3">
      <div class=" col">
        <button type="submit" class="btn btn-primary px-3">Perhitungan</button>
      </div>
      <div class=" col">
        <button type="submit" class="btn btn-primary  px-3">Cek Hasil</button>
      </div>
    </div>

  </div>
</div>
@endsection