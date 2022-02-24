@extends('layouts.app')

@section('main')
    <div class="widget-content widget-content-area br-6">
        {{-- <table id="html5-extension" class="multi-table table table-striped table-bordered table-hover non-hover"
            style="width:100%"> --}}
        <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>TANGGAL</th>
                    <th>KODE</th>
                    <th>DESKRIPSI</th>
                    <th>DOMPET</th>
                    <th>KATEGORI</th>
                    <th>NILAI</th>
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
                        <td>{{ $transaction->dompet }}</td>
                        <td>{{ $transaction->kategori }}</td>
                        <td>
                            <?= $transaction->status_id == '1' ? '(+)' : '(-)' ?>
                            {{ number_format($transaction->nilai) }}
                        </td>
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
