@extends('layouts.app')

@section('main')
    <a href="{{ url('kategori') }}" class="btn btn-primary">Kelola kategori</a>
    <div class="widget-content widget-content-area br-6 p-3">
        <form action="{{ url("kategori/$category->id") }}" method="POST" class="mt-3">
            @csrf @method('PATCH')
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="namakategori">Nama*</label>
                    <input name="namakategori" type="text" class="form-control"
                        value="{{ old('namakategori', $category->nama) }}">
                    @error('namakategori')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" name="deskripsi"
                    rows="3">{{ old('deskripsi', $category->deskripsi) }}</textarea>
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
                        <option value="1" {{ $category->status_id == 1 ? 'selected' : '' }}>Aktif</option>
                        <option value="2" {{ $category->status_id == 2 ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
