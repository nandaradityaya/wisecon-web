@extends('layouts.main')

@section('content')
    <section
      class="case-study-post-wrapper section-padding"
      style="z-index: 100"
    >
      <div class="container">
        <div class="case-grid-photos">
          <div
            class="single-photo-grid"
            data-aos="fade-up"
            data-aos-delay="100"
          >
            <img src="{{ Storage::url($product->thumbnail_1) }}" alt="" />
          </div>
          <div
            class="single-photo-grid"
            data-aos="fade-up"
            data-aos-delay="150"
          >
            <img src="{{ Storage::url($product->thumbnail_2) }}" alt="" />
          </div>
        </div>
        <div class="case-contents-wrap">
          <div class="row">
            <div
              class="col-lg-8 col-12"
              data-aos="fade-up"
              data-aos-delay="250"
            >
              <div class="case-details-content mr-0 mr-lg-5">
                <h2>{{ $product->name }}</h2>
                <p>
                  {{ $product->body }}
                </p>

                
              </div>
            </div>
            <div
              class="col-lg-4 col-12"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <div class="case-info-card">
                <div
                  class="case-head bg-cover"
                  style="background-image: url('assets/img/case/case-head.png')"
                >
                  <h3>Project Details</h3>
                </div>
                <div class="project-data">
                  <div class="single-info-item">
                    <div class="left-data">Clients</div>
                    <div class="right-data">{{ $product->client }}</div>
                  </div>
                  <div class="single-info-item">
                    <div class="left-data">Project</div>
                    <div class="right-data">{{ $product->project }}</div>
                  </div>
                  <div class="single-info-item">
                    <div class="left-data">Service</div>
                    <div class="right-data">{{ $product->service }}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection