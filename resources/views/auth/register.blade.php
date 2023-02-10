<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register</title>
   {{-- Bootstrap Css --}}
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
   integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/icons-1.7.2/font/bootstrap-icons.css') }}">

{{-- Fonts --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300&family=Poppins:wght@200;300;400;500;600;700&display=swap">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
{{-- Datatable --}}
</head>
<body>
  <div class="content-sign px-3" >
    <div class="d-flex flex row ">
    <div class="col-6  d-flex justify-content-center col-lg-6 mt-2 pt-2 ">
        <img src="{{asset('assets/img/3180758.jpg')}}" alt="" class="w-100">
    </div>
    <div class="col-6 col-md-12 col-lg-5 col-xl-6 mt-5 pt-2">
        <form method="POST" action="{{route('register.post')}}" class="card py-4 px-4">
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
            <div class="text-center logo ml-3">
                <i class="fas fa-user-plus"></i>
            </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Input Name">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Input Email">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">No Telepon</label>
                <input type="number" name="no_telp" class="form-control" id="exampleFormControlInput1" placeholder="Input Number">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Input Password">
              </div>
                <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Submit</button>
         
        </form>
    </div>
   
    </div>
</div>

</body>
</html>
