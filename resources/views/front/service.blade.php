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

      <div class="row text-center">
        <div class="col-xl-4 col-md-6 col-12" data-aos="fade-up">
          <div class="single-our-service style-2">
            <div
              class="thumb bg-cover"
              style="background-image: url('assets/img/infrastructure.jpg')"
            ></div>
            <div class="content">
              <div class="icon">
                <img src="assets/img/icon/ic_server.svg" alt="" />
              </div>
              <h3>
                <a href="services-details.html">Infrastructure</a>
              </h3>
              <p>
                Building robust and scalable IT infrastructures to support
                your growth
              </p>
              <a href="#" class="read-more text-uppercase"
                >read more <i class="icon-arrow-right-1"></i
              ></a>
            </div>
          </div>
        </div>

        <div
          class="col-xl-4 col-md-6 col-12"
          data-aos="fade-up"
          data-aos-delay="100"
        >
          <div class="single-our-service style-2">
            <div
              class="thumb bg-cover"
              style="background-image: url('assets/img/web-development.jpg')"
            ></div>
            <div class="content">
              <div class="icon">
                <img src="assets/img/icon/ic_code.svg" alt="" />
              </div>
              <h3><a href="services-details.html">Web Development</a></h3>
              <p>
                Developing high-quality, responsive websites tailored to your
                needs.
              </p>
              <a href="#" class="read-more text-uppercase"
                >read more <i class="icon-arrow-right-1"></i
              ></a>
            </div>
          </div>
        </div>

        <div
          class="col-xl-4 col-md-6 col-12"
          data-aos="fade-up"
          data-aos-delay="100"
        >
          <div class="single-our-service style-2">
            <div
              class="thumb bg-cover"
              style="background-image: url('assets/img/app-development.jpg')"
            ></div>
            <div class="content">
              <div class="icon">
                <img src="assets/img/icon/ic_mobile.svg" alt="" />
              </div>
              <h3>
                <a href="services-details.html">Mobile App Development</a>
              </h3>
              <p>
                Creating innovative mobile apps that meet your business needs.
              </p>
              <a href="#" class="read-more text-uppercase"
                >read more <i class="icon-arrow-right-1"></i
              ></a>
            </div>
          </div>
        </div>

        <div
          class="col-xl-4 col-md-6 col-12"
          data-aos="fade-up"
          data-aos-delay="150"
        >
          <div class="single-our-service style-2">
            <div
              class="thumb bg-cover"
              style="background-image: url('assets/img/uiux-design.jpg')"
            ></div>
            <div class="content">
              <div class="icon">
                <img src="assets/img/icon/ic_strategy.svg" alt="" />
              </div>
              <h3><a href="services-details.html">UI/UX Strategy</a></h3>
              <p>
                Designing intuitive and engaging user experiences for your
                products.
              </p>
              <a href="#" class="read-more text-uppercase"
                >read more <i class="icon-arrow-right-1"></i
              ></a>
            </div>
          </div>
        </div>

        <div
          class="col-xl-4 col-md-6 col-12"
          data-aos="fade-up"
          data-aos-delay="150"
        >
          <div class="single-our-service style-2">
            <div
              class="thumb bg-cover"
              style="background-image: url('assets/img/support.jpg')"
            ></div>
            <div class="content">
              <div class="icon">
                <img src="assets/img/icon/ic_clock.svg" alt="" />
              </div>
              <h3><a href="services-details.html">Excellent Support</a></h3>
              <p>
                Providing top-notch support to ensure your IT operations run
                smoothly.
              </p>
              <a href="#" class="read-more text-uppercase"
                >read more <i class="icon-arrow-right-1"></i
              ></a>
            </div>
          </div>
        </div>

        <div
          class="col-xl-4 col-md-6 col-12"
          data-aos="fade-up"
          data-aos-delay="150"
        >
          <div class="single-our-service style-2">
            <div
              class="thumb bg-cover"
              style="background-image: url('assets/img/cyber-security.jpg')"
            ></div>
            <div class="content">
              <div class="icon">
                <img src="assets/img/icon/ic_security.svg" alt="" />
              </div>
              <h3><a href="services-details.html">Data Security</a></h3>
              <p>
                Ensuring the safety and confidentiality of your critical
                business data.
              </p>
              <a href="#" class="read-more text-uppercase"
                >read more <i class="icon-arrow-right-1"></i
              ></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="cta-banner style-3">
    <div
      class="container-fluid bg-cover section-bg"
      style="background-image: url('assets/img/cta_bg1.png')"
    >
      <div class="cta-content">
        <div class="row align-items-center">
          <div class="col-xl-7 text-white col-12 text-center text-xl-left">
            <h1>
              Ready To Get Free Consulations For <br />
              Any Kind Of IT Solutions ?
            </h1>
          </div>
          <div class="col-xl-5 col-12">
            <div
              class="btn-wraper d-flex flex-wrap justify-content-xl-end mt-2 mt-md-4 mt-xl-0"
            >
              <a href="contact.html" class="theme-btn"
                >Get a quote <i class="icon-arrow-right-1"></i
              ></a>
              <a href="about.html" class="theme-btn"
                >read more <i class="icon-arrow-right-1"></i
              ></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection