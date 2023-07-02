@extends('layouts.default')

@section('content')
<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			
		</div>
	</div>
</div>

<div class="page-inner mt--5">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Edit Slide Banner{{$slides->judul_slide}}</div>
                        <a href="{{route('slides.index')}}" class = "btn btn-warning btn-sm ml-auto">Back</a>
					</div>
				</div>
				<div class="card-body">
                    <form method="post" action="{{ route('slides.update', $slides->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="judul">Judul Slide</label>
                            <input type="text" name="judul" class="form-control" id="text"
                            value="{{$slides->judul_slide}}">
                        </div>
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" name="link" class="form-control" id="text"
                            value="{{$slides->link}}">
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar Saat Ini</label><br>
                            <img src="{{ asset('uploads/' . $slides->gambar_slide) }}" width="100"> <br><br>
                            <label for="gambar">Ubah Gambar Slide</label>
                            <input type="file" name="gambar_slide" class="form-control">
                            <br>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select  name="is_active" class="form-control">
                                <option value="1"{{$slides->status == '1' ? 'selected' : ''}}>Active</option>
                                <option value="0"{{$slides->status == '0' ? 'selected' : ''}}>Draft</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                            <button class="btn btn-danger btn-sm" type="reset">Reset</button>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection