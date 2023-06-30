@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Bobot Alternatif</h1>
  </div>

  @if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
      {{ session('success') }}
    </div>
  @endif

  @foreach ( $subkriteria as $sub)  
    @if ($loop->last)
      <h5>Total Bobot  : {{$loop->count}}</h5>
    @endif
  @endforeach
  
  <a href="/dashboard/paketwisata/create" class="btn btn-primary my-1">
    Create bobotalternatif
  </a>

  <div class="table-responsive col-lg-8">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Kriteria</th>
          <th scope="col">rentang Min</th>
          <th scope="col">rentang Max</th>
          <th scope="col">nilai</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($subkriteria  as $sub)  
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $sub->nama }}</td>
            <td>{{ $sub->rentang_min}}</td>
            <td>{{ $sub->rentang_max}}</td>
            <td>{{ $sub->bobot}}</td>
            <td>
              <a href="/dashboard/subkriteria/{{ $sub->id }}/edit" class="badge bg-warning"><span data-feather="edit" class="align-text-bottom"></span></a>

              <form action="/dashboard/subkriteria/{{ $sub->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Hapus Postingan ?')"><span data-feather="x-circle" class="align-text-bottom"></span></button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  {{-- List Daftar Alternatif --}}


@endsection