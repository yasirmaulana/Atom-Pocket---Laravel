@extends('layouts.app')

@section('main')
    <div class="widget-content widget-content-area br-6 p-3">
        <h5>TRANSAKSI</h5>
        <form action="{{ url('laporan') }}" method="POST" class="mt-3">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="tanggalawal">Tanggal Awal</label>
                    <input name="tanggalawal" type="date" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="tanggalakhir">Tanggal Akhir</label>
                    <input name="tanggalakhir" type="date" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label class="form-check-label">Status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="uangmasuk" id="uangmasuk" checked>
                        <label class="form-check-label" for="uangmasuk">Tampilkan Uang Masuk</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="uangkeluar" id="uangkeluar" checked>
                        <label class="form-check-label" for="uangkeluar">Tampilkan Uang keluar</label>
                    </div>

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="kategori">Kategori</label>
                    <select name="kategori" class="form-control">
                        <option value="0">Semua</option>
                        @foreach ($categories as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="dompet">Dompet</label>
                    <select name="dompet" class="form-control">
                        <option value="0">Semua</option>
                        @foreach ($wallets as $dompet)
                            <option value="{{ $dompet->id }}">{{ $dompet->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Buat Laporan</button>
            <button type="submit" class="btn btn-primary">Buat ke Excel</button>
        </form>
    </div>
@endsection
