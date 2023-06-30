@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create A New Package</h1>
  </div>

  <div class="col-lg-8">
    <form action="/dashboard/paketwisata" method="post" class="mb-5" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama') }}">
        @error('nama')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}">
        @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="harga" class="form-label">harga</label>
        <input type="number" step="50000" pattern="\d+" min="0" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" required ="{{ old('harga') }}">
        @error('harga')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      
      <div class="mb-3">
        <label for="popularitas" class="form-label">Popularitas</label>
        <input type="number" step="1" pattern="\d+" min="0" max="10" class="form-control @error('popularitas') is-invalid @enderror" id="popularitas" name="popularitas" required ="{{ old('popularitas') }}">
        @error('popularitas')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="rating" class="form-label">rating</label>
        <input type="number" step="1" pattern="\d+" min="0" max="10" class="form-control @error('rating') is-invalid @enderror" id="rating" name="rating" required ="{{ old('rating') }}">
        @error('rating')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      
      <div class="mb-3">
        <label for="durasi" class="form-label">durasi</label>
        <input type="number" step="1" pattern="\d+" min="0" class="form-control @error('durasi') is-invalid @enderror" id="durasi" name="durasi" required ="{{ old('durasi') }}">
        @error('durasi')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="jumlah_wisata_dikunjungi" class="form-label">jumlahwisata</label>
        <input type="number" step="1" pattern="\d+" min="0"  class="form-control @error('jumlah_wisata_dikunjungi') is-invalid @enderror" id="jumlah_wisata_dikunjungi" name="jumlah_wisata_dikunjungi" required ="{{ old('jumlah_wisata_dikunjungi') }}">
        @error('jumlah_wisata_dikunjungi')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      {{-- <a href=""></a> --}}
      <button type="submit" class="btn btn-primary">Create Package</button>
    </form>
  </div>

  <script>
    const title = document.querySelector("#nama");
    const slug = document.querySelector("#slug");

    title.addEventListener('change', function() {
      fetch('/dashboard/checkSlug?title=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
    });

    // function previewImage(){
    //   const image = document.querySelector('#image');
    //   const imgPreview = document.querySelector('.img-preview');

    //   imgPreview.style.display = 'block';

    //   const oFReader = new FileReader();
    //   oFReader.readAsDataURL(image.files[0]);
      
    //   oFReader.onload = function(oFREvent){
    //     imgPreview.src = oFREvent.target.result;
    //   }
    // }
  </script>

@endsection