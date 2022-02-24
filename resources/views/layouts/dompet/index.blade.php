@extends('layouts.app')

@section('main')
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
                <tr>
                    <td>1</td>
                    <td>Dompet Utama</td>
                    <td>57548652544</td>
                    <td>Bank BCA</td>
                    <td>Aktif</td>
                    <td class="text-center">
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-more-horizontal">
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="19" cy="12" r="1"></circle>
                                    <circle cx="5" cy="12" r="1"></circle>
                                </svg>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                <a class="dropdown-item" href="javascript:void(0);">Detail</a>
                                <a class="dropdown-item" href="javascript:void(0);">Ubah</a>
                                <a class="dropdown-item" href="javascript:void(0);">Tidak Aktif</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Dompet Tagihan</td>
                    <td>57548652544</td>
                    <td>Bank BCA</td>
                    <td>Aktif</td>
                    <td class="text-center">
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-more-horizontal">
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="19" cy="12" r="1"></circle>
                                    <circle cx="5" cy="12" r="1"></circle>
                                </svg>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                <a class="dropdown-item" href="javascript:void(0);">Detail</a>
                                <a class="dropdown-item" href="javascript:void(0);">Ubah</a>
                                <a class="dropdown-item" href="javascript:void(0);">Tidak Aktif</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Dompet Cadangan</td>
                    <td>57548652544</td>
                    <td>Bank BCA</td>
                    <td>Aktif</td>
                    <td class="text-center">
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-more-horizontal">
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="19" cy="12" r="1"></circle>
                                    <circle cx="5" cy="12" r="1"></circle>
                                </svg>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                <a class="dropdown-item" href="javascript:void(0);">Detail</a>
                                <a class="dropdown-item" href="javascript:void(0);">Ubah</a>
                                <a class="dropdown-item" href="javascript:void(0);">Tidak Aktif</a>
                            </div>
                        </div>
                    </td>
                </tr>

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
