@extends('layouts.main')

@section('content')
<section class="service-details-post-wrapper section-padding">
    <div class="container">
      <div class="row">
        <div
          class="col-lg-7 col-xl-7 p-lg-0 col-12 order-1 order-lg-1"
          data-aos="fade-right"
        >
          <div class="service-details-content">
            <img src="assets/img/web-development.jpg" alt="" />
            <h1>{{ $service->title }}</h1>
            <p>
                {{ $service->body }}
            </p>

            <h4>Our Approach</h4>
            <p>
                We follow a comprehensive approach to web development, ensuring
                each project is executed with precision and efficiency. Our
                process includes:
            </p>

            @forelse ($service->our_approaches as $our_approach)
                <ul>
                    <li>
                        {{ $our_approach->body }}
                    </li>
                </ul>
            @empty
                <p>
                    No Data Yet
                </p>
            @endforelse
            

            

            <h4>Key Features</h4>

            <p>
              Our web development services include a wide range of features to
              ensure your website stands out and delivers a superior user
              experience:
            </p>

            @forelse ($service->key_features as $key_feature)
                <ul>
                    <li>
                        {{ $key_feature->body }}
                    </li>
                </ul>
            @empty
                <p>
                    No Data Yet
                </p>
            @endforelse
            

            <h4>Why Choose Us?</h4>

            <ul>
              <li>
                Expert Team: Our team of experienced developers is proficient
                in the latest web technologies and trends.
              </li>
              <li>
                Customer-Centric Approach: We prioritize your business goals
                and work closely with you to deliver solutions that meet your
                expectations.
              </li>
              <li>
                Proven Track Record: We have a history of successful web
                development projects across various industries.
              </li>
              <li>
                Innovative Solutions: We leverage cutting-edge technologies to
                create innovative solutions that give your business a
                competitive edge.
              </li>
              <li>
                Dedicated Support: Our commitment to providing excellent
                customer service ensures that you receive the support you
                need, whenever you need it.
              </li>
            </ul>

            <h4>Get Started</h4>
            <p>
              Ready to take your online presence to the next level? Contact us
              today to discuss your web development needs and discover how we
              can help you achieve your business goals.
            </p>
          </div>
        </div>
        <div
          class="col-lg-4 col-xl-3 mt-5 mt-lg-0 col-12 order-2 order-lg-2 offset-lg-1"
          data-aos="fade-left"
        >
          <div class="service-sidebar">
            <div class="single-sidebar-widgets">
              <div class="wid-title">
                <h3>Other Services</h3>
              </div>
              @forelse ($services as $service)
                <div class="services-category-link">
                  <a href="{{ route('front.service-details', $service->slug) }}">{{ $service->title }}</a>
                </div>
              @empty
                <p>No Data Yet</p>
              @endforelse
              
            </div>

            <div class="single-sidebar-widgets">
              <div class="wid-title">
                <h3>Contact Us</h3>
              </div>
              <div class="contact-form-widgets">
                <div class="info contact-details">
                  @forelse ($contacts as $contact)
                    <ul>
                      <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <span>
                          {{ $contact->address }}
                        </span>
                      </li>
                      <li>
                        <i class="fas fa-envelope"></i>
                        <span>{{ $contact->email }}</span>
                      </li>
                      <li>
                        <i class="fas fa-phone"></i>
                        <span>{{ $contact->phone_number }}</span>
                      </li>
                    </ul>
                  @empty
                    <p>No Data Yet</p>
                  @endforelse
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<x-cta-banner></x-cta-banner>
@endsection