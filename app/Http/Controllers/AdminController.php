<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class AdminController extends Controller


{
    public function index (){
        if(auth::id())
        {
            $usertype = Auth::user()->usertype;
            if($usertype == 'user')
            {
                return $this->home();
            }else if ($usertype == 'admin') {
                return view ('admin.index');
            }else {
                return redirect()->back();
            }
        }
    }
    public function home()
    {
        $room = Room::all();
        return view('home.index', compact('room'));
    }
    public function create_kamar(){
        return view('admin.create_kamar');
    }

    public function tambah_kamar(Request $request){

        $data = new Room;
        $data -> nama_kamar = $request->kamar;
        $data -> deskripsi = $request->desk;
        $data -> harga = $request->harga;
        $data -> wifi = $request->wifi;
        $data -> type_kamar = $request->type;
        $gambar = $request -> gambar;
        if($gambar)
        {
            $gambarnama=time().'.'.$gambar->getClientOriginalExtension();
            $request->gambar->move('room',$gambarnama);
            $data -> gambar = $gambarnama;
        }
        $data->save();

        return redirect()->back()->with('succes','kamar Berhasil ditambahkan');
    }

    public function data_kamar(){
        $data = Room::all();

        return view('admin.data_kamar',compact('data'));
    }

    public function kamar_update($id){
        $data = Room::find($id);

        return view('admin.kamar_update',compact('data'));
    }

    public function edit_kamar(Request $request,$id){

        $data = Room::find($id);


        $data -> nama_kamar = $request->kamar;
        $data -> deskripsi = $request->desk;
        $data -> harga = $request->harga;
        $data -> wifi = $request->wifi;
        $data -> type_kamar = $request->type;
        $gambar = $request -> gambar;
        if($gambar)
        {
            $gambarnama=time().'.'.$gambar->getClientOriginalExtension();
            $request->gambar->move('room',$gambarnama);
            $data -> gambar = $gambarnama;
        }
        $data->save();

        return redirect('data_kamar')->with('succes','kamar Berhasil diupdate');
    }

    public function kamar_delete($id){
        $data = Room::find($id);
        $data->delete();

        return redirect()->back()->with('succes','kamar berhasil di hapus');
    }
public function showBookings()
    {
        $bookings = Booking::with('room')->get();
        return view('admin.booking_kamar', compact('bookings'));
    }

    // Menampilkan halaman update booking
    public function updateBooking($id)
    {
        $booking = Booking::with('room')->findOrFail($id);
        return view('admin.booking_update', compact('booking'));
    }

    // Mengupdate status booking (Accept/Reject)
    public function updateBookingStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();

        return redirect('/booking_kamar')->with('success', 'Status booking berhasil diperbarui');
    }

    // Menghapus booking
    public function deleteBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->back()->with('success', 'Booking berhasil dihapus');
    }
}
