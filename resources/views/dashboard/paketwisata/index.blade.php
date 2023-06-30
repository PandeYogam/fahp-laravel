@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Posts</h1>
  </div>

  @if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
      {{ session('success') }}
    </div>
  @endif

  @foreach ( $packages as $package)  
    @if ($loop->last)
      <h5>Total Paket Wisata  : {{$loop->count}}</h5>
    @endif
  @endforeach
  
  <a href="/dashboard/paketwisata/create" class="btn btn-primary my-1">
    Create Paket
  </a>

  {{-- <div class="table-responsive col-lg-8">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Paket Wisata</th>
          <th scope="col">Category</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($paketWisataCollection  as $package)  
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $package->nama }}</td>
            <td>{{ $package->category->name }}</td>
            <td>
              <a href="/dashboard/posts/{{ $paketWisataCollection ->slug }}" class="badge bg-info"><span data-feather="eye" class="align-text-bottom"></span></a>

              <a href="/dashboard/posts/{{ $paketWisataCollection ->slug }}/edit" class="badge bg-warning"><span data-feather="edit" class="align-text-bottom"></span></a>

              <form action="/dashboard/posts/{{ $paketWisataCollection ->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Hapus Postingan ?')"><span data-feather="x-circle" class="align-text-bottom"></span></button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div> --}}

  {{-- List Daftar Alternatif --}}
  <div class="table-responsive mb-1 mt-3 text-center">
    <table class="table table-sm">
      <thead>
        {{-- <tr>
          <th colspan="9" class="text-center border-0 bg-secondary text-light">List Daftar Alternatif</th>
        </tr> --}}
        <tr>
          <th width="3%" class="text-center border-right bg-light text-secondary">No</th>
          <th class="text-left bg-light text-secondary">Nama Alternatif</th>
          @can('admin')
            <th class="text-left bg-light text-secondary">Pembuat</th>
          @endcan
          <th class="text-left bg-light text-secondary">Budget</th>
          <th class="text-left bg-light text-secondary">Jumlah Wisata</th>
          <th class="text-left bg-light text-secondary">Durasi Wisata</th>
          <th class="text-left bg-light text-secondary">Popularitas Wisata</th>
          <th class="text-left bg-light text-secondary">Rating Wisata</th>
          <th class="text-left bg-light text-secondary">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($packages as $package)
          <tr>
            <td class="text-center border border-left-0">{{ $loop->iteration }}</td>
            <td class="text-center border border-left-0">{{ $package->nama }}</td>
            @can('admin')
              <td class="text-center border border-left-0">{{ $package->admin->name }}</td>
            @endcan
            <td class="text-center border border-left-0">{{ $package->harga }}</td>
            <td class="text-center border border-left-0">{{ $package->jumlah_wisata_dikunjungi }}</td>
            <td class="text-center border border-left-0">{{ $package->durasi }}</td>
            <td class="text-center border border-left-0">{{ $package->popularitas }}</td>
            <td class="text-center border border-left-0">{{ $package->rating }}</td>
            <td class="text-center border border-left-0">
              {{-- <a href="" class="badge bg-info"><span data-feather="eye" class="align-text-bottom"></span></a> --}}

              <a href="/dashboard/paketwisata/{{ $package->slug }}/edit" class="badge bg-warning"><span data-feather="edit" class="align-text-bottom"></span></a>

              <form action="{{ route('dashboard.paketwisata.destroy', $package->slug) }}" method="post" class="d-inline">
              {{-- <form action="/dashboard/paketwisata/{{ $package->slug }}" method="post" class="d-inline"> --}}
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Hapus Postingan ?')"><span data-feather="x-circle" class="align-text-bottom"></span></button>
              </form>

              {{-- <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Hapus Postingan ?')"><span data-feather="x-circle" class="align-text-bottom"></span></button>
              </form> --}}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection