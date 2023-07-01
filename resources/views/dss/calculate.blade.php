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
              <th class="text-left bg-light text-secondary">Penilaian Budget</th>
              <th class="text-left bg-light text-secondary">Penilaian Durasi Paket</th>
              <th class="text-left bg-light text-secondary">Penilaian Jumlah Pariwisata</th>
              <th class="text-left bg-light text-secondary">Penilaian Rating</th>
              <th class="text-left bg-light text-secondary">Penilaian Popularitas</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class=" px-2 text-center border border-left-0">{{ $bobot->kriteria_1 }}</td>
              <td class=" px-2 text-center border border-left-0">{{ $bobot->kriteria_2 }}</td>
              <td class=" px-2 text-center border border-left-0">{{ $bobot->kriteria_3 }}</td>
              <td class=" px-2 text-center border border-left-0">{{ $bobot->kriteria_4 }}</td>
              <td class=" px-2 text-center border border-left-0">{{ $bobot->kriteria_5 }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="container text-center text-white">
    <div class="row justify-content-start">
      <div class="table-responsive mb-1 mt-3 text-center">
        <table class="table table-sm">
          <thead>
            <tr>
              <th width="3%" class="text-center bord bg-light">Ranking</th>
              <th class="text-left bg-light text-secondary">Nama Paket</th>
              @can('admin')
                <th class="text-left bg-light text-secondary">Harga</th>
              @endcan
              <th class="text-left bg-light text-secondary">Popularitas</th>
              <th class="text-left bg-light text-secondary">Rating</th>
              <th class="text-left bg-light text-secondary">Durasi</th>
              <th class="text-left bg-light text-secondary">Jumlah Wisata</th>
            </tr>
          </thead>
          <tbody>
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

  <div class="container text-center text-white">
    <div class="row justify-content-start">
      <div class="table-responsive mb-1 mt-3 text-center">
        <table class="table table-sm">
          <thead>
            <tr>
              <th width="3%" class="text-center bord bg-light">No</th>
              <th class="text-left bg-light text-secondary">Nama Alternatif</th>
              @can('admin')
                <th class="text-left bg-light text-secondary">Harga Bobot</th>
              @endcan
              <th class="text-left bg-light text-secondary">Popularitas Bobot</th>
              <th class="text-left bg-light text-secondary">Rating Bobot</th>
              <th class="text-left bg-light text-secondary">Durasi Wisata</th>
              <th class="text-left bg-light text-secondary">Jumlah Wisata Bobot</th>
              <th class="text-left bg-light text-secondary">Hasil Ranking</th>
            </tr>
          </thead>
          <tbody>
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
  </div>

</div>
@endsection