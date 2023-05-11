@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Admin Registered</h1>
  </div>

  @if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
      {{ session('success') }}
    </div>
  @endif

  <h5>Total User : {{$users->count()}}</h5>
  
  <a href="/dashboard/categories/create" class="btn btn-primary my-1">
    Create a new user
  </a>

  <div class="table-responsive col-lg-8">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title Name</th>
          <th scope="col">Total Post</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)  
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->posts->count() }}</td>
            <td>
              <a href="/dashboard/users/{{ $user->username }}" class="badge bg-info"><span data-feather="eye" class="align-text-bottom"></span></a>

              <a href="/dashboard/users/{{ $user->username }}/edit" class="badge bg-warning"><span data-feather="edit" class="align-text-bottom"></span></a>

              <form action="/dashboard/users/{{ $user->username }}" method="post" class="d-inline">
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

@endsection