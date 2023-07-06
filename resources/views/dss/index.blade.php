@extends('layouts.main')

@section('container')


<div class="fullDiv bg-dark hero-header">
  <div style=" height: 60px"></div>
  <div class=" text-center ">
    <h1 class="display-3 text-white animated mt-5">{{ $title }}</h1> 
    <h4 class="text-white">Temukan paket pariwisata yang sesuai dengan preferensi Anda! </h4>
    <p class="text-white">Silakan berikan penilaian prioritas Anda untuk setiap kriteria berikut dengan rentang nilai 1 hingga 9 <br>nilai yang lebih tinggi menunjukkan tingkat kepentingan yang lebih tinggi</p>
  </div>

  <form action="/dss" method="post" class="mb-5" enctype="multipart/form-data">
    @csrf
    @method('post')

    <div class=" container text-center mb-3 mt-5">
      <div class="row align-items-center mb-3">
        
        <div class=" col">
          <h5 class=" text-white animated">Budget</h5>
          <input type="number" step="1" pattern="\d+" min="0" max="10" class="form-control @error('kriteria_1') is-invalid @enderror" id="kriteria_1" name="kriteria_1">
          @error('kriteria_1')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        
        <div class=" col">
          <h5 class=" text-white animated">Popularitas</h5>
          <input type="number" step="1" pattern="\d+" min="0" max="10" class="form-control @error('kriteria_2') is-invalid @enderror" id="kriteria_2" name="kriteria_2">
          @error('kriteria_2')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        
        <div class=" col">
          <h5 class=" text-white animated">Rating</h5>
          <input type="number" step="1" pattern="\d+" min="0" max="10" class="form-control @error('kriteria_3') is-invalid @enderror" id="kriteria_3" name="kriteria_3">
          @error('kriteria_3')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        
        <div class=" col">
          <h5 class=" text-white animated">Durasi</h5>
          <input type="number" step="1" pattern="\d+" min="0" max="10" class="form-control @error('kriteria_4') is-invalid @enderror" id="kriteria_4" name="kriteria_4">
          @error('kriteria_4')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        
        <div class=" col">
          <h5 class=" text-white animated">Jumlah</h5>
          <input type="number" step="1" pattern="\d+" min="0" max="10" class="form-control @error('kriteria_5') is-invalid @enderror" id="kriteria_5" name="kriteria_5">
          @error('kriteria_5')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        
      </div>

      <button type="submit" id="submitBtn" class="btn btn-primary mt-5 px-3">Submit</button>
    </div>
  </form>

  <div class=" container text-center mt-5">
    <div class="row align-items-center mb-3">
      <div class=" col">
        <button href="/dss/calculate" id="perhitunganBtn" class="btn btn-primary px-3 disabled" disabled>
          Perhitungan
        </button>
      </div>
      <div class=" col">
        <button href="/dss/rekomendasi" id="cekHasilBtn" class="btn btn-secondary px-3 disabled">cek hasil</button>
      </div>
    </div>
  </div>

</div>

<script>
  // Mengatur status disabled awal pada tombol "Perhitungan" dan "Cek Hasil"
  document.getElementById("perhitunganBtn").disabled = true;
  document.getElementById("cekHasilBtn").disabled = true;

  // Mengecek apakah tombol "Submit" telah ditekan
  document.getElementById("submitBtn").addEventListener("click", function() {
    // Mengaktifkan tombol "Perhitungan" dan "Cek Hasil"
    document.getElementById("perhitunganBtn").disabled = false;
    document.getElementById("cekHasilBtn").disabled = false;
  });
</script>

@endsection