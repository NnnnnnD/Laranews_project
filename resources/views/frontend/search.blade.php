@extends('frontend.layouts.front')
@section('content')
<style>
    .card-img-top {
        width: 100%;
        height: 200px;
        
        object-fit: fill;
    }
</style>
<div class="container">
    <h3>Search Results for "{{ $keyword }}"</h3>
    @if ($artikel->count() > 0)
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
    @else
        <p>No articles found.</p>
    @endif
</div>
<br><br>
@endsection
