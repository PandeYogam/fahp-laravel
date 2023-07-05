@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Package</h1>
</div>

<div class="col-lg-8">
  <form action="/dashboard/paketwisata/{{ $paketwisata->slug }}" method="POST" class="mb-5" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama', $paketwisata->nama) }}">
      @error('nama')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    
    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $paketwisata->slug) }}">
      @error('slug')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="harga" class="form-label">harga</label>
      <input type="number" step="50000" pattern="\d+" min="0" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" required value="{{ old('harga', $paketwisata->harga) }}">
      @error('harga')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    
    <div class="mb-3">
      <label for="popularitas" class="form-label">Popularitas</label>
      <input type="number" step="1" pattern="\d+" min="0" max="10" class="form-control @error('popularitas') is-invalid @enderror" id="popularitas" name="popularitas" required value="{{ old('popularitas', $paketwisata->popularitas) }}">
      @error('popularitas')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="rating" class="form-label">rating</label>
      <input type="number" step="1" pattern="\d+" min="0" max="10" class="form-control @error('rating') is-invalid @enderror" id="rating" name="rating" required value="{{ old('rating', $paketwisata->rating) }}">
      @error('rating')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    
    <div class="mb-3">
      <label for="durasi" class="form-label">durasi</label>
      <input type="number" step="1" pattern="\d+" min="0" class="form-control @error('durasi') is-invalid @enderror" id="durasi" name="durasi" required value="{{ old('durasi', $paketwisata->durasi) }}">
      @error('durasi')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="jumlah_wisata_dikunjungi" class="form-label">jumlahwisata</label>
      <input type="number" step="1" pattern="\d+" min="0"  class="form-control @error('jumlah_wisata_dikunjungi') is-invalid @enderror" id="jumlah_wisata_dikunjungi" name="jumlah_wisata_dikunjungi" required value="{{ old('jumlah_wisata_dikunjungi', $paketwisata->jumlah_wisata_dikunjungi) }}">
      @error('jumlah_wisata_dikunjungi')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    {{-- <div class="mb-3">
      <label for="category" class="form-label">Category</label>
      <select class="form-select" name="category_id">
        @foreach ($categories as $category)
        @if (old('category_id', $package->category_id) == $category->id)
        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
        @else
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endif
        @endforeach
      </select>
    </div> --}}

    {{-- <div class="mb-3">
      <label for="image" class="form-label">Post Image</label>
      <input type="hidden" name="oldImage" value="{{ $post->image }}">
      @if ($post->image)
        <img src="{{ asset('storage/'. $post->image) }}" class=" img-preview img-fluid mb-3 col-sm-5 d-block">
      @else
        <img class=" img-preview img-fluid mb-3 col-sm-5">
      @endif
      <img class=" img-preview img-fluid mb-3 col-sm-5">
      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
      
      <div id="emailHelp" class="form-text">Ukuran foto harus kurang dari 1 Mb</div>
      @error('image')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div> --}}

    {{-- <div class="mb-3">
      <label for="image" class="form-label">Post Image</label>
      <input class="form-control" type="file" id="image" name="image">
    </div> --}}

    {{-- <div class="mb-3">
      <label for="body" class="form-label">Body</label>
      @error('body')
      <p class="text-danger">{{ $message }}</p>
      @enderror
      <input id="body" type="hidden" name="body" value="{{ old('body', $package->body) }}">
      <trix-editor input="body"></trix-editor>
    </div> --}}

    {{-- <a href=""></a> --}}
    <button type="submit" class="btn btn-primary">Update Package</button>
  </form>
</div>

<script>
  const title = document.querySelector("#nama");
  const slug = document.querySelector("#slug");

  nama.addEventListener('change', function() {
    fetch('/dashboard/checkSlug?title=' + nama.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });

  // function previewImage(){
  //     const image = document.querySelector('#image');
  //     const imgPreview = document.querySelector('.img-preview');

  //     imgPreview.style.display = 'block';

  //     const oFReader = new FileReader();
  //     oFReader.readAsDataURL(image.files[0]);
      
  //     oFReader.onload = function(oFREvent){
  //       imgPreview.src = oFREvent.target.result;
  //     }
  //   }
</script>

@endsection