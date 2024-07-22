@extends('layouts.main')

@section('content')
    <section class="contact-page-wrap section-padding">
      <div class="container">
        @if(session('success'))
            <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2" id="success-alert">
                <div class="d-flex align-items-center">
                    <div class="font-35 text-success"><i class="bx bxs-check-circle"></i></div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-success">Success</h6>
                        <div>{{ session('success') }}</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        @if(session('error'))
        <div class="alert border-0 border-start border-5 border-danger alert-dismissible fade show py-2" id="error-alert">
            <div class="d-flex align-items-center">
                <div class="font-35 text-danger"><i class="bx bxs-x-circle"></i></div>
                <div class="ms-3">
                    <h6 class="mb-0 text-danger">Error</h6>
                    <div>{{ session('error') }}</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @forelse ($contacts as $contact)
          <div class="row">
            <div class="col-12 col-lg-8" data-aos="fade-right">
              <div class="contact-map-wrap">
                <div id="map">
                  <iframe
                    src="{{ $contact->link_map }}"
                    frameborder="0"
                    style="border: 0; width: 100%"
                    allowfullscreen=""
                    aria-hidden="false"
                    tabindex="0"
                  ></iframe>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-4" data-aos="fade-left">
              <div class="single-contact-card card3">
                <div class="top-part">
                  <div class="title">
                    <h4>Contact Details</h4>
                  </div>
                </div>
                <div class="bottom-part">
                  <div class="info contact-details">
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
                  </div>
                </div>
              </div>
            </div>
          </div>
        @empty
          <div class="row">
            <div class="col-12 col-lg-8" data-aos="fade-right">
              <div class="contact-map-wrap">
                <div id="map">
                  <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.682262979968!2d106.80749647570084!3d-6.173277993814109!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f67c43deaaab%3A0x5c0769dd99aa048b!2sPT.%20Wisesa%20Consulting%20Indonesia!5e0!3m2!1sid!2sid!4v1720598277187!5m2!1sid!2sid"
                    frameborder="0"
                    style="border: 0; width: 100%"
                    allowfullscreen=""
                    aria-hidden="false"
                    tabindex="0"
                  ></iframe>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-4" data-aos="fade-left">
              <div class="single-contact-card card3">
                <div class="top-part">
                  <div class="title">
                    <h4>Contact Details</h4>
                  </div>
                </div>
                <div class="bottom-part">
                  <div class="info contact-details">
                    <ul>
                      <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <span>
                            Jl. Ampasit VI No.11A, RT.002/RW.002 Cideng, Jakarta,
                            Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10150
                        </span>
                      </li>
                      <li>
                        <i class="fas fa-envelope"></i>
                        <span>info@wisesa-consulting.com</span>
                      </li>
                      <li>
                        <i class="fas fa-phone"></i>
                        <span>+6221 3514 131</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforelse


        <div class="row section-padding" data-aos="fade-up">
          <div class="col-12 text-center mb-20">
            <div class="section-title">
              <p>send us message</p>
              <h1>
                Don't Hesitate To Get In Touch <br />
                Drop Us A Line Or Say Hi
              </h1>
            </div>
          </div>

          <div class="col-12 col-lg-12">
            <div class="contact-form">
              <form action="{{ route('front.message.store') }}" method="POST" enctype="multipart/form-data" class="row conact-form">
                @csrf
                <div class="col-md-6 col-12">
                  <div class="single-personal-info">
                    <label for="fname">Full Name</label>
                    <input type="text" id="fname" placeholder="Enter Name" required name="name" />
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="single-personal-info">
                    <label for="email">Email Address</label>
                    <input
                      type="email"
                      id="email"
                      placeholder="Enter Email Address"
                      required
                      name="email"
                    />
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="single-personal-info">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" placeholder="Enter Number" required name="phone_number"/>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="single-personal-info">
                    <label for="subject">Subject</label>
                    <input
                      type="text"
                      id="subject"
                      placeholder="Enter Subject"
                      required
                      name="subject"
                    />
                  </div>
                </div>
                <div class="col-md-12 col-12">
                  <div class="single-personal-info">
                    <label for="subject">Enter Message</label>
                    <textarea
                      id="subject"
                      placeholder="Enter message"
                      required 
                      name="message"
                    ></textarea>
                  </div>
                </div>
                <div class="col-md-12 col-12 text-center">
                  <button type="submit" class="theme-btn">
                    send message <i class="fas fa-arrow-right"></i>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection