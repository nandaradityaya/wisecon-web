@extends('layouts.main')

@section('content')
<section class="about-us-wrapper section-padding" data-aos="fade-up" style="padding-top: 200px!important;">
  <div class="container">

    @forelse ($abouts as $about)
        <div class="row">
            <div class="col-lg-6 col-12 pr-5">
                <a class="theme-btn-sm mb-15 aos-init aos-animate" data-aos="fade-left">ABOUT COMPANY</a>

                <p class="pr-lg-5">
                    {!! $about->body !!}
                </p>
            </div>

            <div class="col-lg-6 pl-lg-5 mt-5 mt-lg-0 col-12">
                <div class="about-right-img">
                    <span class="dot-circle"></span>
                    <div class="about-us-img" style="background-image: url('{{ Storage::url($about->img_about) }}'); background-size: cover;
            background-position: center;">
                    </div>
                    <span class="triangle-bottom-right"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="about-icon-box style-2">
                    <div class="icon">
                        <i class="fal fa-eye"></i>
                    </div>
                    <div class="content">
                        <h3>Vision</h3>
                        <p>{{ $about->vision }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="about-icon-box style-2">
                    <div class="icon">
                        <i class="fal fa-bullseye-arrow"></i>
                    </div>
                    <div class="content">
                        <h3>Mission</h3>
                        <p>{{ $about->mission }}</p>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="row">
            <div class="col-lg-6 col-12 pr-5">
                <a class="theme-btn-sm mb-15 aos-init aos-animate" data-aos="fade-left">ABOUT COMPANY</a>

                <p class="pr-lg-5">
                    No Data Yet
                </p>
            </div>

            <div class="col-lg-6 pl-lg-5 mt-5 mt-lg-0 col-12">
                <div class="about-right-img">
                    <span class="dot-circle"></span>
                    <div class="about-us-img" style="background-image: url(''); background-size: cover;
            background-position: center;">
                    </div>
                    <span class="triangle-bottom-right"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="about-icon-box style-2">
                    <div class="icon">
                        <i class="fal fa-eye"></i>
                    </div>
                    <div class="content">
                        <h3>Vision</h3>
                        <p>No Data Yet</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="about-icon-box style-2">
                    <div class="icon">
                        <i class="fal fa-bullseye-arrow"></i>
                    </div>
                    <div class="content">
                        <h3>Mission</h3>
                        <p>No Data Yet</p>
                    </div>
                </div>
            </div>
        </div>
    @endforelse
      
      

      <div class="row mpt-50 pt-100">
          <div class="col-lg-4 col-md-6 col-12">
              <div class="single-features-item">
                  <div class="icon">
                      <i class="flaticon-speech-bubble"></i>
                  </div>
                  <div class="content">
                      <h3>IT Consultancy</h3>
                      <p>Innovative Solutions</p>
                  </div>
              </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12">
              <div class="single-features-item">
                  <div class="icon">
                      <i class="flaticon-unlock"></i>
                  </div>
                  <div class="content">
                      <h3>Cyber Security</h3>
                      <p>Secure & Smart Solutions</p>
                  </div>
              </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12">
              <div class="single-features-item">
                  <div class="icon">
                      <i class="flaticon-mobile-app"></i>
                  </div>
                  <div class="content">
                      <h3>Development</h3>
                      <p>Rapid & Intelligent Solutions</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>  

<section class="faq-section section-padding" data-aos="fade-up">
  <div class="faq-bg bg-cover d-none d-lg-block" style="background-image: url('assets/img/faq.jpg')"></div>
  <div class="container">
      <div class="row">
          <div class="col-xl-5 col-lg-6 offset-lg-6 offset-xl-7">
              <div class="col-12 col-lg-12 mb-40">
                  <div class="section-title">
                      <p>Why choose us</p>
                      <h2>Creating Innovative Solutions <br>
                          A Digital-First Approach</h2>
                  </div>
              </div>

              <div class="faq-content">
                  <div class="faq-accordion">
                      <div id="accordion" class="accordion">
                          @forelse ($faqs as $faq)
                            <div class="card">
                                <div class="card-header" id="faq{{ $faq->id }}">
                                    <p class="mb-0 text-capitalize">
                                        <a class="collapsed" role="button" data-toggle="collapse" aria-expanded="false" href="#faq-{{ $faq->id }}">
                                            {{ $faq->question }}
                                        </a>
                                    </h5>
                                </div>
                                <div id="faq-{{ $faq->id }}" class="collapse  @if($faq->id == 2) show @endif" data-parent="#accordion">
                                    <div class="card-body">
                                        {{ $faq->answer }}
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
              </div>
          </div>
      </div>
  </div>
</section>

<section class="our-team-wrapper section-padding" data-aos="fade-up">
  <div class="container">
      <div class="row align-items-center mb-40">
          <div class="col-12 col-md-6">
              <div class="section-title">
                  <p>Exclusive Members</p>
                  <h1>Meet Our Experience Team Members</h1>
              </div>
          </div>
          <div class="col-12 col-md-6 mt-4 mt-md-0 text-md-right">
              <a href="team.html" class="theme-btn off-white">View all Member <i class="fas fa-arrow-right"></i></a>
          </div>
      </div>

      <div class="team-members-list row">
        @forelse ($teams as $team)
            <div class="col-12 col-md-6 col-xl-3">
                <div class="single-team-member">
                    <div class="member-img bg-cover bg-center" style="background-image: url('{{ Storage::url($team->img_team) }}')">
                    </div>
                    <div class="member-bio">
                        <h4>{{ $team->name }}</h4>
                        <p>{{ $team->title }}</p>
                    </div>
                    <div class="social-profile">
                        <a href="{{ $team->linkedin }}"><i class="fab fa-linkedin"></i></a>
                        <a href="{{ $team->instagram }}"><i class="fab fa-instagram"></i></a>
                        <a href="{{ $team->behance }}"><i class="fab fa-behance"></i></a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 col-md-6 col-xl-3">
                <div class="single-team-member">
                    <div class="member-img bg-cover bg-center" style="background-image: url('')">
                    </div>
                    <div class="member-bio">
                        <h4>No Data Yet</h4>
                        <p>No Data Yet</p>
                    </div>
                    <div class="social-profile">
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-behance"></i></a>
                    </div>
                </div>
            </div>
        @endforelse
          
      </div>
  </div>
</section>   

@endsection