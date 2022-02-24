@extends('layouts.app')

@section('main')
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <a href="{{ url('dompetkeluar/create') }}" type="button" class="btn btn-primary">Buat Baru</a>
    </div>
    <div class="widget-content widget-content-area br-6">
        <table class="multi-table table table-striped table-bordered table-hover non-hover" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>TANGGAL</th>
                    <th>KODE</th>
                    <th>DESKRIPSI</th>
                    <th>KATEGORI</th>
                    <th>NILAI</th>
                    <th>DOMPET</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($data as $transaction)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $transaction->tanggal }}</td>
                        <td>{{ $transaction->kode }}</td>
                        <td>{{ $transaction->deskripsi }}</td>
                        <td>{{ $transaction->kategori }}</td>
                        <td>(-){{ number_format($transaction->nilai) }}</td>
                        <td>{{ $transaction->dompet }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>TANGGAL</th>
                    <th>KODE</th>
                    <th>DESKRIPSI</th>
                    <th>KATEGORI</th>
                    <th>NILAI</th>
                    <th>DOMPET</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
