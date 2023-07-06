@extends('layouts.main')

@section('container')
<main>
    <!-- Hero Header -->
    <section id="section-1">
      <div div class=" container-xxl py-5 bg-dark hero-header mb-5 ">
        <div class="container my-5 py-5">
          <div class="row align-items-center g-5">
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="display-3 text-white animated slideInLeft">Badung<br>Destination information</h1>
                <p class="text-white animated slideInLeft mb-4 pb-2">Dapatkan pengalaman tak terlupakan di Badung dengan mengunjungi tempat-tempat menarik dan menyeluruh dari pusat informasi pariwisata kami</p>
                <a href="/posts" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Telusuri</a>
            </div>
            <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                <img class="img-fluid" src="img/bg-hero.jpg" alt="">
            </div>
          </div>
        </div>  
      </div>
    </section>
    <!-- Hero Header -->
  
    <!-- Service Start -->
    <section id="section-2" class="section-2">
      <div class="container-xxl row justify-content-center">
        <h1 class="display-5 mb-5 animated slideInDown text-center ">Berbagai Pariwisata</h1> 
        <div class="row">
          <div class=" col-10 container align-self-center">
            <div class="row g-4">
              {{-- 1 --}}
              <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <a href="/posts?category={{ $categories[0]->slug}}">
                  <div class="service-item rounded pt-3">
                      <div class="p-4">
                          <i class="fa fa-3x fa-umbrella-beach text-primary mb-4"></i>
                          
                          <h5>{{ $categories[0]->name }}</h5>
                          <p>{{ $categories[0]->body }}</p>
                      </div>
                  </div>
                </a> 
              </div>
              
              {{-- 2 --}}
              <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="4.1s">
                <a href="/posts?category={{ $categories[1]->slug}}">
                  <div class="service-item rounded pt-3">
                      <div class="p-4">
                          <i class="fa fa-3x fa-tree text-primary mb-4"></i>
                          <h5>{{ $categories[1]->name }}</h5>
                          <p>{{ $categories[1]->body }}</p>
                      </div>
                  </div>
                </a>
              </div>

              {{-- 3 --}}
              <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <a href="/posts?category={{ $categories[3]->slug}}">
                  <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-palette text-primary mb-4"></i>
                            <h5>{{ $categories[3]->name }}</h5>
                            <p>{{ $categories[3]->body }}</p>
                        </div>
                  </div>
                </a>  
              </div>

              {{-- 4 --}}
              <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <a href="/posts?category={{ $categories[1]->slug}}">
                  <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-hotel text-primary mb-4"></i>
                            <h5>{{ $categories[2]->name }}</h5>
                            <p>{{ $categories[2]->body }}</p>
                        </div>
                  </div>
                </a>  
              </div> 
            </div>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-3 col-sm-6 wow fadeInUp m-3" data-wow-delay="0.1s">
            <a href="/posts">
              <div class="service-item roundeds p-2 my-2 align-items-center">
                <i class="fa-solid fa-magnifying-glass"></i>
                {{-- <i class="fa-solid fa-umbrella-beach"></i> --}}
                <h5 class=" text-center m-0 bg-body-tertiary rounded">Search More</h5>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- Service End -->

    <!-- Menu Start -->
    <section id="section-3">
      <div class="container-xxl bg-dark hero-header text-white">
        <div class="container d-flex flex-column">
            {{-- Judul --}}
            <div class="text-center wow fadeInUp mt-5 " data-wow-delay="0.1s">
                <h1 class="mb-3 text-white">Most Popular Destination</h1>
            </div>

            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                {{-- Sub Judul --}}
                <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                            <div class="px-3">
                                <small class=" text-white">Popular</small>
                                <h6 class="mt-n1 mb-0 text-white">Beach</h6>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                            
                            {{-- <i class="fa fa-coffee fa-2x text-primary"></i> --}}
                            <div class="px-3">
                                <small class="text-white">Special</small>
                                <h6 class="mt-n1 mb-0 text-white" >Hotel</h6>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                            {{-- <i class="fa fa-utensils fa-2x text-primary"></i> --}}
                            <div class="px-3">
                                <small class="text-white">Lovely</small>
                                <h6 class="mt-n1 mb-0 text-white">Food</h6>
                            </div>
                        </a>
                    </li>
                </ul>

                {{-- Isi --}}
                <div class="tab-content">
                    {{-- 1 --}}
                    <div id="tab-1" class="tab-pane fade show p-0 active ">
                        <div class="row g-4">
                            @foreach ($post_1->slice(0, 6) as $post)
                              <div class="col-lg-6">
                                <div class=" row">
                                    <div class="col-2" style="">
                                      @if ($post->image)
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid" style="width: 100%;height: 100%;object-fit: cover;">
                                        {{-- <div style="max-height: 350px; overflow:hidden" >
                                        </div> --}}
                                      @else
                                        <img class=" img-fluid" src="https://source.unsplash.com/1200x400?{{ $post->title }}" alt="{{ $post->title }}" style="width: 100%;height: 100%;object-fit: cover;">
                                      @endif
                                    </div>
                                    <div class="col-10 d-flex flex-column text-start">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span class="text-white">{{ $post->title }}</span>
                                            <a href="/posts/{{ $post->slug }}">
                                              <span class="text-primary">-></span>
                                            </a>
                                        </h5>
                                        <small class="fst-italic">{{ $post->slug }}</small>
                                    </div>
                                </div>
                              </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- 1 --}}
                    <div id="tab-2" class="tab-pane fade show p-0 ">
                      <div class="row g-4">
                          @foreach ($post_2 as $post)
                            <div class="col-lg-6">
                              <div class=" row">
                                  <div class="col-2" style="">
                                    @if ($post->image)
                                      <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid" style="width: 100%;height: 100%;object-fit: cover;">
                                      {{-- <div style="max-height: 350px; overflow:hidden" >
                                      </div> --}}
                                    @else
                                      <img class=" img-fluid" src="https://source.unsplash.com/1200x400?{{ $post->title }}" alt="{{ $post->title }}" style="width: 100%;height: 100%;object-fit: cover;">
                                    @endif
                                  </div>
                                  <div class="col-10 d-flex flex-column text-start">
                                      <h5 class="d-flex justify-content-between border-bottom pb-2">
                                          <span class="text-white">{{ $post->title }}</span>
                                          <a href="/posts/{{ $post->slug }}">
                                            <span class="text-primary">-></span>
                                          </a>
                                      </h5>
                                      <small class="fst-italic">{{ $post->slug }}</small>
                                  </div>
                              </div>
                            </div>
                          @endforeach
                      </div>
                  </div>

                    {{-- 1 --}}
                    <div id="tab-3" class="tab-pane fade show p-0 ">
                      <div class="row g-4">
                          @foreach ($post_3 as $post)
                            <div class="col-lg-6">
                              <div class=" row">
                                  <div class="col-2" style="">
                                    @if ($post->image)
                                      <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid" style="width: 100%;height: 100%;object-fit: cover;">
                                      {{-- <div style="max-height: 350px; overflow:hidden" >
                                      </div> --}}
                                    @else
                                      <img class=" img-fluid" src="https://source.unsplash.com/1200x400?{{ $post->title }}" alt="{{ $post->title }}" style="width: 100%;height: 100%;object-fit: cover;">
                                    @endif
                                  </div>
                                  <div class="col-10 d-flex flex-column text-start">
                                      <h5 class="d-flex justify-content-between border-bottom pb-2">
                                          <span class="text-white">{{ $post->title }}</span>
                                          <a href="/posts/{{ $post->slug }}">
                                            <span class="text-primary">-></span>
                                          </a>
                                      </h5>
                                      <small class="fst-italic">{{ $post->slug }}</small>
                                  </div>
                              </div>
                            </div>
                          @endforeach
                      </div>
                  </div>
                </div>
            </div>

            <div class="row justify-content-center">
              <div class="col-lg-3 col-sm-6 wow fadeInUp m-3" data-wow-delay="0.1s">
                <a href="/posts">
                  <div class="service-item roundeds p-2 my-2 align-items-center">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    {{-- <i class="fa-solid fa-umbrella-beach"></i> --}}
                    <h5 class="btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft text-center text-white">Search More</h5>
                  </div>
                </a>
              </div>
            </div>
            
        </div>
      </div>
    </section>
    <!-- Menu End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</main>
@endsection