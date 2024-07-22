@extends('layouts.main')

@section('content')
<section class="case-study-wrapper section-padding">
    <div class="container text-center" data-aos="fade-up">
      <div class="section-title">
        <p>our Recent product</p>
        <h1>Products</h1>
      </div>

      <div class="row grid" data-aos="fade-up" data-aos-delay="150">
        @forelse ($products as $product)
          <div class="col-xl-4 col-md-6 grid-item">
            <div class="single-case-study">
              <div
                class="features-thumb bg-cover"
                style="background-image: url('{{ Storage::url($product->thumbnail_1) }}')"
              ></div>
              <div class="content">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->service }}</p>
                <a href="{{ route('front.product-details', $product->slug) }}"
                  >Read more <i class="fas fa-arrow-right"></i
                ></a>
              </div>
            </div>
          </div>
        @empty
            
        @endforelse
        
      </div>
    </div>
  </section>

  <x-cta-banner></x-cta-banner>
@endsection