@extends('layouts.main')

@section('container')

<div class="bg-dark hero-background" style="height: 100vh">
  <div style=" height: 90px"></div>
  <div class="container">
  
    <div class="row justify-content-center">
      <h1 class="display-3 text-white mb-4 animated slideInDown m-2 text-center">Registration Form</h1>
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
                  <input class="form-check-input disable" type="checkbox" value="pengujung" id="checkboxPengujung" name="role[]" >
                  <label class="form-check-label text-white ps-0 px-3" for="checkboxPengujung">
                      Pengujung
                  </label>
              </div>
              <div class="ms-4 form-check">
                  <input class="form-check-input" type="checkbox" value="pengelola_paket_wisata" id="checkboxPengelolaPaketWisata" name="role[]" >
                  <label class="form-check-label text-white ps-0" for="checkboxPengelolaPaketWisata">
                      Pengelola Pariwisata
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="pengelola_wisata" id="checkboxPengelolaWisata" name="role[]" >
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
  // Mendapatkan referensi ke elemen tombol
  const checkboxPengelolaPaketWisata = document.getElementById('checkboxPengelolaPaketWisata');
  const checkboxPengujung = document.getElementById('checkboxPengujung');
  const checkboxPengelolaWisata = document.getElementById('checkboxPengelolaWisata');

  // Menonaktifkan tombol secara default
  checkboxPengujung.disabled = false;
  checkboxPengelolaPaketWisata.disabled = false;
  checkboxPengelolaWisata.disabled = false;

  function updateCheckboxStatus() {
      if (checkboxPengelolaPaketWisata.checked || checkboxPengelolaWisata.checked) {
        checkboxPengujung.disabled = true;
      } else {
        checkboxPengujung.disabled = false;
      }

      if (checkboxPengujung.checked) {
        checkboxPengelolaPaketWisata.disabled = true;
        checkboxPengelolaWisata.disabled = true;
      } else {
        checkboxPengelolaPaketWisata.disabled = false;
        checkboxPengelolaWisata.disabled = false;
      }
    }

    checkboxPengujung.addEventListener('change', updateCheckboxStatus);
    checkboxPengelolaPaketWisata.addEventListener('change', updateCheckboxStatus);
    checkboxPengelolaWisata.addEventListener('change', updateCheckboxStatus);

    // Panggil fungsi untuk menginisialisasi status checkbox saat halaman dimuat
    updateCheckboxStatus();

</script>
{{-- <script>
  // Tempatkan kode JavaScript yang telah diberikan di sini
  // ...

  // Mendapatkan referensi ke elemen checkbox
  const checkboxPengujung = document.getElementById('checkboxPengujung');
  const checkboxPengelolaPaketWisata = document.getElementById('checkboxPengelolaPaketWisata');
  const checkboxPengelolaWisata = document.getElementById('checkboxPengelolaWisata');

  // Mendapatkan referensi ke semua elemen checkbox
  const checkboxes = [checkboxPengujung, checkboxPengelolaPaketWisata, checkboxPengelolaWisata];

  // Mendefinisikan fungsi untuk mengatur status checkbox
  function setCheckboxStatus(checkbox, status) {
    checkbox.checked = status;
    checkbox.disabled = status;
  }

  // Mendefinisikan fungsi untuk mengatur status checkbox berdasarkan kondisi
  function updateCheckboxStatus() {
    // ...
  }

  // Tambahkan event listener ke setiap checkbox
  // ...

  // Inisialisasi status checkbox saat halaman dimuat
  updateCheckboxStatus();
</script> --}}

@endsection