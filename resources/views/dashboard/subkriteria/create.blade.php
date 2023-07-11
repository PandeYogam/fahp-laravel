@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create Kondisi Kriteria</h1>
  </div>

  

  <div class="col-lg-8">
    <form action="/dashboard/subkriteria" method="post" class="mb-5" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="nama" class="form-label">Kriteria</label>
        <select class="form-select" name="nama">
          <option value="harga" selected>harga</option>
          <option value="popularitas" selected>popularitas</option>
          <option value="rating" selected>rating</option>
          <option value="durasi" selected>durasi</option>
          <option value="jumlah_wisata_dikunjungi" selected>jumlah wisata</option>
        </select>
      </div>

      <div class="mb-3">
        <div class="row align-items-start">
          <div class="col">
            <label for="rentang_min" class="form-label">Nilai Min</label>
            <input type="number" class="form-control @error('rentang_min') is-invalid @enderror" id="rentang_min" name="rentang_min" required ="{{ old('rentang_min') }}">
            @error('rentang_min')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="col">
            <div class="mb-3">
              <label for="rentang_max" class="form-label">Nilai Max</label>
              <input type="number" class="form-control @error('rentang_max') is-invalid @enderror" id="rentang_max" name="rentang_max" required ="{{ old('rentang_max') }}">
              @error('rentang_max')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
      </div>

      <div class="mb-3">
        <label for="bobot" class="form-label">Bobot</label>
        <input type="number" class="form-control @error('bobot') is-invalid @enderror" id="bobot" name="bobot" required ="{{ old('bobot') }}">
        @error('bobot')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      {{-- <a href=""></a> --}}
      <button type="submit" class="btn btn-primary">Create Subkriteria</button>
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