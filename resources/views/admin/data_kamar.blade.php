
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('admin/vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="{{asset('admin/css/font.css')}}">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('admin/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('admin/img/favicon.ico')}}">

 <style>
    th {
        color: rgb(255, 255, 255);
    }
    .description-container {
        position: relative;
    }
    .description-summary {
        display: block;
    }
    .description-text {
        display: none;
        /* Sembunyikan teks lengkap secara default */
    }
    .read-more {
        display: block;
        color: rgb(205, 205, 216);
        cursor: pointer;
        text-decoration: underline;
    }
    .read-more.active {
        color: red;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var readMoreLinks = document.querySelectorAll('.read-more');

        readMoreLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                var container = this.parentElement;
                var text = container.querySelector('.description-text');
                var summary = container.querySelector('.description-summary');

                if (text.style.display === 'none') {
                    text.style.display = 'block';
                    summary.style.display = 'none';
                    this.textContent = 'Read Less';
                } else {
                    text.style.display = 'none';
                    summary.style.display = 'block';
                    this.textContent = 'Read More';
                }
            });
        });
    });
</script>

</head>
<body>
    <x-header2/>
    <x-sidebar/>
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama Kamar</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Wifi</th>
                            <th scope="col">Type Kamar</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $data)
                        <tr>
                            <td>{{$data->nama_kamar}}</td>
                            <td><div class="description-container">
                                <p class="description-text">{{$data->deskripsi}}</p>
                                <p class="description-summary">{{Str::limit($data->deskripsi,100)}}</p>
                                <a href="#" class="read-more">read More</a>
                            </td>
                            <td>{{$data->harga}}</td>
                            <td>{{$data->wifi}}</td>
                            <td>{{$data->type_kamar}}</td>
                            <td>
                                <img width="100" src="room/{{$data->gambar}}" alt="">
                            </td>
                            <td>
                                <a href="{{url('kamar_update',$data->id)}}" class="btn btn-outline-warning">update</a>
                            </td>
                            <td>
                                <a onclick="return confirm('Apakah Anda Ingin Menghapus Kamar')" class="btn btn-outline-danger" href="{{url('kamar_delete',$data->id) }}">Delete</a> </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <x-footer1/>
</body>

</html>
