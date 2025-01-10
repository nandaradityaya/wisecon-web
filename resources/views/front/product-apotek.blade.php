@extends('layouts.main')

@section('content')

<a
href="https://wa.me/+6285117047832"
target="_blank"
class="whatsapp-float"
title="Chat with us on WhatsApp"
style="z-index: 1000000"
>
<div class="whatsapp-icon">
  <i class="fab fa-whatsapp"></i>
</div>
<span class="whatsapp-text">Hubungi kami</span>
</a>

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

<section class="section-padding">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-5">
        <div class="text-center section-padding">
          <h4 class="mb-3" data-aos="fade-up" data-aos-delay="100">
            Software Apotek Terpercaya
          </h4>
          <h1
            class="moving-background mb-3"
            data-aos="fade-up"
            data-aos-delay="100"
          >
            WisePOS
          </h1>

          <p
            class="mb-5"
            data-aos="fade-up"
            data-aos-delay="150"
            class="pr-5"
          >
            Satu solusi software untuk mempermudah seluruh kebutuhan bisnis
            apotek Anda!
          </p>

          <div
            class="d-flex justify-content-center align-items-center gap-3"
          >
            <a
              href="#formApotek"
              class="btn btn-primary radius-10 px-4 py-3 mb-4"
              ><i class="icon-arrow-right-1 me-2"></i>Coba Gratis
            </a>
            <a
              href="https://wa.me/+6285117047832"
              target="_blank"
              class="btn btn-outline-primary radius-10 px-4 py-3 mb-4"
              >Agendakan Demo
            </a>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-7">
        <div
          class="single-photo-grid text-center py-5"
          data-aos="fade-up"
          data-aos-delay="100"
        >
          <img src="assets/img/grafik 1.png" alt="" />
        </div>
      </div>
    </div>
  </div>
</section>

<section class="case-study-post-wrapper py-5" style="z-index: 100">
  <div class="container">
    <div class="title-apotek text-center">
      <h1
        class="moving-background mb-3"
        data-aos="fade-up"
        data-aos-delay="100"
      >
        WisePOS
      </h1>
      <h2 class="text-center text-primary">
        Kelola Bisnis Apotek Anda dengan Lebih Mudah & Fleksibel
      </h2>
      <h2 class="text-center mb-3">Menggunakan Software Terbaik!</h2>
      <p class="text-center mb-4">
        Manajemen stok obat, transaksi penjualan, dan laporan keuangan jadi
        lebih praktis dengan
        <span class="text-primary">software Apotek</span> WisePOS.
        Dilengkapi dengan sistem POS (Point of Sales) kasir pintar, WisePOS
        membantu mengoptimalkan bisnis farmasi Anda di era digital.
      </p>

      <a
        href="https://wa.me/+6285117047832"
        target="_blank"
        class="theme-btn mb-5"
        >Coba Sekarang <i class="icon-arrow-right-1"></i
      ></a>
    </div>
    <div
      class="single-photo-grid text-center"
      data-aos="fade-up"
      data-aos-delay="100"
    >
      <img src="assets/img/grafik 1.png" alt="" />
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-6">
        <div class="section-title mb-30">
          <h1 data-aos="fade-up" data-aos-delay="100">
            Manajemen Operasional
          </h1>
        </div>

        <p data-aos="fade-up" data-aos-delay="150" class="pr-5">
          Kelola operasional Apotek dengan lebih terstruktur, mulai dari
          pencatatan transaksi, penebusan resep online, penyimpanan document
          Scan Faktur dan Scan Resep secara elektronik.
        </p>
        <div class="case-study-post-wrapper">
          <div class="case-contents-wrap">
            <div class="case-details-content mr-0 mr-lg-5">
              <ul>
                <li>Pencatatan Transaksi</li>
                <li>Penebusan Resep Online</li>
                <li>Dokumen Faktur dan Resep Elektronik</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6">
        <div
          class="single-photo-grid text-center"
          data-aos="fade-up"
          data-aos-delay="100"
        >
          <img src="assets/img/graphic-2.png" alt="" />
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-12 col-lg-6">
        <div
          class="single-photo-grid text-center"
          data-aos="fade-up"
          data-aos-delay="100"
        >
          <img src="assets/img/graphic-3.png" alt="" />
        </div>
      </div>
      <div class="col-12 col-lg-6 px-5">
        <div class="section-title mb-30">
          <h1 data-aos="fade-up" data-aos-delay="100">Tujuan Kami Hadir</h1>
        </div>

        <p data-aos="fade-up" data-aos-delay="150" class="pr-5 mb-4">
          Kelola Apotek dengan Mudah, Tingkatkan Pelayanan, Kembangkan
          Bisnis Apotek Anda, #TanpaRibet
        </p>
        <div class="d-flex">
          <a
            href="https://wa.me/+6285117047832"
            target="_blank"
            class="btn btn-outline-primary radius-10 px-4 py-3 mb-4"
            >Coba Sekarang
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- <section
  class="agent__wrapper py-5 bg-center bg-cover"
  style="background-image: url(./assets/img/home5/bg_01.png)"
>
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-8 col-lg-5">
        <div
          class="section-title section__title_3 mb-30"
          data-aos="fade-up"
          data-aos-delay="100"
        >
          <h6><img src="./assets/img/home5/bage.svg" alt />Testimonials</h6>
          <h2>Apa kata mereka tentang WisePOS</h2>
        </div>
      </div>
      <div class="col-12">
        <div class="agent-element owl-carousel mt-30">
          <div class="agent-item">
            <div class="agent-content d-flex align-items-center">
              <div
                class="agent-img bg-center bg-cover"
                style="background-image: url(./assets/img/home5/man.png)"
              ></div>
              <div class="agent-content_name">
                <h4>Elizabeth Linda</h4>
                <p>Apotek Sarana</p>
              </div>
            </div>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
              do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              Ut enim ad minim veniam.
            </p>
            <div class="quera">
              <img src="./assets/img/home5/quote.svg" alt />
            </div>
            <div class="agent-logo">
              <img src="./assets/img/home5/co_01.svg" alt />
            </div>
          </div>
          <div class="agent-item">
            <div class="agent-content d-flex align-items-center">
              <div
                class="agent-img bg-center bg-cover"
                style="background-image: url(./assets/img/home5/woman.png)"
              ></div>
              <div class="agent-content_name">
                <h4>Elizabeth Linda</h4>
                <p>Apotek Junee</p>
              </div>
            </div>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
              do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              Ut enim ad minim veniam.
            </p>
            <div class="quera">
              <img src="./assets/img/home5/quote.svg" alt />
            </div>
            <div class="agent-logo">
              <img src="./assets/img/home5/co_02.svg" alt />
            </div>
          </div>
          <div class="agent-item">
            <div class="agent-content d-flex align-items-center">
              <div
                class="agent-img bg-center bg-cover"
                style="background-image: url(./assets/img/home5/man.png)"
              ></div>
              <div class="agent-content_name">
                <h4>Elizabeth Linda</h4>
                <p>Apotek Prapatan</p>
              </div>
            </div>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
              do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              Ut enim ad minim veniam.
            </p>
            <div class="quera">
              <img src="./assets/img/home5/quote.svg" alt />
            </div>
            <div class="agent-logo">
              <img src="./assets/img/home5/co_01.svg" alt />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> --}}

<div class="container" id="formApotek">
  <div class="row py-5" data-aos="fade-up">
    <div class="col-12 text-center mb-20">
      <div class="section-title">
        <p>WisePOS: Sistem Apotek Terbaik</p>
        <h1>Formulir pendaftaran trial</h1>
      </div>
    </div>

    <div class="col-12 col-lg-6">
      <div
        class="single-photo-grid text-center pt-5"
        data-aos="fade-up"
        data-aos-delay="100"
      >
        <img src="assets/img/apotek-4.jpg" class="radius-10" alt="" />
      </div>
    </div>

    <div class="col-12 col-lg-6">
      <div class="contact-form">
        <form action="{{ route('front.apotek.store') }}" method="POST" enctype="multipart/form-data" class="row conact-form">
          @csrf
          <div class="col-12">
            <div class="single-personal-info">
              <label for="namaApotek">Nama Apotek</label>
              <input
                type="text"
                id="namaApotek"
                placeholder="Masukkan nama"
                name="name"
              />
            </div>
          </div>
          <div class="col-md-12 col-12">
            <div class="single-personal-info">
              <label for="alamat">Alamat</label>
              <textarea
                id="alamat"
                placeholder="Masukkan alamat"
                name="address"
              ></textarea>
            </div>
          </div>
          <div class="col-12">
            <div class="single-personal-info">
              <label for="pemilik">Nama Pemilik Apotek/PIC</label>
              <input type="text" id="pemilik" placeholder="Masukan PIC" name="pic" />
            </div>
          </div>
          <div class="col-md-12 col-12">
            <div class="single-personal-info">
              <label for="phone">Phone Number</label>
              <input type="text" id="phone" placeholder="Enter Number" name="phone_number" />
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
@endsection