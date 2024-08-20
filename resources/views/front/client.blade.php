@extends('layouts.main')

@section('content')
    <section class="case-study-wrapper section-padding">
      <div class="container">
        <div class="section-title text-center m-4" data-aos="fade-up">
          <h1>Our Clients</h1>
        </div>
        <div class="row case-study-2" data-aos="fade-up" data-aos-delay="150">
            @forelse ($clients as $client)
              <div class="col-md-6 col-xl-4 col-12">
                <div class="single-case-item">
                  <div class="case-thumb bg-cover">
                    <img
                      src="{{ Storage::url($client->client_img) }}"
                      class="radius-10"
                      alt=""
                      width="180"
                    />
                  </div>
                  <div class="contents">
                    <div class="content-visible">
                      <h3>{{ $client->client_name }}</h3>
                      <span>{{ $client->client_category }}</span>
                    </div>
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