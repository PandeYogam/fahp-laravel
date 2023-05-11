@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Post Catergories</h1>
  </div>

  @if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
      {{ session('success') }}
    </div>
  @endif

  <h5>Total Category : {{$categories->count()}}</h5>
  
  <a href="/dashboard/categories/create" class="btn btn-primary my-1">
    Create a new Category
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
        @foreach ($categories as $category)  
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->posts->count() }}</td>
            <td>
              <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-info"><span data-feather="eye" class="align-text-bottom"></span></a>

              <a href="{{ route('dashboard.categories.edit', $category->slug) }}" class="badge bg-warning"><span data-feather="edit" class="align-text-bottom"></span></a>

              {{-- <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Delete Category?')"><span data-feather="x-circle" class="align-text-bottom"></span></button>
              </form> --}}

              <form action="{{ route('dashboard.categories.destroy', $category->slug) }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Hapus Postingan ?')"><span data-feather="x-circle" class="align-text-bottom"></span></button>
              </form>


              {{-- <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
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