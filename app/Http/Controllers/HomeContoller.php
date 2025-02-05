<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;

class HomeContoller extends Controller
{
    public function room_detail($id){
        $room = Room::find($id);

        return view('home.detail_kamar',compact('room'));
    }
    public function add_booking(Request $request, $id){
        $request->validate([
            'starDate' => 'required|date',
            'endDate' => 'date|after:date:starDate',
        ],[
            'starDate.required' => 'Tanggal mulai harus diisi.',
            'starDate.required' => 'Tanggal mulai harus berupa tanggal yang valid. ',
            'endDate.required' => 'Tanggal akhir harus berupa tanggal yang valid. ',
            'endDate.required' => 'Tanggal akhir harus setelah tanggal mulai. ',
        ]);

        $data = new Booking;
        $data->room_id = $id;
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->telpon = $request->telpon;

        $starDate = $request->starDate;
        $endDate = $request->endDate;
        $isBooked = Booking::where('room_id',$id)->where('star_date','<=', $endDate)->where('end_date','>=',$starDate)->exists();
        if($isBooked)
        {
            return redirect()->back()->with('message', 'Kamar sudah dibooking di tanggal tersebut.');
        }else{
            $data->star_date = $request->starDate;
            $data->end_date = $request->endDate;
            $data->save();
            return redirect()->back()->with('message','Kamar Berhasil di Pesan');
        }
    }

}
