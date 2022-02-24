@extends('layouts.app')

@section('main')
    <a href="{{ url('dompetmasuk') }}" class="btn btn-primary">Kelola Dompet Masuk</a>
    <div class="widget-content widget-content-area br-6 p-3">
        <form action="{{ url('dompetmasuk') }}" method="POST" class="mt-3">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="kode">Kode</label>
                    <input name="kode" type="hidden" class="form-control" value="{{ $kode }}">
                    <input name="" type="text" class="form-control" value="{{ $kode }}" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label for="tanggal">Tanggal</label>
                    <input name="tanggal" type="hidden" class="form-control" value="{{ $tglSekarang }}">
                    <input name="" type="text" class="form-control" value="{{ $tglSekarang }}" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label for="kategori">Kategori</label>
                    <select name="kategori" class="form-control">
                        @foreach ($categories as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="dompet">Dompet</label>
                    <select name="dompet" class="form-control">
                        @foreach ($wallets as $dompet)
                            <option value="{{ $dompet->id }}">{{ $dompet->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nilai">Nilai*</label>
                    <input class="form-control" name="nilai" type="number" min="1" value="{{ old('nilai') }}">
                    @error('nilai')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="deskripsi">Deskripsi*</label>
                    <textarea class="form-control" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                </div>
                @error('deskripsi')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
