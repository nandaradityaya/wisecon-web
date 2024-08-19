@extends('layouts.main')

@section('content')
<section class="our-service-provide wisesa-landing-page">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 text-center">
          <div class="section-title">
            <a class="theme-btn-sm mb-15" data-aos="fade-up">what we Do</a>
            <h1 data-aos="fade-up" data-aos-delay="100">
              We Provide Best Solutions For Your Business
            </h1>
          </div>
        </div>
      </div>

      <div class="row justify-content-center text-center">
        @forelse ($services as $service)
          <div class="col-xl-4 col-md-6 col-12" data-aos="fade-up">
            <div class="single-our-service style-2">
              <div
                class="thumb bg-cover"
                style="background-image: url('{{ Storage::url($service->thumbnail) }}')"
              ></div>
              <div class="content">
                <div class="icon">
                  <img src="{{ Storage::url($service->icon) }}" alt="" />
                </div>
                <h3>
                  <a href="{{ route('front.service-details', $service->slug) }}">{{ $service->title }}</a>
                </h3>
                <p>
                  {{ $service->excerpt }}
                </p>
                <a href="{{ route('front.service-details', $service->slug) }}" class="read-more text-uppercase"
                  >read more <i class="icon-arrow-right-1"></i
                ></a>
              </div>
            </div>
          </div>
        @empty
          <p>
            No Data Yet
          </p>
        @endforelse
      </div>
    </div>
  </section>

  <x-cta-banner></x-cta-banner>

@endsection