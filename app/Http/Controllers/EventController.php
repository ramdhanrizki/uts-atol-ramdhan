<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function add(Request $request)
    {
        return view('event.add');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_event' => 'required',
            'tanggal' => 'required|date',
            'keterangan' => 'required',
            'penyelenggara' => 'required'
        ]);
        $event = new Event;
        $event->user_id = 1;
        $event->nama_event = $request->get('nama_event');
        $event->penyelenggara = $request->get('penyelenggara');
        $event->tgl_event = $request->get('tanggal');
        $event->detail_event = $request->get('keterangan');
        $event->save();
        return redirect('/event')->withSuccess(['Berhasil menambahkan data!']);
    }

    public function index(Request $request)
    {
        $events = Event::orderBy('created_at','desc')->get();
        return view('event.index')->with('events',$events);
    }

    public function update(Request $request, $id)
    {
        $event = Event::where('id',$id)->first();
        return view('event.update')->with('event',$event);
    }

    public function storeUpdate(Request $request, $id)
    {
        $event = Event::where('id',$id)->first();
        $validate = $request->validate([
            'nama_event' => 'required',
            'tanggal' => 'required|date',
            'keterangan' => 'required',
            'penyelenggara' => 'required'
        ]);
        $event->user_id = 1;
        $event->nama_event = $request->get('nama_event');
        $event->penyelenggara = $request->get('penyelenggara');
        $event->tgl_event = $request->get('tanggal');
        $event->detail_event = $request->get('keterangan');
        $event->update();
        return redirect('/event')->withSuccess('Berhasil mengubah data');
    }

    public function delete(Request $request, $id)
    {
        $event = Event::where('id',$id)->first();
        $event->delete();
        return redirect('/event')->withSuccess('Berhasil menghapus data');
    }
}
