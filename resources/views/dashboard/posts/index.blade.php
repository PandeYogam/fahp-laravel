@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    @if (auth()->user()->is_admin == 1)
      <h1 class="h2">All Posts</h1>
    @else
      <h1 class="h2">My Posts</h1>
    @endif
  </div>

  @if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
      {{ session('success') }}
    </div>
  @endif

  @foreach ( $posts as $post)  
    @if ($loop->last)
      <h5>Total Post : {{$loop->count}}</h5>
    @endif
  @endforeach
  
  <a href="/dashboard/posts/create" class="btn btn-primary my-1">
    Create Post
  </a>

  {{-- <button class="collapse-btn" data-target="collapse1">Collapse 1</button>
  <div id="collapse1" class="collapse-content">
    <p>Isi dari collapse 1</p>
  </div>

  <button class="collapse-btn" data-target="collapse2">Collapse 2</button>
  <div id="collapse2" class="collapse-content">
    <p>Isi dari collapse 2</p>
  </div> --}}

  <div class="table-responsive col-lg-12">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          @if (auth()->user()->is_admin == 1)
            <th scope="col">User</th>
          @endif
          <th scope="col">Category</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)  
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $post->title }}</td>
            @if (auth()->user()->is_admin == 1)
              <td>{{ $post->user_id }}</td>
            @endif
            <td>{{ $post->category->name }}</td>
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

  {{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
      const buttons = document.getElementsByClassName("collapse-btn");
      const contents = document.getElementsByClassName("collapse-content");

      for (let i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener("click", function() {
          const target = this.getAttribute("data-target");
          const content = document.getElementById(target);

          if (content.style.display === "none") {
            content.style.display = "block";
            if (target === "collapse2") {
              const otherContent = document.getElementById("collapse1");
              otherContent.style.display = "none";
            }
          } else {
            content.style.display = "none";
          }
        });
      }
    });
  </script> --}}
@endsection