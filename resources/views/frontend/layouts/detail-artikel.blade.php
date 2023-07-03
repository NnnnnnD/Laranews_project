@extends('frontend.layouts.front')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 mt-4">
                <div class="div">
                    <img src="{{asset('uploads/' . $artikel->gambar_artikel)}}" class="img-fluid">
                </div>
                <div class="detail-content mt-2 p-4">
                    <div class="detail-badge text-center">
                        <a href="" class="badge badge-warning" style="background-color: brown">{{$artikel->kategori->nama_kategori}}</a>
                        <a href="" class="badge badge-primary" style="background-color: chocolate">{{$artikel->users->name}}</a>
                    </div>
                    <h2 class="text-center">{{$artikel->judul}}</h2>
                    <div class="detail-body ">
                        <p>
                            {!! $artikel->body!!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
