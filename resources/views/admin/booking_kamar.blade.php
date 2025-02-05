<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Booking List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/style.default.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">
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
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Kamar</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->nama }}</td>
                            <td>{{ $booking->email }}</td>
                            <td>{{ $booking->telpon }}</td>
                            <td>{{ $booking->room ? $booking->room->nama_kamar : 'Kamar tidak ditemukan' }}</td>
                            <td>{{ $booking->star_date }}</td>
                            <td>{{ $booking->end_date }}</td>
                            <td>
                                <span class="badge {{ $booking->status == 'approved' ? 'bg-success' : ($booking->status == 'rejected' ? 'bg-danger' : 'bg-warning') }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ url('booking_update', $booking->id) }}" class="btn btn-outline-warning">Update</a>
                                <a onclick="return confirm('Apakah Anda yakin ingin menghapus booking ini?')" class="btn btn-outline-danger" href="{{ url('booking_delete', $booking->id) }}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
  <X-footer1/>
</body>

</html>
