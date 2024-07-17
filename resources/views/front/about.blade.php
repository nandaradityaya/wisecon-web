@extends('layouts.main')

@section('content')
<section class="about-us-wrapper section-padding" data-aos="fade-up" style="padding-top: 200px!important;">
  <div class="container">
      <div class="row">
          <div class="col-lg-6 col-12 pr-5">
              <a class="theme-btn-sm mb-15 aos-init aos-animate" data-aos="fade-left">ABOUT COMPANY</a>

              <p class="pr-lg-5">
                  Wisesa Consulting Indonesia (WiseCon) was established in 2007 as IT Outsourcing and in 2014 changed management to focus on solutions.
                  <br> <br>
                  We was formerly organized by IT professionals and experts who have same ideas of delivering quality business system solution and services. As a quality and flexible organization, we are geared towards innovation and technology using proven methodology and approach to deliver cost-effective solutions. We are also knowledge-driven company offering superior Information Technology services for its global customers.
                  <br> <br>
                  Our core competency lies in complete business solutions and technical consulting resources, both industry and technology specific. We strive for the right efforts through continuous improvements on leading edge technologies with the aim of providing world-class services to our local and global clients.
              </p>
          </div>

          <div class="col-lg-6 pl-lg-5 mt-5 mt-lg-0 col-12">
              <div class="about-right-img">
                  <span class="dot-circle"></span>
                  <div class="about-us-img" style="background-image: url('assets/img/about-company.jpg'); background-size: cover;
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
                      <p>Our vision is to become the best-of-breed IT Solution Provider, Business Consulting & Management, Outsourcing & Services.</p>
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
                      <p>Our mission is to enhance productivity and boost our competency at the forefront of domestic and international based technology sectors, delivering state-of-the-art of business system solution & services by focusing our competency and keeping up-to-date to technology advance and development.</p>
                  </div>
              </div>
          </div>
      </div>

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
                          <div class="card">
                              <div class="card-header" id="faq1">
                                  <p class="mb-0 text-capitalize">
                                      <a class="collapsed" role="button" data-toggle="collapse" aria-expanded="false" href="#faq-1">
                                          What services does your IT company offer?
                                      </a>
                                  </h5>
                              </div>
                              <div id="faq-1" class="collapse" data-parent="#accordion">
                                  <div class="card-body">
                                      Our company offers a wide range of IT services including software development, mobile app development, UI/UX design, IT consultancy, cyber security solutions, and IT support. We provide customized solutions to meet the unique needs of our clients.
                                  </div>
                              </div>
                          </div> <!-- /card -->
                          <div class="card">
                              <div class="card-header" id="faq2">
                                  <p class="mb-0 text-capitalize">
                                      <a class="collapsed" role="button" data-toggle="collapse" aria-expanded="true" href="#faq-2">
                                          How can your IT solutions help my business grow?
                                      </a>
                                  </p>
                              </div>
                              <div id="faq-2" class="collapse show" data-parent="#accordion">
                                  <div class="card-body">
                                      Our IT solutions are designed to streamline your business processes, enhance productivity, and improve efficiency. By leveraging the latest technologies and best practices, we help you achieve your business goals and stay competitive in the market.
                                  </div>
                              </div>
                          </div> <!-- /card -->
                          <div class="card">
                              <div class="card-header" id="faq4">
                                  <p class="mb-0 text-capitalize">
                                      <a class="collapsed" role="button" data-toggle="collapse" aria-expanded="false" href="#faq-3">
                                          What industries do you serve?
                                      </a>
                                  </p>
                              </div>
                              <div id="faq-3" class="collapse" data-parent="#accordion">
                                  <div class="card-body">
                                      We serve a variety of industries including finance, healthcare, education, retail, manufacturing, and more. Our team has the expertise to tailor IT solutions that address the specific challenges and requirements of each industry.
                                  </div>
                              </div>
                          </div> <!-- /card -->
                          <div class="card">
                              <div class="card-header" id="faq4">
                                  <p class="mb-0 text-capitalize">
                                      <a class="collapsed" role="button" data-toggle="collapse" aria-expanded="false" href="#faq-4">
                                          Do you offer support and maintenance?
                                      </a>
                                  </p>
                              </div>
                              <div id="faq-4" class="collapse" data-parent="#accordion">
                                  <div class="card-body">
                                      Yes, we offer comprehensive support and maintenance services to ensure the continued performance and reliability of your IT systems. Our support team is available to assist with any issues or updates needed to keep your systems running smoothly.
                                  </div>
                              </div>
                          </div> <!-- /card -->
                          <div class="card">
                              <div class="card-header" id="faq5">
                                  <p class="mb-0 text-capitalize">
                                      <a class="collapsed" role="button" data-toggle="collapse" aria-expanded="false" href="#faq-5">
                                          What is your approach to project <br> management?
                                      </a>
                                  </p>
                              </div>
                              <div id="faq-5" class="collapse" data-parent="#accordion">
                                  <div class="card-body">
                                      We follow a structured project management approach, which includes initial consultation, requirement analysis, planning, design, development, testing, deployment, and support. Our methodology ensures that projects are delivered on time, within budget, and to the highest quality standards.
                                  </div>
                              </div>
                          </div> <!-- /card -->
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
          <div class="col-12 col-md-6 col-xl-3">
              <div class="single-team-member">
                  <div class="member-img bg-cover bg-center" style="background-image: url('assets/img/team/team1.jpg')">
                  </div>
                  <div class="member-bio">
                      <h4>Jimmy Darsono</h4>
                      <p>CEO</p>
                  </div>
                  <div class="social-profile">
                      <a href="#"><i class="fab fa-linkedin"></i></a>
                      <a href="#"><i class="fab fa-instagram"></i></a>
                      <a href="#"><i class="fab fa-behance"></i></a>
                  </div>
              </div>
          </div>
          <div class="col-12 col-md-6 col-xl-3">
              <div class="single-team-member">
                  <div class="member-img bg-cover bg-center" style="background-image: url('assets/img/team/team2.jpg')">
                  </div>
                  <div class="member-bio">
                      <h4>Bertha Nelson</h4>
                      <p>Development Head</p>
                  </div>
                  <div class="social-profile">
                      <a href="#"><i class="fab fa-linkedin"></i></a>
                      <a href="#"><i class="fab fa-instagram"></i></a>
                      <a href="#"><i class="fab fa-behance"></i></a>
                  </div>
              </div>
          </div>
          <div class="col-12 col-md-6 col-xl-3">
              <div class="single-team-member">
                  <div class="member-img bg-cover bg-center" style="background-image: url('assets/img/team/team3.jpg')">
                  </div>
                  <div class="member-bio">
                      <h4>Barra Syauqi</h4>
                      <p>Product Head</p>
                  </div>
                  <div class="social-profile">
                      <a href="#"><i class="fab fa-linkedin"></i></a>
                      <a href="#"><i class="fab fa-instagram"></i></a>
                      <a href="#"><i class="fab fa-behance"></i></a>
                  </div>
              </div>
          </div>
          <div class="col-12 col-md-6 col-xl-3">
              <div class="single-team-member">
                  <div class="member-img bg-cover bg-center" style="background-image: url('assets/img/team/team4.jpg')">
                  </div>
                  <div class="member-bio">
                      <h4>Danuh</h4>
                      <p>Developer</p>
                  </div>
                  <div class="social-profile">
                      <a href="#"><i class="fab fa-linkedin"></i></a>
                      <a href="#"><i class="fab fa-instagram"></i></a>
                      <a href="#"><i class="fab fa-behance"></i></a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>   

@endsection