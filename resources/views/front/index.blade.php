@extends('layouts.main')

@section('content')


  <section class="hero-slide-wrapper wisesa-landing-page">
    <div class="hero-slider-active-2 owl-carousel owl-theme">
      @forelse ($homes as $home)
        <div
          class="single-slide bg-cover"
          style="background-image: url('{{ Storage::url($home->img_slider) }}')"
        >
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="hero-contents text-center">
                  <a
                    class="theme-btn-sm"
                    data-animation="fadeInUp"
                    data-delay="0"
                    >{{ $home->badge_text }}</a
                  >
                  <h1 data-animation="fadeInUp" data-delay="0.4s">
                    {{ $home->title }}
                  </h1>
                  <div data-animation="fadeInUp" data-delay="0.6s">
                    <p>
                      {{ $home->sub_title }}
                    </p>
                  </div>

                  <div
                    class="btn__wrapper d-flex flex-wrap justify-content-center"
                    data-animation="fadeInUp"
                    data-delay="0.8s"
                  >
                    <a href="#" class="theme-btn"
                      >Service We Provide <i class="icon-arrow-right-1"></i
                    ></a>
                    <a href="#" class="theme-btn"
                      >learn more <i class="icon-arrow-right-1"></i
                    ></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @empty
        <p>
            Belum ada data terbaru
        </p>
      @endforelse
      

    </div>
  </section>

  <div class="content-area">
    <section class="our-service-wrapper section-bg-2 section-padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 offset-lg-2 col-12 text-center">
            <div class="section-title mb-30">
              <p data-aos="fade-up" data-aos-delay="50">How can help you</p>
              <h1 data-aos="fade-up" data-aos-delay="100">
                Providing The Best IT Solutions For Businesses For 15 Years
              </h1>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xl-3 col-md-6 col-12">
            <div
              class="single-service-vcard"
              data-aos="fade-up"
              data-aos-delay="150"
            >
              <a href="services-details.html" class="link"
                ><i class="fas fa-arrow-right"></i
              ></a>
              <div class="icon">
                <i class="fal fa-code"></i>
              </div>
              <div class="content">
                <h3>Software Development</h3>
                <p>
                  We specialize in crafting high-quality software solutions
                  for your needs.
                </p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 col-12">
            <div
              class="single-service-vcard"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <a href="services-details.html" class="link"
                ><i class="fas fa-arrow-right"></i
              ></a>
              <div class="icon">
                <img
                  src="assets/img/icon/ic_server_red.svg"
                  alt=""
                  width="46"
                />
              </div>
              <div class="content">
                <h3>Infrastructure</h3>
                <p>
                  Building robust and scalable IT infrastructures to support
                  your growth
                </p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 col-12">
            <div
              class="single-service-vcard"
              data-aos="fade-up"
              data-aos-delay="250"
            >
              <a href="services-details.html" class="link"
                ><i class="fas fa-arrow-right"></i
              ></a>
              <div class="icon">
                <img
                  src="assets/img/icon/ic_clock_red.svg"
                  alt=""
                  width="46"
                />
              </div>
              <div class="content">
                <h3>Excellent Support</h3>
                <p>
                  Providing top-notch support to ensure your IT operations run
                  smoothly.
                </p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 col-12">
            <div
              class="single-service-vcard"
              data-aos="fade-up"
              data-aos-delay="300"
            >
              <a href="services-details.html" class="link"
                ><i class="fas fa-arrow-right"></i
              ></a>
              <div class="icon">
                <img
                  src="assets/img/icon/ic_security_red.svg"
                  alt=""
                  width="46"
                />
              </div>
              <div class="content">
                <h3>Data Security</h3>
                <p>
                  Ensuring the safety and confidentiality of your critical
                  business data.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="about-wrapper wisesa-landing-page">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="about-img" data-aos="fade-right">
              <img src="assets/img/visi-misi.png" class="img-fluid" alt="" />
            </div>
          </div>

          <div class="col-lg-6">
            <div class="section-title">
              <a class="theme-btn-sm mb-15" data-aos="fade-left"
                >ABOUT COMPANY</a
              >
              <h1 data-aos="fade-left" data-aos-delay="100">
                15 Years Of Experience In IT Solutions
              </h1>
              <div data-aos="fade-left" data-aos-delay="150">
                <p>
                  Our organization is dedicated to innovation and technology,
                  using proven methodologies to deliver cost-effective
                  solutions. As a knowledge-driven company, we offer superior
                  IT services globally, with core competencies in complete
                  business solutions and technical consulting. We aim to
                  provide world-class services through continuous improvements
                  and leading-edge technologies.
                </p>
              </div>

              <div class="rate-content-grid d-flex justify-content-between">
                <div class="single-rate-item" data-aos="fade-up">
                  <h3>50+</h3>
                  <p>Active Status Clients</p>
                </div>
                <div
                  class="single-rate-item"
                  data-aos="fade-up"
                  data-aos-delay="100"
                >
                  <h3>100+</h3>
                  <p>Successful Projects</p>
                </div>
                <div
                  class="single-rate-item"
                  data-aos="fade-up"
                  data-aos-delay="150"
                >
                  <h3>30</h3>
                  <p>In-House Engineers</p>
                </div>
              </div>

              <a
                href="#"
                class="theme-btn black"
                data-aos="fade-up"
                data-aos-delay="200"
                >Know us more <i class="icon-arrow-right-1"></i
              ></a>
            </div>
          </div>
        </div>
      </div>
    </section>

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

        <div class="row text-center">

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
                    <a href="services-details.html">{{ $service->title }}</a>
                  </h3>
                  <p>
                    {{ $service->excerpt }}
                  </p>
                  <a href="#" class="read-more text-uppercase"
                    >read more <i class="icon-arrow-right-1"></i
                  ></a>
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

    <section class="project-case-study-wrapper wisesa-landing-page">
      <div class="container">
        <div class="project-case-study-wrapper__circle"></div>

        <div class="row">
          <div class="col-12">
            <div class="section-title text-center">
              <a class="theme-btn-sm mb-15" data-aos="fade-up"
                >Our Completed Projects</a
              >
              <h1 data-aos="fade-up" data-aos-delay="100">
                We have successfully delivered an IT solutions project.
              </h1>
            </div>
          </div>
        </div>
      </div>

      <div class="success-item__wrapper owl-carousel owl-theme">
        @forelse ($products as $product)
          <a href="{{ route('front.product-details', $product->slug) }}" class="success-item">
            <div
              class="thumb bg-cover"
              style="background-image: url('{{ Storage::url($service->thumbnail) }}')"
            ></div>
            <div
              class="content d-flex align-items-center justify-content-between"
            >
              <div class="text">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->service }}</p>
              </div>

              <div class="icon">
                <i class="icon-arrow-right-1"></i>
              </div>
            </div>
          </a>
        @empty
          <p>
            No Data Yet
          </p>
        @endforelse
        

      </div>
    </section>

    <section class="testimonial-wrapper wisesa-landing-page">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <div class="section-title">
              <a class="theme-btn-sm mb-15" data-aos="fade-right"
                >Client Testimonials</a
              >
              <h1 data-aos="fade-right" data-aos-delay="100">
                What They’re Saying
              </h1>
            </div>

            <div class="testimonial-carousel-3 owl-carousel owl-theme">
              @forelse ($testimonials as $testimonial)
                <div class="single-testimonial">
                  <div class="icon">
                    <i class="flaticon-right-quote"></i>
                  </div>
                  <h2>
                    {{ $testimonial->testimonial }}
                  </h2>
                  <div class="client-info">
                    <div class="client-bio">
                      <p><a href="#">{{ $testimonial->name }},</a> {{ $testimonial->company }}</p>
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

          <div class="col-md-4">
            <div class="testimonial-media" data-aos="fade-left">
              <img src="assets/img/testimoni.jpg" alt="" class="img-fluid" />
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <div class="client-brand-logo-wrap wisesa-landing-page pt-0">
    <div class="container">
      <div
        class="brand-carousel-active d-flex justify-content-between owl-carousel"
      >
        @forelse ($clients as $client)
          <div class="single-client">
            <img src="{{ Storage::url($client->client_img) }}" alt="" />
          </div>
        @empty
          <p>
            No Data Yet
          </p>
        @endforelse
        
    </div>
  </div>

  <x-cta-banner></x-cta-banner>

@endsection