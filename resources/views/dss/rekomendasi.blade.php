@extends('layouts.main')

@section('container')

<div class="bg-dark hero-pantai" style="height: 100vh">
  <div style=" height: 60px"></div>
  <div class=" text-center ">
    <h1 class="display-3 text-white animated mt-5">Hasil Rekomendasi Paket Pariwisata</h1> 
    <h4 class="text-white">Silahkan Pilih Paket pariwisata yang paling cocok </h4>
    <p class="text-white">Selamat datang di Badung</p>
  </div>

  <div class="container text-center text-white">
    <div class="row justify-content-start">
      <div class="table-responsive mb-1 mt-3 text-center">
        <table class="table table-sm table-dark table-striped">
          <thead>
            <tr table-dark table>
              <th width="3%" class="text-center bg-light text-secondary">Ranking</th>
              <th class="text-left bg-light text-secondary">Nama Paket</th>
              <th class="text-left bg-light text-secondary">Harga</th>
              <th class="text-left bg-light text-secondary">Popularitas</th>
              <th class="text-left bg-light text-secondary">Rating</th>
              <th class="text-left bg-light text-secondary">Durasi</th>
              <th class="text-left bg-light text-secondary">Jumlah Wisata</th>
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
                <td class=" px-2 text-center border border-left-0 text-white"><a href="/paketwisata/{{ $paketWisata->slug }}">{{ $paketWisata->nama }}</a></td>
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

</div>
@endsection