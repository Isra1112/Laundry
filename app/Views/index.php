<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <title>Chain App Dev - App Landing Page HTML5 Template</title>

    <!-- Bootstrap core CSS --> 
    <link href="<?php echo base_url(
        'vendorr/bootstrap/css/bootstrap.min.css'
    ); ?>" rel="stylesheet">

<!--

TemplateMo 570 Chain App Dev

https://templatemo.com/tm-570-chain-app-dev

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(
        'css/templatemo-chain-app-dev.css'
    ); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/animated.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/owl.css'); ?>">

  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo"logo>
              <img src="<?php echo base_url(
                  'img/a.png'
              ); ?>" alt="Chain App Dev">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Beranda</a></li>
              <li class="scroll-to-section"><a href="#services">Layanan kami</a></li>
              <li class="scroll-to-section"><a href="#about">Tentang kami</a></li>
              <li class="scroll-to-section"><a href="#pricing">Harga</a></li>
              <li class="scroll-to-section"><a href="#newsletter">Kontak kami</a></li>
              <li><div class="gradient-button"><a href="<?php echo base_url('login') ?>"><i class="fa fa-sign-in-alt"></i> Login</a></div></li> 
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->
  
  

  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  <div class="col-lg-12">
                    <h2>Layanan Laundry Premium Satuan dan Kiloan <br>Zero complain</h2>
                    <p>Berpengalaman menangani item yang membutuhkan treatment khusus secara profesional dan menggunakan chemical yang ramah linkungan.</p>
                  </div>
                  <!-- <div class="col-lg-12">
                    <div class="white-button first-button scroll-to-section">
                      <a href="#contact">Free Quote <i class="fab fa-apple"></i></a>
                    </div> -->
                    <!-- <div class="white-button scroll-to-section">
                      <a href="#contact">Jemput Sekarang <i class="fab fa-google-play"></i></a> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="<?php echo base_url('img/slider-dec.png'); ?>" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="services" class="services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
            <h4>Mengapa memilih <em>Fresh, Fast &amp; Clean?</em></h4>
            <img src="<?php echo base_url(
                'img/heading-line-dec.png'
            ); ?>" alt="">
            <p>Jasa Penyedia layanan laundry premium, profesional dan terlengkap yang berada di berbagai kota. Layanan kami berbeda dengan laundry kiloan pada umumnya, dengan komitmen untuk memberikan pelayanan yang segar, cepat dan cermat, namun tetap rapi dan bersih. <!-- <a rel="nofollow" href="https://www.toocss.com/" target="_blank">TooCSS</a> Blog. If you need to have a contact form PHP script, go to <a href="https://templatemo.com/contact" target="_parent">our contact page</a> for more information.--></p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="service-item first-service">
            <div class="icon"></div>
            <h4>Premium Laundry</h4>
            <p>Tersedia layanan premium untuk item yang membutuhkan treatment mencuci yang khusus. Sehingga, anda akan mendapatkan hasil yang optimal.</p>
            <div class="text-button">
              <!-- <a href="#">Read More <i class="fa fa-arrow-right"></i></a> -->
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="service-item second-service">
            <div class="icon"></div>
            <h4>Chemical Berkualitas</h4>
            <p>Kami bangga menggunakan mesin standar industri dan memiliki formulasi chemical khusus untuk hasil yang terbaik dan ramah lingkungan.</p>
            <div class="text-button">
              <!-- <a href="#">Read More <i class="fa fa-arrow-right"></i></a> -->
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="service-item third-service">
            <div class="icon"></div>
            <h4>Harga Murah dan Kualitas Terjamin</h4>
            <p>Kami menggunakan mesin cuci dan pengering buat laundry dari Amerika sehingga layanan bisa cepat dan kualitas yang prima dan murah.</p><!-- <a rel="nofollow" href="https://paypal.me/templatemo" target="_blank">a little via PayPal</a>. Thank you.</p>
            <div class="text-button"> -->
              <!-- <a href="#">Read More <i class="fa fa-arrow-right"></i></a> -->
            </div>
          </div>
        </div>
        <!-- <div class="col-lg-4">
          <div class="service-item fourth-service">
            <div class="icon"></div>
            <h4>Cepat &amp; Tepat</h4>
            <p>Kami memiliki sumber daya yang profesional dan standar operasional laundry yang baik, sehingga kami dapat bekerja dengan cepat dan tepat.</p>
            <div class="text-button">
              <!-- <a href="#">Read More <i class="fa fa-arrow-right"></i></a> -->
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </div>

  <div id="about" class="about-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="section-heading">
            <h4>Tentang <em>Fresh, Fast and Clean </em></h4>
            <img src="<?php echo base_url(
                'img/Kapasitas-besar.jpg'
            ); ?>" alt="">
            <p>Fresh, Fast and Clean didirikan pada tanggal 20 Januari 2010 di Depok. Fresh, Fast and Clean adalah salah satu pelopor dalam industri laundry & dry cleaning di Indonesia. Kami mulai 12 tahun yang lalu dengan sebuah workshop kecil dan 1 outlet di Jakarta barat. Saat ini kami memiliki outlet yang tersebar di propinsi DKI Jakarta, Jawa Barat dan Banten, dan melayani ribuan pelanggan setia. Meskipun kapasitas dan layanan kami telah mengalami pertumbuhan yang luar biasa, kami tetap konsisten untuk tujuan utama kami sejak berdirinya, yang adalah untuk memberikan perawatan pakaian yang dapat diandalkan dan layanan pencucian dengan fokus pada kualitas.</p>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="box-item">
                <h4><a href="#">One Day Services</a></h4>
                <p>Cucian anda menumpuk perlu di cuci dengan cepat, kami menyediakan jasa cuci lipat dan setrika dalam sehari.</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="box-item">
                <h4><a href="#">24/7 Support &amp; Layanan</a></h4>
                <p>Tim kami siap stand by 24 jam untuk melayani anda, dengan menerima Layanan panggilan antar jemput gratis.</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="box-item">
                <h4><a href="#">Harga Murah & Kualitas Prima</a></h4>
                <p>Menggunakan mesin cuci dan pengering dari USA yang kelas premium sehingga hasilnya nya maksimal dengan waktu pencucian yang lebih singkat sehingga bisa menghemat biaya.</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="box-item">
                <h4><a href="#">Jaminan Uang Kembali</a></h4>
                <p>Kami memberikan jaminan uang kembali buat pelanggan yang tidak puas dengan pengerjaan kami atau bisa kami cuci ulang tanpa dikenakan biaya apapun.</p>
              </div>
            </div>
            <div class="col-lg-12">
              <p>10% Discount untuk 5 kg Pertama buat pelanggan baru.</p>
              <div class="gradient-button">
                <a href="#newsletter">Hubungi Kami</a>
              </div>
              <!-- <span>*No Credit Card Required</span> -->
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="right-image">
            <img src="<?php echo base_url(
                'img/about-right-dec.png'
            ); ?>" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="clients" class="the-clients">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading">
            <h4>Apa kata Pelanggan tentang <em>Fresh, fast and clean?</em></h4>
            <img src="<?php echo base_url(
                'img/heading-line-dec.png'
            ); ?>" alt="">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eismod tempor incididunt ut labore et dolore magna.</p>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="naccs">
            <div class="grid">
              <div class="row">
                <div class="col-lg-7 align-self-center">
                  <div class="menu">
                    <div class="first-thumb active">
                      <div class="thumb">
                        <div class="row">
                          <div class="col-lg-4 col-sm-4 col-12">
                            <h4>Isra Khairul</h4>
                            <span class="date">30 November 2021</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 d-none d-sm-block">
                            <span class="category">Karyawan Swasta</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 col-12">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <span class="rating">4.8</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <div class="row">
                          <div class="col-lg-4 col-sm-4 col-12">
                            <h4>Prisma Muharrom</h4>
                            <span class="date">29 November 2022</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 d-none d-sm-block">
                            <span class="category">Pengusaha</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 col-12">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <span class="rating">4.5</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <div class="row">
                          <div class="col-lg-4 col-sm-4 col-12">
                            <h4>Alvin Ramadhan</h4>
                            <span class="date">27 November 2022</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 d-none d-sm-block">
                            <span class="category">PNS</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 col-12">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <span class="rating">4.7</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <div class="row">
                          <div class="col-lg-4 col-sm-4 col-12">
                            <h4>Arvan Maulana</h4>
                            <span class="date">24 November 2022</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 d-none d-sm-block">
                            <span class="category">Pebisnis</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 col-12">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <span class="rating">3.9</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="last-thumb">
                      <div class="thumb">
                        <div class="row">
                          <div class="col-lg-4 col-sm-4 col-12">
                            <h4>Pendi Paelani</h4>
                            <span class="date">21 November 2022</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 d-none d-sm-block">
                            <span class="category">Influencer</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 col-12">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <span class="rating">4.3</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="last-thumb">
                      <div class="thumb">
                        <div class="row">
                          <div class="col-lg-4 col-sm-4 col-12">
                            <h4>Dirga Kusuma</h4>
                            <span class="date">22 November 2022</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 d-none d-sm-block">
                            <span class="category">Selebgram</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 col-12">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <span class="rating">4.3</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> 
                <div class="col-lg-5">
                  <ul class="nacc">
                    <li class="active">
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="client-content">
                                <img src="<?php echo base_url(
                                    'img/quote.png'
                                ); ?>" alt="">
                                <p>“Recommended banget buat kamu yang berlokasi di Depok dan sekitarnya, kalau mau laundry disini aja enak. Pelayanan ramah, asyik, proses cepat dan bisa diantar kerumah.”</p>
                              </div>
                              <div class="down-content">
                                <img src="<?php echo base_url(
                                    'img/client-image.jpg'
                                ); ?>" alt="">
                                <div class="right-content">
                                  <h4>Isra Khairul</h4>
                                  <span>Karyawan Swasta</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="client-content">
                                <img src="<?php echo base_url(
                                    'img/quote.png'
                                ); ?>" alt="">
                                <p>“Hasil laundry wangi, pakaian saya aman semua nggak ada yang rusak, apalagi hilang. Cocok kalau ngga ada waktu buat cuci pakaian. Thanks!”</p>
                              </div>
                              <div class="down-content">
                                <img src="<?php echo base_url(
                                    'img/client-image.jpg'
                                ); ?>" alt="">
                                <div class="right-content">
                                  <h4>Prisma M</h4>
                                  <span>Pengusaha</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="client-content">
                                <img src="<?php echo base_url(
                                    'img/quote.png'
                                ); ?>" alt="">
                                <p>“Kirain cuman ada cuci pakaian aja, ternyata layanannya lengkap banget bisa cuci sprei, selimut, bedcover sampe sepatu. Kamu harus langganan disini sekarang juga!”</p>
                              </div>
                              <div class="down-content">
                                <img src="<?php echo base_url(
                                    'img/client-image.jpg'
                                ); ?>" alt="">
                                <div class="right-content">
                                  <h4>Alvin Ramadhan</h4>
                                  <span>PNS</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="client-content">
                                <img src="<?php echo base_url(
                                    'img/quote.png'
                                ); ?>" alt="">
                                <p>“Lorem ipsum dolor sit amet, consectetur adpiscing elit, sed do eismod tempor idunte ut labore et dolore magna aliqua darwin kengan
                                  lorem ipsum dolor sit amet, consectetur picing elit massive big blasta.”</p>
                              </div>
                              <div class="down-content">
                                <img src="<?php echo base_url(
                                    'img/client-image.jpg'
                                ); ?>" alt="">
                                <div class="right-content">
                                  <h4>Random Staff</h4>
                                  <span>Manager, Digital Company</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="client-content">
                                <img src="<?php echo base_url(
                                    'img/quote.png'
                                ); ?>" alt="">
                                <p>“aaa, Lorem ipsum dolor sit amet, consectetur adpiscing elit, sed do eismod tempor idunte ut labore et dolore magna aliqua darwin kengan
                                  lorem ipsum dolor sit amet, consectetur picing elit massive big blasta.”</p>
                              </div>
                              <div class="down-content">
                                <img src="<?php echo base_url(
                                    'img/client-image.jpg'
                                ); ?>" alt="">
                                <div class="right-content">
                                  <h4>Mark Am</h4>
                                  <span>CTO, Amber Do Company</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="client-content">
                                <img src="<?php echo base_url(
                                    'img/quote.png'
                                ); ?>" alt="">
                                <p>“Mark, Lorem ipsum dolor sit amet, consectetur adpiscing elit, sed do eismod tempor idunte ut labore et dolore magna aliqua darwin kengan
                                  lorem ipsum dolor sit amet, consectetur picing elit massive big blasta.”</p>
                              </div>
                              <div class="down-content">
                                <img src="<?php echo base_url(
                                    'img/client-image.jpg'
                                ); ?>" alt="">
                                <div class="right-content">
                                  <h4>Mark Am</h4>
                                  <span>CTO, Amber Do Company</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>          
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="pricing" class="pricing-tables">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading">
            <h4>Paket terbaik. Laundry sekarang di <em>Fresh, fast & clean</em></h4>
            <img src="<?php echo base_url(
                'img/heading-line-dec.png'
            ); ?>" alt="">
            <p>Sesuaikan dengan kebutuhan Anda.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="pricing-item-regular">
            <span class="price">Self Service</span>
            <h4>Kami sediakan fasilitas</h4>
            <div class="icon">
              <img src="<?php echo base_url(
                  'img/pricing-table-01.png'
              ); ?>" alt="">
            </div>
            <ul>
              <li class="non-function">Kami jemput - antar</li>
              <li class="non-function">Kami bantu kerjakan</li>
              <li>Detergent</li>
              <li>Softener</li>
              <li>Perfume</li>
              <li>Setrika</li>
              <li>Packing</li>
            </ul>
            <div class="border-button">
              <a href="#newsletter">Rp. 39.500/6 Kilogram</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="pricing-item-pro">
            <span class="price">Pick and Drop</span>
            <h4>Kami jemput - Antarkan</h4>
            <div class="icon">
              <img src="<?php echo base_url(
                  'img/pricing-table-01.png'
              ); ?>" alt="">
            </div>
            <ul>
              <li>Kami jemput - antar</li>
              <li>Kami bantu kerjakan</li>
              <li>Detergent</li>
              <li>Softener</li>
              <li>Perfume</li>
              <li>Setrika</li>
              <li>Packing</li>
            </ul>
            <div class="border-button">
              <a href="#newsletter">Rp. 69.500/6 Kilogram</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="pricing-item-regular">
            <span class="price">Drop off Service</span>
            <h4>Kami Kerjakan - Packing</h4>
            <div class="icon">
              <img src="<?php echo base_url(
                  'img/pricing-table-01.png'
              ); ?>" alt="">
            </div>
            <ul>
              <li class="non-function">Kami jemput - antar</li>
              <li>Kami bantu kerjakan</li>
              <li>Detergent</li>
              <li>Softener</li>
              <li>Perfume</li>
              <li>Setrika</li>
              <li>Packing</li>
            </ul>
            <div class="border-button">
              <a href="#newsletter">Rp. 49.500/6 Kilogram</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 

  <footer id="newsletter">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading">
            <h4>Ingin jemput cucian apa hari ini? Silahkan isi pesan disini ya…</h4>
          </div>
        </div>
        <div class="col-lg-8 offset-lg-3">
          <form id="search" action="#" method="GET">
            <div class="row">
              <div class="col-lg-8 col-sm-8">
                <fieldset>
                  <input type="text" name="nama" class="nama" placeholder="Masukan nama..." autocomplete="on" required>
                  <input type="address" name="address" class="alamat" placeholder="Masukan alamat..." autocomplete="on" required>
                  <input type="number" name="number" class="nomor" placeholder="Masukan nomor WA..." autocomplete="on" 
                  required>
                  <input type="text" name="deskripsi" class="deskripsi" placeholder="Masukan pesan..." autocomplete="on" 
                  required>
                  <div class="col-lg-6 col-sm-6 mt-3">
                  <fieldset>
                    <button type="submit" class="main-button">Kirim <i class="fa fa-angle-right"></i></button>
                  </fieldset>
                </div>
              </div>
                <!-- <div class="col-lg-6 col-sm-6">
                  <fieldset>
                    <button type="submit" class="main-button position-absolute">Kirim <i class="fa fa-angle-right"></i></button>
                  </fieldset>
                </div> -->
             </div>
          </form>
      </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="footer-widget">
            <h4>Kontak kami</h4>
            <p>Alamat: Jl. Raya Margonda Kec. Pancoran, <br>Sukmajaya No.116 Kota Depok, Jawa barat</p>
            <p>021-1110-1011</p>
            <p>info@freshfastandclean.com</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="footer-widget">
            <h4>Tautan Penting</h4>
            <ul>
              <li><a href="#">Beranda</a></li>
              <li><a href="#services">Layanan Kami</a></li>
              <li><a href="#about">Tentang Kami</a></li>
            </ul>
            <ul>
              <li><a href="#clients">Testimoni</a></li>
              <li><a href="#pricing">Harga</a></li>
              <li><a href="#newsletter">Kontak kami</a></li>
              <!-- <li><a href="#pricing">Pricing</a></li> -->
            </ul>
          </div>
        </div>
        <!-- <div class="col-lg-3">
          <div class="footer-widget">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="#">Free Apps</a></li>
              <li><a href="#">App Engine</a></li>
              <li><a href="#">Programming</a></li>
              <li><a href="#">Development</a></li>
              <li><a href="#">App News</a></li>
            </ul>
            <ul>
              <li><a href="#">App Dev Team</a></li>
              <li><a href="#">Digital Web</a></li>
              <li><a href="#">Normal Apps</a></li>
            </ul>
          </div>
        </div> -->
        <div class="col-lg-4 mt-3">
          <div class="footer-widget">
            <h4>Fresh, Fast & Clean</h4>
            <!-- <div class="logo">
              <img src="<?php echo base_url('img/a.png'); ?>" alt="">
            </div> -->
            <p>Penyedia layanan laundry premium untuk eksklusif laundry dan laundry kiloan. Kami memiliki sumber daya profesional dan mesin standar industri untuk hasil yang optimal.</p>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="copyright-text">
            <p>Copyright © Fresh, Fast and clean. All Rights Reserved. 
          <!-- <br>Design: <a href="https://templatemo.com/" target="_blank" title="css templates">TemplateMo</a> --></p>
          </div>
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <script src="<?php echo base_url(
      'vendorr/jquery/jquery.min.js'
  ); ?>"></script>
  <script src="<?php echo base_url(
      'vendorr/bootstrap/js/bootstrap.bundle.min.js'
  ); ?>"></script>


  <script src="<?php echo base_url('js/owl-carousel.js'); ?>"></script>
  <script src="<?php echo base_url('js/animation.js'); ?>"></script>
  <script src="<?php echo base_url('js/imagesloaded.js'); ?>"></script>
  <script src="<?php echo base_url('js/popup.js'); ?>"></script>
  <script src="<?php echo base_url('js/custom.js'); ?>"></script>
</body>
</html>