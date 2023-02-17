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
                </ul>
            </div>
        </div>
    </nav>

    <div class="pages">
        <div class="container">

            <div class="portofolio" id="porto" style="margin-top: 0 !important">
                <div class="title">
                    <p>—Portofolio</p>
                    <h1>Apa Yang Kami Kerjakan?</h1>
                </div>

                <div class="wrapper-portofolio">
                    @foreach (DB::table('portfolios')->get() as $item)
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

</body>

</html>
