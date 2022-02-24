@extends('layouts.app')

@section('main')
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <a href="{{ url('dompet/create') }}" type="button" class="btn btn-primary">Buat Baru</a>
        <a href="{{ url('dompet') }}" type="button" class="btn btn-secondary">Semua ({{ $jmlDompet }})</a>
        <a href="{{ url('dompet?status=1') }}" type="button" class="btn btn-secondary">Aktif ({{ $jmlDompetAktif }})</a>
        <a href="{{ url('dompet?status=2') }}" type="button" class="btn btn-secondary">Tidak Aktif
            ({{ $jmlDompetTdkAktif }})</a>
    </div>
    <div class="widget-content widget-content-area br-6">
        <table class="multi-table table table-striped table-bordered table-hover non-hover" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NAMA</th>
                    <th>REFERENSI</th>
                    <th>DESKRIPSI</th>
                    <th>STATUS</th>
                    <th class="text-center dt-no-sorting">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($data as $wallet)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $wallet->nama }}</td>
                        <td>{{ $wallet->referensi }}</td>
                        <td>{{ $wallet->deskripsi }}</td>
                        <td>
                            <?php
                            if ($wallet->status_id == 1) {
                                echo 'Aktif';
                            } else {
                                echo 'Tidak Aktif';
                            }
                            ?>
                            {{-- {{ $wallet->status_id }} --}}
                        </td>
                        <td class="text-center">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-more-horizontal">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="19" cy="12" r="1"></circle>
                                        <circle cx="5" cy="12" r="1"></circle>
                                    </svg>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                    <u class="dropdown-item">{{ $wallet->nama }}</u>
                                    <a href="{{ url("dompet/$wallet->id") }}" class="dropdown-item">Detail</a>
                                    <a href="{{ url("dompet/$wallet->id/edit") }}" class="dropdown-item">Ubah</a>
                                    <?php
                                    if ($wallet->status_id == 1) {
                                        $kode = 2;
                                        $status = 'Tidak Aktif';
                                    } else {
                                        $kode = 1;
                                        $status = 'Aktif';
                                    }
                                    ?>
                                    <form action="{{ url("dompet/$wallet->id/$kode") }}" method="POST">
                                        @csrf @method('PATCH')
                                        <button type="submit" class="dropdown-item">{{ $status }}</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach


            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>NAMA</th>
                    <th>REFERENSI</th>
                    <th>DESKRIPSI</th>
                    <th>STATUS</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
