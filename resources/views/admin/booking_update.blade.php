<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Update Booking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/style.default.css') }}">
</head>

<body>
    <x-header2/>
    <x-sidebar/>

    <div class="page-content">
        <div class="container">
            <div class="card mt-4">
                <div class="card-header">
                    <h3>Update Booking</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Nama Pemesan</th>
                            <td>{{ $booking->nama }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $booking->email }}</td>
                        </tr>
                        <tr>
                            <th>Telepon</th>
                            <td>{{ $booking->telpon }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Check-in</th>
                            <td>{{ $booking->star_date }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Check-out</th>
                            <td>{{ $booking->end_date}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <span class="badge badge-{{ $booking->status == 'approved' ? 'success' : ($booking->status == 'rejected' ? 'danger' : 'warning') }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                        </tr>
                    </table>

                    <h4 class="mt-4">Detail Kamar</h4>
                    <table class="table">
                        <tr>
                            <th>Nama Kamar</th>
                            <td>{{ $booking->room->nama_kamar }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>{{ $booking->room->deskripsi }}</td>
                        </tr>
                        <tr>
                            <th>Harga</th>
                            <td>Rp. {{ number_format($booking->room->harga, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Wifi</th>
                            <td>{{ ucfirst($booking->room->wifi) }}</td>
                        </tr>
                        <tr>
                            <th>Tipe Kamar</th>
                            <td>{{ $booking->room->type_kamar }}</td>
                        </tr>
                        <tr>
                            <th>Gambar</th>
                            <td><img src="/room/{{ $booking->room->gambar }}" alt="Gambar Kamar" width="150"></td>
                        </tr>
                    </table>

                    <form action="{{ url('update_booking', $booking->id) }}" method="POST">
                        @csrf
                        <div class="mt-3">
                            <button type="submit" name="status" value="approved" class="btn btn-success">Accept</button>
                            <button type="submit" name="status" value="rejected" class="btn btn-danger">Reject</button>
                            <button type="submit" name="status" value="complite" class="btn btn-warning">complite</button>
                            <a href="{{ url('/booking_kamar') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <x-footer1/>
</body>

</html>
