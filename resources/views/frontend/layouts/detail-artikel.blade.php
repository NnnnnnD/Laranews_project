@extends('frontend.layouts.front')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 mt-5">
                <div class="div text-center">
                    <img src="{{ asset('uploads/' . $artikel->gambar_artikel) }}" class="img-fluid">
                </div>
                <div class="detail-content mt-2 p-4">
                    <div class="detail-badge text-center">
                        <a href="#" class="badge badge-warning" style="background-color: brown">{{ $artikel->kategori->nama_kategori }}</a>
                        <a href="#" class="badge badge-primary" style="background-color: chocolate">{{ $artikel->users->name }}</a>
                    </div>
                    <h2 class="text-center">{{ $artikel->judul }}</h2>
                    <div class="detail-body">
                        <p>
                            {!! $artikel->body !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <br><br><hr>
                <h3>Comments</h3>
                @foreach($artikel->comments as $comment)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h6 class="fw-bold text-primary mb-1">{{ $comment->user->name }}</h6>
                            <p class="text-muted small mb-0">{{ $comment->created_at->format('M Y') }}</p>
                            <p class="mt-3 mb-4 pb-2">{{ $comment->content }}</p>
                            <div class="comment-reply">
                                @if(session('comment') && session('comment')->id == $comment->id)
                                    @foreach(session('comment')->replies as $reply)
                                        <div class="card bg-light mb-3">
                                            <div class="card-body">
                                                <h6 class="fw-bold text-primary mb-1">{{ $reply->user->name }}</h6>
                                                <p class="text-muted small mb-0">{{ $reply->created_at->format('M Y') }}</p>
                                                <p class="mt-3 mb-4 pb-2">{{ $reply->content }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="card bg-light mt-3 reply-form" style="display: none;">
                                    <div class="card-body">
                                        <form action="{{ route('reply.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                            <div class="mb-3">
                                                <textarea class="form-control" name="content" rows="2" placeholder="Write your reply here..."></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit Reply</button>
                                        </form>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-link reply-link">Reply</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Rest of your code -->
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.reply-link').click(function(e) {
                e.preventDefault();
                $(this).closest('.card-body').find('.reply-form').toggle();
            });
        });
    </script>
@endpush
