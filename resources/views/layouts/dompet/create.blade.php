@extends('layouts.app')

@section('main')
    <a href="{{ url('dompet') }}" class="btn btn-primary">Kelola Dompet</a>
    <div class="widget-content widget-content-area br-6 p-3">
        <form action="{{ url('dompet') }}" method="POST" class="mt-3">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nama">Nama*</label>
                    <input name="namadompet" type="text" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="referensi">Referensi</label>
                    <input name="referensi" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" rows="3"></textarea>
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
