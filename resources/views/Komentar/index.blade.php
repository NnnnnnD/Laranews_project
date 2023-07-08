@extends('layouts.default')
@section('content')
<div class="panel-header bg-primary-subtle">
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
						<div class="card-title">Data Komentar</div>
					</div>
				</div>
				<div class="card-body">
                    @if (Session::has('success'))
                        <div class ="alert alert-primary">
                            {{Session('success')}}
                        </div>
                    @endif
					<div class="table-responsive">
                        <table class="table table bordered ">
                            <thead class="table-active">
                                <tr>
                                    <th>id</th>
                                    <th>Artikel</th>
                                    <th>username</th>
                                    <th>Komentar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($komentar as $row)
                                <tr>
                                    <td>{{ $row->id}}</td>
                                    <td>{{ $row->artikel->judul}}</td>
                                    <td>{{ $row->user->name}}</td>
                                    <td>{{ $row->content}}</td>
                                    <td>
                                        <form action="{{ route('komentar.destroy', $row->id)}}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-link btn-danger btn-sm">
                                                <i class="far fa-trash-alt fa-3x"></i>                                    
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Data Masih Kosong</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection