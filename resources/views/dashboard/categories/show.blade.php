@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-12">
                <h1 class="mb-3">{{ $category->name }}</h1>

                  <div class="table-responsive col-lg-10">
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Title Post</th>
                          <th scope="col">Rating</th>
                          <th scope="col">Date</th>
                          <th scope="col">Author</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($posts as $post)  
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $post->title }}</td>
                            <td>Rating</td>
                            <td>{{ date('d-m-Y', strtotime($post->created_at)) }}</td>
                            <td>{{ $post->admin->name }}</td>
                            <td>
                              <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye" class="align-text-bottom"></span></a>
                
                              <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather="edit" class="align-text-bottom"></span></a>
                
                              <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
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
            </div>
        </div>
    </div>
@endsection