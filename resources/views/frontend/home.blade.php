@extends('frontend.layouts.front')
@section('content')
    <div class="row">
        @forelse ($artikel as $row)
        <div class="col-md-3 mt-5">
            <div class="card" style="width: 17rem;">
                <img src="{{asset('uploads/' . $row->gambar_artikel)}}" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">
                    <a href="{{route('detail-artikel', $row->slug)}}" style="text-decoration: none;">
                    {{$row->judul}}
                    </a>  
                </h5>
                </div>
                <div class="card-body">
                <a href="#" class="card-link">{{$row->users->name}}</a>
                <a href="#" class="card-link">{{$row->kategori->nama_kategori}}</a>
                </div>
            </div>
            </div>
        @empty
        @endforelse
    </div>
@endsection