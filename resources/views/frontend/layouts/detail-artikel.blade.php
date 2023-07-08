@extends('frontend.layouts.front')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col mt-4">
            <div class="card mt-3">
                <div class="card-body mt-4">
                    <div class="div text-center">
                        <img src="{{ asset('uploads/' . $artikel->gambar_artikel) }}" class="img-fluid article-image">
                    </div>
                    <div class="detail-content mt-2 p-4">
                        <div class="detail-badge text-center">
                            <a href="#" class="badge badge-warning" style="background-color: brown">{{ $artikel->kategori->nama_kategori }}</a>
                            <a href="#" class="badge badge-primary" style="background-color: chocolate">{{ $artikel->users->name }}</a>
                        </div>
                        <h2 class="text-center">{{ $artikel->judul }}</h2>
                        <div class="detail-body text-justify">
                            @foreach (explode("\n", $artikel->body) as $paragraph)
                                <p class="">{{ $paragraph }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
    <style>
        .detail-body p {
            text-align: justify;
        }

        .comment-section {
            animation: fade-in 0.5s ease-in;
        }

        @keyframes fade-in {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .comment-header .user-info {
            display: flex;
            align-items: center;
        }

        .comment-header .user-info .admin-badge {
            margin-left: 5px;
            font-size: 0.8rem;
            background-color: red;
            color: white;
            padding: 2px 5px;
            border-radius: 4px;
        }

        .reply-button {
            cursor: pointer;
            color: white;
            background-color: blue;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
        }

        .comment-reply {
            display: none;
            margin-top: 10px;
        }

        .comment-reply textarea {
            resize: vertical;
        }

        .comment-reply .btn-primary {
            margin-top: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .btn-primary:focus,
        .btn-primary.focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
        }
        
        .article-image {
            width: 1190px;
            height: 600px;
            object-fit: cover;
        }
        hr {
            border: none; /* Menghapus garis bawaan */
            border-top: 3px solid black;/* Warna latar belakang */
            height: 0; 
            margin: 20px 0; 
        }

        
    </style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <h3>Comments</h3>
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">Leave a Comment</h5>
                    @if (Auth::guest())
                    <p class="text-center">Please <a href="{{ route('login') }}" class="text-primary fw-bold">login</a> to post a comment.</p>
                    @else
                        <form action="{{ route('comments.store') }}" method="POST" id="comment-form">
                            @csrf
                            <input type="hidden" name="artikel_id" value="{{ $artikel->id }}">
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <div class="mb-3">
                                <textarea class="form-control" name="content" rows="4" placeholder="Write your comment here..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Post Comment</button>
                        </form>
                    @endif
                </div>
            </div>
            <div class="comment-section w-75">
                @foreach($artikel->comments as $comment)
                <div class="card mb-10 mt-4">
                    <div class="card-body ">
                        <div class="comment-header">
                            <div class="user-info">
                                <h6 class="fw-bold text-primary mb-1">{{ $comment->user->name }}</h6>
                                @if($comment->user->role === 'admin')
                                    <span class="admin-badge">Admin</span>
                                @endif
                            </div>
                            <p class="text-muted small mb-0">{{ $comment->created_at->format('H:i, D, M') }}</p>
                        </div>
                        <div class="comment-content">
                            <p class="mt-3 mb-4 pb-2">{{ $comment->content }}</p>
                            <button class="reply-button" onclick="toggleReplyBox('{{ $comment->id }}')">Reply</button>
                        </div>
                        <div id="reply-box-{{ $comment->id }}" class="comment-reply">
                            @if (Auth::guest())
                            <p>Please <a href="{{ route('login') }}">login</a> to post a reply.</p>
                        @else
                            <form action="{{ route('comments.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="artikel_id" value="{{ $artikel->id }}">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                <div class="form-group">
                                    <textarea class="form-control" name="content" rows="4" placeholder="Write your reply here..." required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Post Reply</button>
                            </form>
                        @endif
                        
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>  
    </div>
</div>



    

    <script>
        function toggleReplyBox(commentId) {
            var replyBox = document.getElementById('reply-box-' + commentId);
            if (replyBox.style.display === 'none') {
                replyBox.style.display = 'block';
            } else {
                replyBox.style.display = 'none';
            }
        }
    </script>
@endsection
