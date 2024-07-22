<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="rrdevs" />
    <title>Wisesa Consulting</title>
    <link rel="shortcut icon" href="../assets/img/ico-wisesa.svg" />
    <link rel="stylesheet" href="../assets/css/icons.css" />
    <link rel="stylesheet" href="../assets/css/animate.css" />
    <link rel="stylesheet" href="../assets/css/magnific-popup.css" />
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="../assets/css/metismenu.css" />
    <link rel="stylesheet" href="../assets/css/owl.theme.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/aos.min.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
  </head>

  <body class="body-wrapper">
    <!-- Light And Dark  -->
    <div class="dark_mode" style="display: none">
      <input type="checkbox" class="checkbox" id="checkbox" />
      <label for="checkbox" class="checkbox-label">
        <i class="fas fa-moon"></i>
        <i class="fas fa-sun"></i>
        <span class="ball"></span>
      </label>
    </div>

    <header class="header-wrap header-wisesa">
      <div class="main-header-wraper">
        <div class="container-fluid">
          <div class="d-flex align-items-center justify-content-between">
            <div class="header-logo">
              <div class="logo">
                <a href="index.html">
                  <img
                    src="../assets/img/logo-wisesa.svg"
                    alt="logo"
                    width="158"
                  />
                </a>
              </div>
              <div class="logo-2">
                <a href="index.html">
                  <img
                    src="../assets/img/logo-wisesa.svg"
                    alt="logo"
                    width="158"
                  />
                </a>
              </div>
            </div>
            <div class="header-menu d-none d-xl-block">
              <div class="main-menu">
                <ul>
                  <li class="{{ request()->routeIs('front.index') ? 'active' : '' }}"><a href="{{ route('front.index') }}">Home</a></li>
                  <li class="{{ request()->routeIs('front.about') ? 'active' : '' }}"><a href="{{ route('front.about') }}">About Us</a></li>
                  <li class="{{ request()->routeIs('front.service') ? 'active' : '' }}"><a href="{{ route('front.service') }}">Services</a></li>
                  <li class="{{ request()->routeIs('front.product') ? 'active' : '' }}"><a href="{{ route('front.product') }}">Products</a></li>

                  <li class="{{ request()->routeIs('front.client') ? 'active' : '' }}"><a href="{{ route('front.client') }}">Clients</a></li>
                  <li class="{{ request()->routeIs('front.career') ? 'active' : '' }}"><a href="{{ route('front.career') }}">Career</a></li>
                  <li class="{{ request()->routeIs('front.contact') ? 'active' : '' }}"><a href="{{ route('front.contact') }}">Contact</a></li>
                </ul>
              </div>
            </div>
            <div class="header-right d-flex align-items-center">
              @if($companyProfiles->isNotEmpty())
                  @foreach($companyProfiles as $companyProfile)
                      <div class="header-btn-cta">
                          <a href="{{ Storage::url($companyProfile->compro) }}" class="theme-btn" download>
                              Company Profile <i class="fas fa-file-pdf"></i>
                          </a>
                      </div>
                  @endforeach
              @else
                <div class="header-btn-cta">
                    <a href="#" class="theme-btn">
                        Company Profile <i class="fas fa-file-pdf"></i>
                    </a>
                </div>
              @endif
              
              <div class="mobile-nav-bar d-block ml-3 ml-sm-5 d-xl-none">
                <div class="mobile-nav-wrap">
                  <div id="hamburger">
                    <i class="fal fa-bars text-black"></i>
                  </div>
                  <!-- mobile menu - responsive menu  -->
                  <div class="mobile-nav">
                    <button type="button" class="close-nav">
                      <i class="fal fa-times-circle"></i>
                    </button>
                    <nav class="sidebar-nav">
                      <ul class="metismenu" id="mobile-menu">
                        <li><a href="{{ route('front.index') }}">Home</a></li>
                        <li><a href="{{ route('front.about') }}">About Us</a></li>
                        <li><a href="{{ route('front.service') }}">Services</a></li>
                        <li><a href="{{ route('front.product') }}">Products</a></li>

                        <li><a href="{{ route('front.client') }}">Clients</a></li>
                        <li><a href="{{ route('front.career') }}">Career</a></li>
                        <li><a href="{{ route('front.contact') }}">Contact</a></li>
                      </ul>
                    </nav>

                    <div class="action-bar">
                      <a href="mailto:modinatheme@gmail.com"
                        ><i class="fal fa-envelope-open-text"></i
                        >msi@gmail.com</a
                      >
                      <a href="tel:123-456-7890"
                        ><i class="fal fa-phone"></i>021-123-456</a
                      >
                      <a href="contact.html" class="d-btn theme-btn black"
                        >Consultancy</a
                      >
                    </div>
                  </div>
                </div>
                <div class="overlay"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    @yield('content')

    <footer class="footer-wisesa footer-wrap">
      <div class="footer-widgets">
        <div class="container">
          <div class="row justify-content-between">
            <div class="col-md-6 col-xl-3 col-12 pr-xl-4">
              <div class="single-footer-wid site_footer_widget">
                <div class="footer-logo">
                  <a href="index.html">
                    <img
                      src="../assets/img/logo-wisesa.svg"
                      alt="logo wisesa consulting"
                    />
                  </a>
                </div>
                <div class="footer-logo-2">
                  <a href="index.html">
                    <img
                      src="../assets/img/logo-wisesa.svg"
                      alt="logo wisesa consulting"
                    />
                  </a>
                </div>
                <p class="mt-4">
                  IT Solutions to Grow Your Business. Innovative IT Solutions
                  Supported by Expert Knowledge
                </p>
                <div class="social-link mt-30">
                  <a href="#"><i class="fab fa-facebook-f"></i></a>
                  <a href="#"><i class="fab fa-twitter"></i></a>
                  <a href="#"><i class="fab fa-linkedin"></i></a>
                  <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-xl-2 col-12">
              <div class="single-footer-wid">
                <div class="wid-title">
                  <h4>Services</h4>
                </div>
                <ul>
                  <li><a href="#">Infrastructure</a></li>
                  <li><a href="#">Web Development</a></li>
                  <li><a href="#">Mobile App Development</a></li>
                  <li><a href="#">UI/UX Strategy</a></li>
                  <li><a href="#">Excellent Support</a></li>
                  <li><a href="#">Data Security</a></li>
                </ul>
              </div>
            </div>

            <div class="col-md-6 col-xl-2 col-12">
              <div class="single-footer-wid">
                <div class="wid-title">
                  <h4>Company</h4>
                </div>
                <ul>
                  <li><a href="about.html">About Us</a></li>
                  <li><a href="career.html">Need a Career</a></li>
                  <li><a href="#">Working Process</a></li>
                  <li><a href="contact.html">Contact Us</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="footer-bottom">
        <div class="container text-center">
          <div class="footer-bottom-content">
            © 2024 <a href="index.html">Wisecon</a>. All Rights Reserved
          </div>
        </div>
      </div>
    </footer>

    <!--  ALl JS Plugins
    ====================================== -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/modernizr.min.js"></script>
    <script src="../assets/js/jquery.easing.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/isotope.pkgd.min.js"></script>
    <script src="../assets/js/imageload.min.js"></script>
    <script src="../assets/js/scrollUp.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/magnific-popup.min.js"></script>
    <script src="../assets/js/easypiechart.min.js"></script>
    <script src="../assets/js/counterup.min.js"></script>
    <script src="../assets/js/wow.min.js"></script>
    <script src="../assets/js/metismenu.js"></script>
    <script src="../assets/js/timeline.min.js"></script>
    <script src="../assets/js/nice-select.min.js"></script>
    <script src="../assets/js/ajax-mail.js"></script>
    <script src="../assets/js/aos.min.js"></script>
    <script src="../assets/js/active.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
          // Close the alert
          var successAlert = document.getElementById('success-alert');
          if (successAlert) {
            var bsAlert = new bootstrap.Alert(successAlert);
            bsAlert.close();
          }
  
          var errorAlert = document.getElementById('error-alert');
          if (errorAlert) {
            var bsAlert = new bootstrap.Alert(errorAlert);
            bsAlert.close();
          }
        }, 5000);
      });
    </script>
  </body>
</html>
