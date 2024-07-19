@extends('layouts.main')

@section('content')
<section class="blog-wrapper news-wrapper section-padding">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-8" data-aos="fade-right">
          <div class="blog-post-details border-wrap">
            <div class="single-blog-post post-details">
              <div class="post-content">
                <div class="post-cat">
                  <a href="#">{{ $career->category }}</a>
                </div>
                <h2>{{ $career->title }}</h2>
                <div class="post-meta">
                  <span class="mb-4"><i class="fal fa-map-marker-alt"></i>{{ $career->location }}</span>
               
                <div class="job-desc mb-4">
                  <h4>Job Description</h4>
                  @forelse ($career->job_descriptions as $job_description)
                    <ul>
                        <li>{{ $job_description->job_desc }}</li>
                    </ul>
                  @empty
                      
                  @endforelse
                  
                </div>

                <div class="requirement">
                  <h4>Requirement</h4>
                    @forelse ($career->requirements as $requirement)
                        <ul>
                            <li>{{ $requirement->requirement }}</li>
                        </ul>
                    @empty
                    @endforelse
                </div>

              </div>

              <div class="row mt-4">
                <div class="col-12 text-center mb-20">
                  <div class="section-title">
                    <h3>
                      Apply Now
                    </h3>
                  </div>
                </div>
      
                <div class="col-12 col-lg-12">
                  <div class="contact-form">
                    <form action="" class="row conact-form">
                      <div class="col-md-6 col-12">
                        <div class="single-personal-info">
                          <label for="fname">Full Name</label>
                          <input type="text" id="fname" placeholder="Enter Name" />
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="single-personal-info">
                          <label for="email">Email Address</label>
                          <input
                            type="email"
                            id="email"
                            placeholder="Enter Email Address"
                          />
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="single-personal-info">
                          <label for="phone">Phone Number</label>
                          <input type="text" id="phone" placeholder="Enter Number" />
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="single-personal-info">
                          <label for="subject">Position</label>
                          <select class="form-select form-select-wisesa" aria-label="position">
                            <option selected>Select Position</option>
                            <option value="1">Developer</option>
                            <option value="2">UI/UX Designer</option>
                            <option value="3">Business Analyst</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12 col-12">
                        <div class="single-personal-info">
                          <label for="subject">Resume / CV</label>
                          <input class="form-control" type="file" id="formFile">
                        </div>
                      </div>
                      <div class="col-md-12 col-12 text-center">
                        <button type="submit" class="theme-btn">
                          Apply <i class="fas fa-arrow-right"></i>
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
       
      </div>
      <div class="col-12 col-lg-4" data-aos="fade-left">
        <div class="main-sidebar">
          <div class="single-sidebar-widget author-box-widegts">
            <div class="wid-title">
              <h3>How can we help you</h3>
            </div>
            <div class="author-info text-center">
              <p class="mb-3">
                Reach out to Wisesa Consulting at our office or send us an online business inquiry.
              </p>
              <a href="contact.html" class="theme-btn">Contact Us <i class="fal fa-phone"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="cta-banner style-3 pt-0">
    <div
      class="container-fluid bg-cover section-bg"
      style="background-image: url('assets/img/cta_bg1.png')"
    >
      <div class="cta-content">
        <div class="row align-items-center">
          <div class="col-xl-12 text-white col-12 text-center text-xl-left">
            <h4>
              Or send your application letter, CV, your certificate and recent photograph by email to karir@wisecon.com
            </h4>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection