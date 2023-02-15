<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/brand.png">
    <title>PT. Bima Scientific Andalan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

</head>

<body>

    <style>
        .slick-list {
            height: 280px;
        }

        .slick-track {
            height: 250px;
        }

        .slick-dots {
            top: 340px;
            text-align: start;
        }

        .slick-next {
            position: absolute;
            right: 20px;
        }

        .slick-dots li button:before {
            font-size: 12px;
            color: #74ddf2d9;
            opacity: 1;
        }

        .slick-dots li.slick-active button:before {
            color: #17a2b8;
        }

        .slider:not(:hover) .slick-dots {
            opacity: 0;
        }

        .slick-arrow,
        .slick-dots {
            transition: opacity 0.5s ease-out;
        }
    </style>

    <div class="image">
        <img src="{{ url('assets/img/global/scientist_banner.png') }}">
    </div>

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid">
            <img src="{{ url('assets/img/global/logo.png') }}" width="50px">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kami">Layanan Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#porto">Portofolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Masuk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="pages">
        <div class="container">

            <div class="content1" id="beranda">
                <div class="title">
                    <p>—BISA (Believe, Initiative, Satifactions, and Attitude)</p>
                </div>

                <div class="text">
                    <h1>Berkomitmen Menciptakan nilai ekonomi bagi pemangku kepentingan.</h1>
                    <p>BSA merupakan penyebutan perusahaan kami, Perusahaan kami berdiri sejak tahun 2020 di Bogor.
                        Bisnis
                        perusahaan kami adalah di bidang Jasa Laboratorium, konsultan dan perdagangan.</p>
                    <button class="button">Selengkapnya</button>
                </div>
            </div>

            <div class="content1-2">
                <hr style="width: 30px; border: 2px solid #17A2B8;">
                <p>Our client</p>
                <div class="multiple-items">
                    @foreach (DB::table('clients')->orderBy('id', 'asc')->get() as $item)
                        <div><img src="{{ url('assets/img/data/' . $item->image) }}"
                                style="margin: 10px 0 0 0; max-height: 40px; max-width: 120px"></div>
                    @endforeach
                </div>
            </div>

            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel-2"
                style="margin-left: 925px;margin-top: 240px;width: 493px;position: absolute;">
                <div class="carousel-inner">
                    @foreach (DB::table('services')->limit(4)->get() as $item)
                        <div class="carousel-item {{ $item->id == 1 ? "active" : "" }}">
                            <img src="{{ url('assets/img/data/' . $item->image) }}" class="d-block"
                                style="width: 493px; height: 595px; border-radius: 50px 0 0 50px">
                        </div>
                    @endforeach
                    {{-- <div class="carousel-item active">
                        <img src="{{ url('assets/img/global/halaman-fotoDepan2.png') }}" class="d-block"
                            style="width: 493px; height: 595px;">
                    </div> --}}
                </div>

                <div class="prevnext">
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="content2" id="kami">
                <div class="title">
                    <p>—CORE BUSSINES Bima Scientific Andalan</p>
                    <h1>Produk dan Layanan Kami</h1>
                </div>
                <div class="tab">
                    @foreach (DB::table('services')->limit(4)->get() as $item)
                        <button class="tablinks" onclick="openCity(event, '{{ $item->id }}')"
                            id="{{ $item->id == 1 ? 'defaultOpen' : '' }}">{{ $item->title }}</button>
                    @endforeach
                    {{-- <button class="tablinks" onclick="openCity(event, 'labs')" id="defaultOpen">B'LABS</button>
                    <button class="tablinks" onclick="openCity(event, 'tech')">B'TECH</button>
                    <button class="tablinks" onclick="openCity(event, 'cert')">B'CERT</button> --}}
                </div>
                <div class="contain-tabs">
                    @foreach (DB::table('services')->limit(4)->get() as $item)
                        <div id="{{ $item->id }}" class="tabcontent">
                            <p>{{ $item->desc }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="flexUl">
                    <div class="con">
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-globe-asia-australia" viewBox="0 0 16 16">
                                <path
                                    d="m10.495 6.92 1.278-.619a.483.483 0 0 0 .126-.782c-.252-.244-.682-.139-.932.107-.23.226-.513.373-.816.53l-.102.054c-.338.178-.264.626.1.736a.476.476 0 0 0 .346-.027ZM7.741 9.808V9.78a.413.413 0 1 1 .783.183l-.22.443a.602.602 0 0 1-.12.167l-.193.185a.36.36 0 1 1-.5-.516l.112-.108a.453.453 0 0 0 .138-.326ZM5.672 12.5l.482.233A.386.386 0 1 0 6.32 12h-.416a.702.702 0 0 1-.419-.139l-.277-.206a.302.302 0 1 0-.298.52l.761.325Z" />
                                <path
                                    d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0ZM1.612 10.867l.756-1.288a1 1 0 0 1 1.545-.225l1.074 1.005a.986.986 0 0 0 1.36-.011l.038-.037a.882.882 0 0 0 .26-.755c-.075-.548.37-1.033.92-1.099.728-.086 1.587-.324 1.728-.957.086-.386-.114-.83-.361-1.2-.207-.312 0-.8.374-.8.123 0 .24-.055.318-.15l.393-.474c.196-.237.491-.368.797-.403.554-.064 1.407-.277 1.583-.973.098-.391-.192-.634-.484-.88-.254-.212-.51-.426-.515-.741a6.998 6.998 0 0 1 3.425 7.692 1.015 1.015 0 0 0-.087-.063l-.316-.204a1 1 0 0 0-.977-.06l-.169.082a1 1 0 0 1-.741.051l-1.021-.329A1 1 0 0 0 11.205 9h-.165a1 1 0 0 0-.945.674l-.172.499a1 1 0 0 1-.404.514l-.802.518a1 1 0 0 0-.458.84v.455a1 1 0 0 0 1 1h.257a1 1 0 0 1 .542.16l.762.49a.998.998 0 0 0 .283.126 7.001 7.001 0 0 1-9.49-3.409Z" />
                            </svg>
                            Lab Kalibrasi
                        </p>
                        <ul>
                            <li>Kalibrasi Dan Sertifikasi Tangki</li>
                            <li>Kalibrasi Flow meter (Cair dan Gas)</li>
                            <li>Kalibrasi CHEMs (RCA, CGA & RATA)</li>
                            <li>Analizer Gas Analyzer dan Gas Detektor</li>
                            <li>Kalibrasi AQMS, Partikulat (BAM)</li>
                            <li>Kalibrasi suhu dan massa</li>
                            <li>Sound Level Meter, Dosis Kebisingan</li>
                            <li>Kalibrasi Getaran (WBA, HAV, dll)</li>
                            <li>Kalibrasi Medis Alat-Alat Rumah Sakit</li>
                        </ul>
                    </div>
                    <div class="con">
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-wind" viewBox="0 0 16 16">
                                <path
                                    d="M12.5 2A2.5 2.5 0 0 0 10 4.5a.5.5 0 0 1-1 0A3.5 3.5 0 1 1 12.5 8H.5a.5.5 0 0 1 0-1h12a2.5 2.5 0 0 0 0-5zm-7 1a1 1 0 0 0-1 1 .5.5 0 0 1-1 0 2 2 0 1 1 2 2h-5a.5.5 0 0 1 0-1h5a1 1 0 0 0 0-2zM0 9.5A.5.5 0 0 1 .5 9h10.042a3 3 0 1 1-3 3 .5.5 0 0 1 1 0 2 2 0 1 0 2-2H.5a.5.5 0 0 1-.5-.5z" />
                            </svg>
                            Lab Penguji Lingkungan
                        </p>
                        <ul>
                            <li>Pengujian Air</li>
                            <li>Pengujian Udara Ambient</li>
                            <li>Pengujian Emisi</li>
                            <li>Pengujian Tanah</li>
                            <li>Pengujian Kesehatan Kerja</li>
                            <li>Pengujian Limbah B3</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="portofolio" id="porto">
                <div class="title">
                    <p>—Portofolio</p>
                    <h1>Apa Yang Kami Kerjakan?</h1>
                </div>

                <div class="wrapper-portofolio">
                    @foreach (DB::table('portfolios')->limit(3)->get() as $item)
                        @if ($item->id % 2 != 0)
                            <div class="porto-content">
                                <div class="porto-img">
                                    <img src="{{ url('assets/img/data/' . $item->image) }}" alt="">
                                </div>

                                <div class="container">
                                    <div class="title-desc">
                                        <h1>{{ $item->title }}</h1>
                                        <h6>{{ $item->desc }}</h6>
                                    </div>

                                    <div class="client">
                                        <p>— Client</p>
                                        <img src="{{ url('assets/img/data/' . $item->client) }}"
                                            style="max-width: 300px; max-height: 60px">
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="porto-content">
                                <div class="porto-img-right">
                                    <img src="{{ url('assets/img/data/' . $item->image) }}" alt="">
                                </div>

                                <div class="container-left">
                                    <div class="title-desc">
                                        <h1>{{ $item->title }}</h1>
                                        <h6>{{ $item->desc }}</h6>
                                    </div>

                                    <div class="client">
                                        <p>— Client</p>
                                        <img src="{{ url('assets/img/data/' . $item->client) }}"
                                            style="max-width: 300px; max-height: 60px">
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <a href="" class="btn btn-outline-info">Lihat Semua</a>

            <div class="vision-mission" id="about">
                <div class="title">
                    <p>—Vision and Mission</p>
                    <h1>Visi Dan Misi</h1>
                </div>

                <div class="content d-flex ">
                    <img src="{{ url('assets/img/global/scientist.png') }}" alt="ilmuan">

                    <div class="desc d-flex flex-column mt-3">
                        @foreach (DB::table('vision_missions')->where('id', 1)->get() as $item)
                            <div class="box mx-3">
                                <h6 class="mb-3">0{{ $item->id }}</h6>
                                <h3 class="mb-3">{{ $item->title }}</h3>
                                <p>{{ $item->desc }}</p>
                            </div>
                        @endforeach

                        @foreach (DB::table('vision_missions')->where('id', 2)->get() as $item)
                            <div class="box mx-3">
                                <h6 class="mb-3">0{{ $item->id }}</h6>
                                <h3 class="mb-3">{{ $item->title }}</h3>
                                <p>{{ $item->desc }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="testimoni mt-5">
                <div class="title">
                    <p>—Testimonial</p>
                    <h1>Apa Kata Mereka</h1>
                </div>

                <div class="testimonial">
                    @foreach (DB::table('testimonis')->get() as $item)
                        <div class="card-testi">
                            <div class="content-card">
                                <div class="profile-picture d-flex">
                                    <img src="https://ui-avatars.com/api/?name={{ $item->title }}&background=17A2B8&color=fff"
                                        width="81" alt="">
                                    <div class="title-card mx-3">
                                        <h4>{{ $item->title }}</h4>
                                        <p>{{ $item->position }}</p>
                                    </div>
                                </div>
                                <p class="mt-4">{{ $item->desc }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>

    <footer>
        <div class="container">
            <div class="row footer-content">

                <div class="col-xxl-6 col-xl-6 col-md-5 col-sm-6 footer-item ">
                    <div class="footer-brand">
                        <img src="{{ url('assets/img/global/logo.png') }}" alt="">
                    </div>
                    <div class="footer-desc">
                        <p>{{ DB::table('contacts')->first()->address }}
                        </p>
                    </div>
                    <div class="footer-social d-flex flex-column">
                        <a href="mailto:{{ DB::table('contacts')->first()->email }}"><img
                                src="{{ url('assets/img/global/icon_inbox.png') }}" width="20">
                            {{ DB::table('contacts')->first()->email }}</a>
                        <a href=""><img src="{{ url('assets/img/global/icon_telp.png') }}" width="20">
                            {{ DB::table('contacts')->first()->no_telp }} (WA)</a>
                        <a href=""><img src="{{ url('assets/img/global/icon_web.png') }}" width="20">
                            {{ DB::table('contacts')->first()->web }}</a>
                    </div>
                </div>

                <div class="col-xxl-2 col-xl-2 col-md-3 col-sm-6 footer-item">
                    <h1>Company</h1>

                    <div class="menu">
                        <a href="">Beranda</a>
                        <a href="">Layanan Kami</a>
                        <a href="">Portofolio</a>
                        <a href="">Tentang Kami</a>
                        <a href="">Masuk</a>
                    </div>
                </div>

                <div class="col-xxl-2 col-xl-2 col-md-2 col-sm-6 footer-item">
                    <h1>Layanan</h1>

                    <div class="menu">
                        @foreach (DB::table('services')->limit(4)->get() as $item)
                            <a>{{ $item->title }}</a>
                        @endforeach
                    </div>
                </div>

                <div class="col-xxl-2 col-xl-2 col-md-2 col-sm-6 footer-item">
                    <h1>Portofolio</h1>

                    <div class="menu">
                        @foreach (DB::table('portfolios')->limit(3)->get() as $item)
                            <a>{{ $item->title }}</a>
                        @endforeach
                    </div>
                </div>

            </div>

            <hr>
            <p class="kopikanan">Copyright @ 2023 BiSA. All Right Reserved</p>
            <br>
        </div>
    </footer>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>

    <script>
        function openCity(evt, labName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(labName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();

        $(document).ready(function() {
            $('.multiple-items').slick({
                infinite: true,
                autoplay: true,
                autoplaySpeed: 2000,
                slidesToShow: 3,
                slidesToScroll: 1,
                arrows: false,
                responsive: [{
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 2.7,
                            slidesToScroll: 2,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2.3,
                            slidesToScroll: 2,
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 2.3,
                            slidesToScroll: 1,
                        }
                    }
                ]
            });
        });

        $(document).ready(function() {
            $('.testimonial').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                dots: true,
                autoplay: true,
                autoplaySpeed: 2500,
                responsive: [{
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    },

                ]
            });
        });
    </script>
</body>

</html>
