<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>keto</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="{{asset('images/loading.gif')}}" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <x-header></x-header>

    <div class="our_room">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Our Room</h2>
                        <p>Lorem ipsum dolor</p>
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div id="serv_hover" class="room">
                        <div style="padding:20px" class="room_img">
                            <img style="height: 360px; width: 900px;  object-fit: cover;" src="{{ url('room/' . $room->gambar) }}" alt="#">
                        </div>
                        <div class="bed_room">
                            <h2>{{ $room->nama_kamar }}</h2>
                            <p style="padding: 12px">{{ Str::limit($room->deskripsi, 75) }} </p>
                            <h4 style="padding: 12px">Free Wifi : {{ $room->wifi }}</h4>
                            <h4 style="padding: 12px">Type Kamar : {{ $room->type_kamar }}</h4>
                            <h3 style="padding: 10px">Harga : {{ $room->harga }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h1 style="font-size: 40px!important;"> Booking Kamar </h1>
                    <div>
                        @if(@session()->has('message'))
                           <div class="alert alert-success">
                            <button type="button" class="close" data-bs-dismiss='alert'>x</button>
                            {{session()->get('message')}}
                        </div>
                        @endif
                    </div>
                    @if($errors)
                        @foreach ($errors->all() as $errors)
                            <li style="color: red">
                                {{$errors}}
                            </li>
                        @endforeach
                    @endif
                    <form action="{{url('add_booking',$room->id)}}" method="POST">
                        @csrf
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Nama lengkap</label>
                        <input type="text" name="nama" class="form-control"id="floatingInput" placeholder="Nama" @if(Auth::id())value="{{Auth::user()->name }}"@endif>
                    </div>
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Email</label>
                        <input type="email" name="email" class="form-control" id="floatingInput"
                            placeholder="name@example.com"  @if(Auth::id())value="{{Auth::user()->email }}"@endif>
                    </div>
                    <div class="form-floating mb-3">
                        <label for="floatingInput">No Telpon</label>
                        <input type="number" name="telpon" class="form-control" id="floatingInput"
                            placeholder="Masukan No Telp"  @if(Auth::id())value="{{Auth::user()->telpon }}"@endif>
                    </div>
                    <div>
                        <label for="floatingInput">Chek In</label>
                        <input type="date" name="starDate" class="form-control" id="startDate" >
                    </div>
                    <div>
                        <label for="floatingInput">Chek Out</label>
                        <input type="date" name="endDate" class="form-control" id="endDate">
                    </div>
                    <div style="width: 200px; padding: 20px;">
                        <input type="submit" class="btn btn-primary" value="Booking Kamar">
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <x-footer></x-footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script type="text/javascript">
        $(document).ready(function() {
            var dtToday = new Date();
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();
            var maxDate = year + '-' + month + '-' + day;
            $('#startDate').attr('min', maxDate);
            $('#endDate').attr('min', maxDate);
        });
    </script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
