@extends('layouts.main')

@section('container')
<div class="fullDiv container-xxl py-5 bg-dark hero-header">
  <div class="container text-center pt-5 pb-4">
  
    <div class="row justify-content-center">
      <div class="col-lg-5">
        <main class="form-registration">
  
          <h1 class="display-3 text-white mb-3 animated slideInDown m-2">Registration Form</h1>
          <form action="/register" method="post">
            @csrf 
            
            <div class="form-floating">
              <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('username') }}">
              <label for="Name">Name</label>
              @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            
            <div class="form-floating">
              <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
              <label for="username">Username</label>
              @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            
            <div class="form-floating">
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
              <label for= "username" >Email address</label>
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-floating">
              <input type="password" name="password" class="form-control  rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
              <label for="password">Password</label>
              @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
        
            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
          </form>
            <small class="d-block text-center mt-3">already Registered? <a href="/login">Login</a></small>
        </main>
      </div>
    </div>
  </div>
</div>

@endsection