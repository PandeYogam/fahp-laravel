@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Package</h1>
</div>

<div class="col-lg-8">
  <form action="/dashboard/subkriteria/{{ $subkriteria->id}}" method="POST" class="mb-5" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama', $subkriteria->nama) }}">
      @error('nama')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="rentang_min" class="form-label">rentang_min</label>
      <input type="text" class="form-control @error('rentang_min') is-invalid @enderror" id="rentang_min" name="rentang_min" required autofocus value="{{ old('rentang_min', $subkriteria->rentang_min) }}">
      @error('rentang_min')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="rentang_max" class="form-label">rentang_max</label>
      <input type="text" class="form-control @error('rentang_max') is-invalid @enderror" id="rentang_max" name="rentang_max" required autofocus value="{{ old('rentang_max', $subkriteria->rentang_max) }}">
      @error('rentang_max')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    
    <div class="mb-3">
      <label for="bobot" class="form-label">bobot</label>
      <input type="text" class="form-control @error('bobot') is-invalid @enderror" id="bobot" name="bobot" required autofocus value="{{ old('bobot', $subkriteria->bobot) }}">
      @error('bobot')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>


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