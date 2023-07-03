@extends('frontend.layouts.front')
@section('content')
@include('frontend.includes.slide');
<div class="row">
    @forelse ($artikel as $row)
    <div class="col-md-3 mt-5">
        <div class="card" style="width: 17rem;">
            <img src="{{asset('uploads/' . $row->gambar_artikel)}}" class="card-img-top mx-auto" alt="...">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="{{route('detail-artikel', $row->slug)}}" style="text-decoration: none;">
                        {{$row->judul}}
                    </a>
                    <p class="card-text">
                        {!! Str::limit($row->body, 100) !!}
                        @if (strlen($row->body) > 100)
                            <a href="{{route('detail-artikel', $row->slug)}}">Read More</a>
                        @endif
                    </p>
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
