@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    @if (auth()->user()->is_admin == 1)
      <h1 class="h2">All Package</h1>
    @else
      <h1 class="h2">My Package</h1>
    @endif
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
  
  <a href="/dashboard/paketwisata/create" class="btn btn-primary my-1 me-1">
    Create Package
  </a>
  
  <!-- Button trigger modal -->
  {{-- <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Upload Excel
  </button>

  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Upload Paket Wisata</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="#" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          Atribut yang dibutuhkan : Budget ...
          <div class="form-group">
            <input type="file" name="file" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Upload</button>
        </div>
        </form>
      </div>
    </div>
  </div> --}}


  {{-- List Daftar Alternatif --}}
  <div class="table-responsive mb-1 mt-3 text-center">
    <table class="table table-sm">
      <thead>
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

              {{-- <form action="" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Hapus Postingan ?')"><span data-feather="x-circle" class="align-text-bottom"></span></button>
              </form> --}}

              <form action="{{ route('dashboard.paketwisata.destroy', $package->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                {{-- <button type="submit">Hapus</button> --}}
                <button class="badge bg-danger border-0" onclick="return confirm('Hapus Postingan ?')"><span data-feather="x-circle" class="align-text-bottom"></span></button>
              </form>
              
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection