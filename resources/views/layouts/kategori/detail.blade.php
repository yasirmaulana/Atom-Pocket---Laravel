@extends('layouts.app')

@section('main')
    <a href="{{ url('kategori') }}" class="btn btn-primary">Kelola Kategori</a>
    <div class="widget-content widget-content-area br-6 p-3">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nama">Nama*</label>
                <input name="namakategori" type="text" class="form-control" value="{{ $data->nama }}">
            </div>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" rows="3">{{ $data->deskripsi }}</textarea>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="status">Status</label>
                <input name="status" type="text" class="form-control" value="{{ $statuskategori }}">
            </div>
        </div>
    </div>
@endsection
