@extends('layouts.main')

@section('container')

<div class="bg-dark hero-background" style="height: 100vh">
  <div style=" height: 90px"></div>
  <div class="container">
  
    <div class="row justify-content-center">
      <h1 class="display-3 text-white mb-3 animated slideInDown m-2 text-center">Registration Form</h1>
      <div class="col-lg-5">
        <main class="form-registration">
  
          <form action="/register" method="post">
            @csrf 
            
            <div class="form-floating mb-2 mb-2">
              <input type="text" name="name" class="form-control rounded rounded @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('username') }}">
              <label for="Name">Name</label>
              @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="d-flex justify-content-evenly">
              <div class="ms-2 form-check">
                  <input class="form-check-input" type="checkbox" value="pengujung" id="checkboxPengujung" name="role[]">
                  <label class="form-check-label text-white ps-0 px-3" for="checkboxPengujung">
                      Pengujung
                  </label>
              </div>
              <div class="ms-4 form-check">
                  <input class="form-check-input" type="checkbox" value="pengelola_paket_wisata" id="checkboxPengelolaPaketWisata" name="role[]">
                  <label class="form-check-label text-white ps-0" for="checkboxPengelolaPaketWisata">
                      Pengelola Pariwisata
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="pengelola_wisata" id="checkboxPengelolaWisata" name="role[]">
                  <label class="form-check-label text-white ps-0" for="checkboxPengelolaWisata">
                      Pengelola Wisata
                  </label>
              </div>
            </div>
              
            <div class="form-floating mb-2">
              <input type="text" name="username" class="form-control rounded @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
              <label for="username">Username</label>
              @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            
            <div class="form-floating mb-2">
              <input type="email" name="email" class="form-control rounded @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
              <label for= "username" >Email address</label>
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-floating mb-2">
              <input type="password" name="password" class="form-control rounded rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
              <label for="password">Password</label>
              @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
        
            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
          </form>
          <div class=" items-center">
            <small class="d-block text-center mt-3 text">already Registered? <a href="/login">Login</a></small>
            
          </div>
        </main>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('input[name="role"]').change(function() {
      var pengujungChecked = $('#checkboxPengujung').is(':checked');
      var pengelolaWisataChecked = $('#checkboxPengelolaWisata').is(':checked');
      var pengelolaPaketWisataChecked = $('#checkboxPengelolaPaketWisata').is(':checked');
  
      if ((pengelolaWisataChecked || pengelolaPaketWisataChecked) && pengujungChecked) {
        // Jika Pengujung dan salah satu Pengelola dipilih, nonaktifkan pilihan Pengujung
        $('#checkboxPengujung').prop('disabled', true);
      } else if (pengujungChecked && (pengelolaWisataChecked || pengelolaPaketWisataChecked)) {
        // Jika salah satu Pengelola dan Pengujung dipilih, nonaktifkan pilihan Pengelola
        $('#checkboxPengelolaWisata').prop('disabled', true);
        $('#checkboxPengelolaPaketWisata').prop('disabled', true);
      } else {
        // Jika hanya Pengujung yang dipilih, nonaktifkan pilihan Pengelola
        $('#checkboxPengelolaWisata').prop('disabled', false);
        $('#checkboxPengelolaPaketWisata').prop('disabled', false);
      }
    });
  });
  </script>
@endsection