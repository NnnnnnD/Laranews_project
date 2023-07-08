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
                        <div class="card-title">Data Kategori</div>
                        <a href="{{route('kategori.create')}}" class="btn btn-primary btn-sm ml-auto"><i
                                class="fas fa-plus"></i>Tambah Kategori</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (Session::has('success'))
                    <div class="alert alert-primary">
                        {{Session('success')}}
                    </div>

                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-active">
                                <tr>
                                    <th>id</th>
                                    <th>Nama Kategori</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kategori as $row)
                                <tr>
                                    <td>{{ $row->id}}</td>
                                    <td>{{ $row->nama_kategori}}</td>
                                    <td>{{ $row->slug}}</td>
                                    <td>
                                        <a href="{{ route('kategori.edit', $row->id) }}"
                                            class="btn btn-danger btn-sm"><i class="fas fa-pencil-alt fa-2x"></i></a>

                                        <form action="{{ route('kategori.destroy', $row->id)}}" method="post"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-link btn-danger btn-md"><i
                                                    class="far fa-trash-alt fa-2x"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td>Data Masih Kosong</td>
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
