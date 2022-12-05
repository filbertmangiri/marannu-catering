<x-app-layout title="Beranda" home>
  @push('styles')
    <style type="text/css">
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <style type="text/css">
      /* GLOBAL STYLES */
      /* Padding below the footer and lighter body text */

      body {
        padding-top: 3rem;
        padding-bottom: 3rem;
        color: #5a5a5a;
      }


      /* CUSTOMIZE THE CAROUSEL */

      /* Carousel base class */
      .carousel {
        margin-bottom: 4rem;
      }

      /* Since positioning the image, we need to help out the caption */
      .carousel-caption {
        bottom: 3rem;
        z-index: 10;
      }

      /* Declare heights because of positioning of img element */
      .carousel-item {
        height: 32rem;

        background: no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
      }

      .carousel-item>img {
        position: absolute;
        top: 0;
        left: 0;
        min-width: 100%;
        height: 32rem;
      }

      .carousel-card {
        background-color: rgba(0, 0, 0, 0.793) !important;
      }


      /* MARKETING CONTENT */

      /* Center align the text within the three columns below the carousel */
      .marketing .col-lg-4 {
        margin-bottom: 1.5rem;
        text-align: center;
      }

      .marketing h2 {
        font-weight: 400;
      }

      /* rtl:begin:ignore */
      .marketing .col-lg-4 p {
        margin-right: .75rem;
        margin-left: .75rem;
      }

      /* rtl:end:ignore */


      /* Featurettes */

      .featurette-divider {
        margin: 5rem 0;
        /* Space out the Bootstrap <hr> more */
      }

      /* Thin out the marketing headings */
      .featurette-heading {
        font-weight: 300;
        line-height: 1;
        /* rtl:remove */
        letter-spacing: -.05rem;
      }


      /* RESPONSIVE CSS */

      @media (min-width: 40em) {

        /* Bump up size of carousel content */
        .carousel-caption p {
          margin-bottom: 1.25rem;
          font-size: 1.25rem;
          line-height: 1.4;
        }

        .featurette-heading {
          font-size: 50px;
        }
      }

      @media (min-width: 62em) {
        .featurette-heading {
          margin-top: 7rem;
        }
      }
    </style>
  @endpush

  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
      <div class="carousel-item active" style="background-image: url({{ asset('assets/img/pages/home/carousel/1.webp') }})">
        <div class="container">
          <div class="carousel-caption text-start carousel-card rounded-4 shadow p-5">
            <h1>Selamat Datang</h1>
            <p><b>Marannu Catering</b> adalah... Lanjut part 2 <i class="bi bi-arrow-right"></i></p>
          </div>
        </div>
      </div>

      <div class="carousel-item" style="background-image: url({{ asset('assets/img/pages/home/carousel/2.webp') }})">
        <div class="container">
          <div class="carousel-caption carousel-card rounded-4 shadow p-5">
            <h1>Duh..</h1>
            <p>Malu, pake gambar dari google semua. Oke, jadi <b>Marannu Catering</b> itu adalah... Lanjut part 3 <i class="bi bi-arrow-right"></i></p>
          </div>
        </div>
      </div>

      <div class="carousel-item" style="background-image: url({{ asset('assets/img/pages/home/carousel/3.jpeg') }})">
        <div class="container">
          <div class="carousel-caption text-end carousel-card rounded-4 shadow p-5">
            <h1>Bingung mau nulis apa euy</h1>
            <p>Mending kamu langsung cari informasinya di bawah ini. Scroll yuk <i class="bi bi-arrow-down"></i></p>
          </div>
        </div>
      </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">
    <h1 class="mb-5 text-center">
      <i class="bi bi-dash-lg"></i>
      Pejabat Tapi Jujur
      <i class="bi bi-dash-lg"></i>
    </h1>

    <!-- Three columns of text below the carousel -->
    <div class="row justify-content-center">
      <div class="col-12 col-sm-6 col-md-5 col-lg-4">
        <img src="{{ asset('assets/img/pages/home/person/frans-mangiri.jpg') }}" class="bd-placeholder-img rounded-circle" width="140" height="140" alt="Fabiola Mangiri">
        <h2 class="mt-3">Frans Mangiri</h2>
        <p>Bapak pencetus ide pertama buka usaha catering.</p>
      </div>
      <div class="col-12 col-sm-6 col-md-5 col-lg-4">
        <img src="{{ asset('assets/img/pages/home/person/yosepina-marannu-k.jpg') }}" class="bd-placeholder-img rounded-circle" width="140" height="140" alt="Fabiola Mangiri">
        <h2 class="mt-3">Yosepina Marannu K.</h2>
        <p>Beliau merupakan CEO, direktur, komisaris, manager keuangan, sekaligus koki juga, semuanya lah pokoknya.</p>
      </div>
      <div class="col-12 col-sm-6 col-md-5 col-lg-4">
        <img src="{{ asset('assets/img/pages/home/person/fabiola-mangiri.jpg') }}" class="bd-placeholder-img rounded-circle" width="140" height="140" alt="Fabiola Mangiri">
        <h2 class="mt-3">Fabiola Mangiri</h2>
        <p>Si penerus usaha catering biar orang tetep bisa makan enak.</p>
      </div>
    </div>


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <h1 class="mb-5 text-center">
      <i class="bi bi-dash-lg"></i>
      Kamu nanya, ada apa aja?
      <i class="bi bi-dash-lg"></i>
    </h1>

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Tumpengan? <span class="text-muted">Bisa.</span></h2>
        <p class="lead">Nasi kuning dengan berbagai macam lauk di pinggir. Nikmat mana yang kau dustakan?</p>
      </div>
      <div class="col-md-5">
        <img src="{{ asset('assets/img/pages/home/card/nasi-tumpeng-besar.jpg') }}" alt="Nasi Tumpeng Besar" width="500" height="500" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid rounded-4 shadow mx-auto">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Mau yang mini? <span class="text-muted">Juga bisa.</span></h2>
        <p class="lead">Buat kamu yang pengen tumpengan tapi jijik berbagi tumpeng dengan yang lain hehe.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="{{ asset('assets/img/pages/home/card/nasi-tumpeng-kecil.jpg') }}" alt="Nasi Tumpeng Kecil" width="500" height="500" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid rounded-4 shadow mx-auto">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Lunch? Dinner? SETIAP HARI?! <br><span class="text-muted">Bisa.</span></h2>
        <p class="lead">Murah dan bergizi, dianterin sampe depan kamar kosan kamu.</p>
      </div>
      <div class="col-md-5">
        <img src="{{ asset('assets/img/pages/home/card/nasi-bento.jpg') }}" alt="Nasi Bento" width="500" height="500" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid rounded-4 shadow mx-auto">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">"Rumah gue arisan, apa yang enak?"</h2>
        <p class="lead">Yang enak? Ya cuma <span class="fw-bold">pastel</span>, ehh nama yang bener <span class="fw-bold">panada</span>.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="{{ asset('assets/img/pages/home/card/kue-pastel.jpg') }}" alt="Kue Pastel" width="500" height="500" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid rounded-4 shadow mx-auto">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="text-center">
      <h2>Prasmanan, kondangan, catering pabrik, dan masih banyak lagi.</h2>
      <br>
      <h3>Jadi, kamu udah tau mau pesen apa? Kalo mau nanya di chat <a href="https://wa.me/6282114225746" target="_blank" class="btn btn-success"><i class="bi bi-whatsapp"></i> WhatsApp</a> aja.</h3>
      <h3>Boleh DM <a href="https://www.instagram.com/marannu.catering/" target="_blank" class="btn text-light" style="background-color: rgb(212, 0, 131)"><i class="bi bi-instagram me-1"></i> @marannu.catering</a> dulu aja kalo masih malu</h3>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


  <!-- FOOTER -->
  <div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4">
      <div class="col-md-4 d-flex align-items-center">
        <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
          <svg class="bi" width="30" height="24">
            <use xlink:href="#bootstrap" />
          </svg>
        </a>
        <span class="mb-3 mb-md-0 text-muted">&copy; 2022 Marannu Catering</span>
      </div>

      <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
        <li class="ms-5">
          <a class="text-muted" href="https://wa.me/6282114225746" target="_blank">
            <i class="bi bi-whatsapp" style="font-size: 24px"></i>
          </a>
        </li>
        <li class="ms-5">
          <a class="text-muted" href="https://www.instagram.com/marannu.catering/" target="_blank">
            <i class="bi bi-instagram" style="font-size: 24px"></i>
          </a>
        </li>
      </ul>
    </footer>
  </div>
</x-app-layout>
