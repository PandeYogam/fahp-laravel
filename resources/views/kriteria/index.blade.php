<!-- resources/views/kriteria/index.blade.php -->
@extends('layouts.main')

@section('container')
    <div class="container">
        <h1>Kriteria</h1>
        <a href="{{ route('kriteria.create') }}" class="btn btn-primary mb-2">Tambah Kriteria</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kriteria as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <a href="{{ route('kriteria.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('kriteria.destroy', $item->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kriteria ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
