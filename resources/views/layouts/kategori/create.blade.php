@extends('layouts.app')

@section('main')
    <a href="{{ url('kategori') }}" class="btn btn-primary">Kelola Kategori</a>
    <div class="widget-content widget-content-area br-6 p-3">
        <form action="{{ url('kategori') }}" method="POST" class="mt-3">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="namakategori">Nama*</label>
                    <input name="namakategori" type="text" class="form-control" value="{{ old('namakategori') }}">
                    @error('namakategori')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <select name="status" class="form-control">
                        <option value="1" selected>Aktif</option>
                        <option value="2">Tidak Aktif</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
