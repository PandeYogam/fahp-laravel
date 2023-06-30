@extends('layouts.main')

@section('container')

<div class="fullDiv bg-dark hero-background">
  <div style=" height: 60px"></div>
  <div class=" text-center ">
    <h1 class="display-3 text-white animated mt-5">Perhitungan Fuzzy AHP</h1> 
    <h4 class="text-white">Temukan paket pariwisata yang sesuai dengan preferensi Anda! </h4>
    <p class="text-white">Data yang telah dimasukkan : </p>
  </div>

  <table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Harga Bobot</th>
            <th>Popularitas Bobot</th>
            <th>Rating Bobot</th>
            <th>Durasi Bobot</th>
            <th>Jumlah Wisata Bobot</th>
            <th>Hasil Ranking</th>
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
                <td>{{ $paketWisata->nama }}</td>
                <td>{{ $hargaBobot }}</td>
                <td>{{ $popularitasBobot }}</td>
                <td>{{ $ratingBobot }}</td>
                <td>{{ $durasiBobot }}</td>
                <td>{{ $jumlahWisataBobot }}</td>
                <td>{{ $hasilPerhitungan }}</td>
            </tr>
        @endforeach
    </tbody>
  </table>

  <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Hasil Ranking</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Popularitas</th>
            <th>Rating</th>
            <th>Durasi</th>
            <th>Jumlah Wisata Dikunjungi</th>
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
                <td>{{ $paketWisata->id }}</td>
                <td>{{ $hasilPerhitungan }}</td>
                <td>{{ $paketWisata->nama }}</td>
                <td>{{ $paketWisata->harga }}</td>
                <td>{{ $paketWisata->popularitas }}</td>
                <td>{{ $paketWisata->rating }}</td>
                <td>{{ $paketWisata->durasi }}</td>
                <td>{{ $paketWisata->jumlah_wisata_dikunjungi }}</td>
            </tr>
        @endforeach
    </tbody>
  </table>


</div>
@endsection