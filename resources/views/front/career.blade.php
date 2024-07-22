@extends('layouts.main')

@section('content')
<section
class="blog-section blog-wrapper section-padding-3 bg-cover bg-center"
style="background-image: url(./assets/img/blog_bg_line.svg)"
>
<div class="container">
  <div class="row">
    <div class="col-12 col-xl-6 col-md-6 offset-md-3 text-center">
      <div
        class="section-title section__title_3 mb-30"
        data-aos="fade-up"
        data-aos-delay="100"
      >
        <h6>
          <img src="./assets/img/bage.svg" alt />Join With Us
          <img src="./assets/img/bage.svg" alt class="ms-1" />
        </h6>
        <h2>Career</h2>
      </div>
    </div>
  </div>

  <div class="row">
    @forelse ($careers as $career)
    <div class="col-xl-4 col-md-6 col-12" data-aos="fade-up">
        <div class="single-card-wisesa style-3">
          <div class="blog-featured-thumb bg-cover">
            <img
              src="{{ Storage::url($career->thumbnail) }}"
              alt="career-wisesa-consulting"
              width="380"
              height="200"
            />
          </div>
          <div class="content">
            <h3><a href="career-detail.html">{{ $career->title }}</a></h3>
            <div class="excerpt">
              <p>
                <i class="fal fa-map-marker-alt me-2"></i>{{ $career->location }}
              </p>
            </div>
            <div
              class="btn-link-share d-flex justify-content-between align-items-center"
            >
              <a href="{{ route('front.career-details', $career->slug) }}"
                >view more <i class="icon-arrow-right-1"></i
              ></a>
            </div>
          </div>
          <div class="future-elem">
            <p>{{ $career->category }}</p>
          </div>
        </div>
    </div>
    @empty
        <p>
            Belum ada data terbaru
        </p>
    @endforelse
    

  </div>
</div>
</section>

<x-cta-banner></x-cta-banner>

@endsection