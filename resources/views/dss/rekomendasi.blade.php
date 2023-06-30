@extends('layouts.main')

@section('container')


<div class="fullDiv bg-dark hero-header">
  <div style=" height: 60px"></div>
  <div class=" text-center ">
    <h1 class="display-3 text-white animated mt-5">Hasil Rekomendasi Paket Pariwisata</h1> 
    <h4 class="text-white">Silahkan Pilih Paket pariwisata yang paling cocok </h4>
    <p class="text-white">Selamat datang di Badung</p>
  </div>

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
            @endphp
            <tr>
                <td>{{ $ranking['id'] }}</td>
                <td>{{ $ranking['hasil'] }}</td>
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