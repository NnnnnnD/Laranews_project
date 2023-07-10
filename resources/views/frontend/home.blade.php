@extends('frontend.layouts.front')
@section('content')
@include('frontend.includes.slide')
<div class="container">
    <div class="row ">
        <div class="col-md-14 mt-3">
            <div class="card mb-lg-4 ">
                <div class="card-body">
                    <div class="row ">
                        @forelse ($artikel as $row)
                        <div class="col-md-4 mt-4 ">
                            <div class="card card-hover" style="width: 25rem; height:30rem;"> <!-- Tambahkan kelas "card-hover" untuk efek hover -->
                                <img src="{{asset('uploads/' . $row->gambar_artikel)}}" class="card-img-top mx-auto" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{{route('detail-artikel', $row->slug)}}" style="text-decoration: none;">
                                            {{$row->judul}}
                                        </a>
                                    </h5>
                                    <p class="card-text">
                                        {!! Str::limit($row->body, 200) !!}
                                        @if (strlen($row->body) > 200)
                                            <a href="{{route('detail-artikel', $row->slug)}}">Read More</a>
                                        @endif
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-between"> 
                                        <small class="text-muted">Author: {{$row->users->name}}</small>
                                        <small class="text-muted">Category: {{$row->kategori->nama_kategori}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<style>
    .card-img-top {
        width: 100%;
        height: 200px;
        
        object-fit: fill;
    }

    .card {
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.4s ease;
    }

    .card-hover:hover {
        transform: scale(1.05);

        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2); /* Ganti efek shadow saat hover */
       
    }

    .card-footer {
        padding-top: 0;
        padding-bottom: 0;
    }

    .card-footer small {
        font-size: 12px;
        color: #888;
    }
</style>
