<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
      <!-- Sidebar Header-->
      <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{asset('admin/img/ca.jpeg')}}" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
          <h1 class="h5">Ultraman Zero</h1>
          <p>Pahlawan Galaxy</p>
        </div>
      </div>
      <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
      <ul class="list-unstyled">
              <li class="active"><a href="/home"> <i class="icon-home"></i>Dashboard </a></li>
              <li class="active"><a href="/"> <i class="icon-home"></i>Home </a></li>
              <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Example dropdown </a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                  <li><a href="{{ url('create_kamar')}}">tambah Kamar</a></li>
                  <li><a href="{{url('data_kamar') }}">daftar Kamar</a></li>
                  <li><a href="{{url('booking_kamar') }}">Booking</a></li>
                </ul>
              </li>
    </nav>
