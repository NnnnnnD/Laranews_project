@extends('frontend.layouts.front')

@section('content')
<br><br>
<style>
    .card-img-top {
        width: 100%;
        height: 200px;
        
        object-fit: fill;
    }
</style>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <h3>{{ $kategori->nama_kategori }}:</h3>
                <div class="row">
                    @foreach ($artikel as $row)
                        <div class="col-md-4 mt-4">
                            <div class="card" style="width: 25rem; height:30rem;">
                                <img src="{{ asset('uploads/' . $row->gambar_artikel) }}" class="card-img-top mx-auto" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{{ route('detail-artikel', $row->slug) }}" style="text-decoration: none;">{{ $row->judul }}</a>
                                    </h5>
                                    <p class="card-text">
                                        {!! Str::limit($row->body, 200) !!}
                                        @if (strlen($row->body) > 200)
                                            <a href="{{ route('detail-artikel', $row->slug) }}">Read More</a>
                                        @endif
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-between">
                                        <small class="text-muted">Author: {{ $row->users->name }}</small>
                                        <small class="text-muted">Category: {{ $row->kategori->nama_kategori }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
