@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create A New Package</h1>
  </div>

  <div class="col-lg-8">
    <form action="/dashboard/users" method="post" class="mb-5" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
          <label for="name" class="form-label">Nama</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
          @error('name')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
      </div>
  
      <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required autofocus value="{{ old('username') }}">
          @error('username')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
      </div>
  
      <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required autofocus value="{{ old('email') }}">
          @error('email')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
      </div>
  
      <div class="mb-3">
          <label for="role" class="form-label">Role</label>
          <div class="d-flex">
              <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="pengujung" id="checkboxPengujung" name="role[]">
                  <label class="form-check-label pe-2" for="checkboxPengujung">
                      Pengujung
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="pengelola_paket_wisata" id="checkboxPengelolaPaketWisata" name="role[]">
                  <label class="form-check-label pe-2" for="checkboxPengelolaPaketWisata">
                      Pengelola Pariwisata
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="pengelola_wisata" id="checkboxPengelolaWisata" name="role[]">
                  <label class="form-check-label pe-2" for="checkboxPengelolaWisata">
                      Pengelola Wisata
                  </label>
              </div>
          </div>
      </div>
  
      <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autofocus>
          @error('password')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
      </div>
  
      <button type="submit" class="btn btn-primary">Create user</button>
  </form>  
  
  </div>

  <script>
    const title = document.querySelector("#nama");
    const slug = document.querySelector("#slug");

    title.addEventListener('change', function() {
      fetch('/dashboard/checkSlug?title=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
    });

    // function previewImage(){
    //   const image = document.querySelector('#image');
    //   const imgPreview = document.querySelector('.img-preview');

    //   imgPreview.style.display = 'block';

    //   const oFReader = new FileReader();
    //   oFReader.readAsDataURL(image.files[0]);
      
    //   oFReader.onload = function(oFREvent){
    //     imgPreview.src = oFREvent.target.result;
    //   }
    // }
  </script>

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

@endsection