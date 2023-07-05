@extends('layouts.main')

@section('container')
<div class="container-xxl bg-dark hero-header">
  <div style=" height: 60px"></div>
  <div class=" text-center ">
    <h1 class="display-3 text-white animated mt-5">Perhitungan Fuzzy AHP</h1> 
    <h4 class="text-white">Temukan paket pariwisata yang sesuai dengan preferensi Anda! </h4>
    <p class="text-white">Data yang telah dimasukkan : </p>
  </div>

  <div class="container text-center text-white">
    <div class="row justify-content-start">
      <div class="table-responsive mb-1 mt-3 text-center">
        <table class="table table-sm">
          <thead>
            <tr>
              <th width="20%" class=" bg-light text-secondary">Budget</th>
              <th width="20%" class=" bg-light text-secondary">Popularitas</th>
              <th width="20%" class=" bg-light text-secondary">Rating</th>
              <th width="20%" class=" bg-light text-secondary">Durasi</th>
              <th width="20%" class=" bg-light text-secondary">Jumlah</th>
            </tr>
          </thead>
          <tbody>
            <tr class="text-white">
              <td class="text-center border border-left-0">{{ $bobot->kriteria_1}}</td>
              <td class="text-center border border-left-0">{{ $bobot->kriteria_2}}</td>
              <td class="text-center border border-left-0">{{ $bobot->kriteria_3}}</td>
              <td class="text-center border border-left-0">{{ $bobot->kriteria_4}}</td>
              <td class="text-center border border-left-0">{{ $bobot->kriteria_5}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="container text-center text-white justify-content-start">
    <div class="table-responsive mb-1 mt-3 text-center">
      <table class="table">
        <thead>
          <!-- Isi header tabel jika ada -->
        </thead>
        <tbody>
          <tr>
            <td class="text-center bg-light text-secondary border border-left-0"></td>
            @for ($k = 0; $k < 5; $k++)
              <th style="width: 16%" class="text-center bg-light text-secondary border border-white">C{{ $k+1 }}</th>
            @endfor
          </tr>
          @for ($i = 0; $i < count($perbandingankriteria); $i++)
            <tr>
              <th style="width: 16%" class="bold text-center bg-light text-secondary border border-left-0">C{{ $i+1 }}</th>
              @for ($j = 0; $j < count($perbandingankriteria[$i]); $j++)
                <td class="text-white text-center border border-left-0">{{ $perbandingankriteria[$i][$j] }}</td>
              @endfor
            </tr>
          @endfor
        </tbody>
      </table>
    </div>
  </div>

  <div class="container mb-1 mt-3 text-center text-white justify-content-start" style="height: 300px; overflow-y: auto;">
      <div class="table-responsive text-center">
        <table class="table table-sm table-dark table-striped align-middle">
          <thead>
            <tr class="table-dark table align-middle">
              <th width="3%" class="text-center bg-light text-secondary">No</th>
              <th class=" bg-light text-secondary">Nama Alternatif</th>
              <th class=" bg-light text-secondary">Harga Bobot</th>
              <th class=" bg-light text-secondary">Popularitas Bobot</th>
              <th class=" bg-light text-secondary">Rating Bobot</th>
              <th class=" bg-light text-secondary">Durasi Wisata</th>
              <th class=" bg-light text-secondary">Jumlah Wisata Bobot</th>
              <th class=" bg-light text-secondary">Hasil Ranking</th>
            </tr>
          </thead>
          <tbody >
            @foreach ($hasilRanking as $ranking)
              @php
                $paketWisata = \App\Models\PaketWisata::find($ranking['id']);
                $hargaBobot = $paketWisata->harga_bobot * $hasilBobotVektorArray['kriteria_1'];
                $popularitasBobot = $paketWisata->popularitas_bobot * $hasilBobotVektorArray['kriteria_2'];
                $ratingBobot = $paketWisata->rating_bobot * $hasilBobotVektorArray['kriteria_3'];
                $durasiBobot = $paketWisata->durasi_bobot * $hasilBobotVektorArray['kriteria_4'];
                $jumlahWisataBobot = $paketWisata->jumlah_wisata_bobot * $hasilBobotVektorArray['kriteria_5'];
                $hasilPerhitungan = $hargaBobot + $popularitasBobot + $ratingBobot + $durasiBobot + $jumlahWisataBobot;
              @endphp

              <tr>
                <td class="text-center border border-left-0">{{ $loop->iteration }}</td>
                <td class=" px-2 text-center border border-left-0">{{ $paketWisata->nama }}</td>
                <td class=" px-2 text-center border border-left-0">{{ $hargaBobot }}</td>
                <td class=" px-2 text-center border border-left-0">{{ $popularitasBobot }}</td>
                <td class=" px-2 text-center border border-left-0">{{ $ratingBobot }}</td>
                <td class=" px-2 text-center border border-left-0">{{ $durasiBobot }}</td>
                <td class=" px-2 text-center border border-left-0">{{ $jumlahWisataBobot }}</td>
                <td class=" px-2 text-center border border-left-0">{{ $hasilPerhitungan }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  </div>
  
  <div class="container text-center text-white">
    <div class="row justify-content-start">
      <div class="table-responsive mb-1 mt-3 text-center">
        <table class="table table-sm table-dark table-striped">
          <thead class="">
            <tr class="table-dark table">
              <th width="5%" class="bg-light text-secondary px-2">Ranking</th>
              <th class="bg-light text-secondary">Nama Paket</th>
              <th class="bg-light text-secondary">Harga</th>
              <th class="bg-light text-secondary">Popularitas</th>
              <th class="bg-light text-secondary">Rating</th>
              <th class="bg-light text-secondary">Durasi</th>
              <th class="bg-light text-secondary">Jumlah Wisata</th>
            </tr>
          </thead>
          <tbody>
            @foreach (array_slice($hasilRanking, 0, 5) as $ranking)
              @php
                $paketWisata = \App\Models\PaketWisata::find($ranking['id']);
                $hargaBobot = $paketWisata->harga_bobot * $hasilBobotVektorArray['kriteria_1'];
                $popularitasBobot = $paketWisata->popularitas_bobot * $hasilBobotVektorArray['kriteria_2'];
                $ratingBobot = $paketWisata->rating_bobot * $hasilBobotVektorArray['kriteria_3'];
                $durasiBobot = $paketWisata->durasi_bobot * $hasilBobotVektorArray['kriteria_4'];
                $jumlahWisataBobot = $paketWisata->jumlah_wisata_bobot * $hasilBobotVektorArray['kriteria_5'];
                $hasilPerhitungan = $hargaBobot + $popularitasBobot + $ratingBobot + $durasiBobot + $jumlahWisataBobot;
              @endphp
              <tr>
                <td class="text-center border border-left-0">{{ $loop->iteration }}</td>
                <td class=" px-2 text-center border border-left-0">{{ $paketWisata->nama }}</td>
                <td class=" px-2 text-center border border-left-0">{{ $paketWisata->harga }}</td>
                <td class=" px-2 text-center border border-left-0">{{ $paketWisata->popularitas }}</td>
                <td class=" px-2 text-center border border-left-0">{{ $paketWisata->rating }}</td>
                <td class=" px-2 text-center border border-left-0">{{ $paketWisata->durasi }}</td>
                <td class=" px-2 text-center border border-left-0">{{ $paketWisata->jumlah_wisata_dikunjungi }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

@endsection