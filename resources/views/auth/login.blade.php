<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    {{-- Bootstrap Css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/icons-1.7.2/font/bootstrap-icons.css') }}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300&family=Poppins:wght@200;300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    {{-- Datatable --}}

    <style>
        .btn-primary {
            background-color: #17A2B8 !important;
            border-color: white !important;
        }
    </style>
</head>

<body>

    <section class="vh-100" style="background-color: #17A2B8;">
        <div class="container py-2 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="{{ asset('assets/img/global/ezgif.com-gif-maker.webp') }}"
                                    alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height: 550px !important" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form method="POST" action="{{ route('login.auth') }}" class="card py-4 px-4">

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <img src="{{ asset('assets/img/global/logo.png') }}" style="width: 60px">
                                            <span class="h4 fw-bold mb-0">PT BIMA SCIENTIFIC ANDALAN</span>
                                        </div>

                                        @csrf
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        @if (Session::get('success'))
                                            <div class="alert alert-success w-100">
                                                {{ Session::get('success') }}
                                            </div>
                                        @endif

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your
                                            account</h5>

                                        <div class="form-outline mb-4">
                                            <input type="email" name="email" class="form-control form-control-lg" id="exampleFormControlInput1">
                                            <label class="form-label" for="form2Example17">Email address</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="form2Example27"
                                                class="form-control form-control-lg" name="password" />
                                            <label class="form-label" for="form2Example27">Password</label>
                                        </div>

                                        <div class="">
                                            <a class="btn btn-secondary text-decoration-none" href="/">Back</a>
                                            <button class="btn btn-primary" type="button">Login</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
