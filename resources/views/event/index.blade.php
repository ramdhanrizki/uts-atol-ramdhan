@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List Event</div>
                <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        @if(is_array(session()->get('success')))
                        <ul>
                            @foreach (session()->get('success') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @else
                            {{ session()->get('success') }}
                        @endif
                    </div>
                @endif
                    <a href="{{url('event-tambah')}}" class="btn btn-primary btn-sm" style="margin-bottom:10px;">Tambah Event</a>
                    <table class="table table-bordered table-stripped ">
                        <tr>
                            <th>ID</th>
                            <th>Nama Event</th>
                            <th>Penyelenggara</th>
                            <th>Tanggal Event</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                        @foreach($events as $event)
                        <tr>
                            <td>{{$event->id}}</td>
                            <td>{{$event->nama_event}}</td>
                            <td>{{$event->penyelenggara}}</td>
                            <td>{{$event->tgl_event}}</td>
                            <td>{{$event->detail_event}}</td>
                            <td>
                                <a href="{{url('/event-update')}}/{{$event->id}}" class="btn btn-success btn-sm">Update</a>
                                <a href="{{url('/event-delete')}}/{{$event->id}}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
