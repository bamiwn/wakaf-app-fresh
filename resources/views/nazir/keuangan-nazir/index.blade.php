@php
    function formatRupiah($angka) {
        $hasil = 'Rp. ' . number_format($angka, '2', ',', '.');
        return $hasil;
    }
@endphp


@extends('layouts.app')
@section('title', 'Daftar Keuangan Nazir')

@section('content')
    <div class="main py-4">
        <a href="{{ route('nazir.keuangan.create') }}" class="btn btn-gray-800 d-inline-flex align-items-center">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Tambah Data
        </a>

        <div class="card card-body border-0 shadow table-wrapper table-responsive mt-4">
            <h2 class="mb-4 h5">{{ __('Keuangan Wakaf') }}</h2>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="border-gray-200">NO.</th>
                        <th class="border-gray-200">PWP</th>
                        <th class="border-gray-200">PWT</th>
                        <th class="border-gray-200">JP</th>
                        <th class="border-gray-200">TA</th>
                        <th class="border-gray-200">TBO</th>
                        <th class="border-gray-200">KAN</th>
                        <th class="border-gray-200">HPPAW</th>
                        <th class="border-gray-200">DP</th>
                        <th class="border-gray-200">DRI</th>
                        <th class="border-gray-200">INVESTASI</th>
                        <th class="border-gray-200">KSK</th>
                        <th class="border-gray-200">TP</th>
                        <th class="border-gray-200">BNHP</th>
                        <th class="border-gray-200">RPAW</th>
                        <th class="border-gray-200">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $keuanganNazir as $k )
                        @if (auth()->user()->id == $k->user_id)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ formatRupiah($k->pwp) }}</td>
                                <td>{{ formatRupiah($k->pwt) }}</td>
                                <td>{{ formatRupiah($k->jp) }}</td>
                                <td>{{ formatRupiah($k->ta) }}</td>
                                <td>{{ formatRupiah($k->tbo) }}</td>
                                <td>{{ formatRupiah($k->kan) }}</td>
                                <td>{{ formatRupiah($k->hppaw) }}</td>
                                <td>{{ formatRupiah($k->dp) }}</td>
                                <td>{{ formatRupiah($k->dri) }}</td>
                                <td>{{ formatRupiah($k->investasi) }}</td>
                                <td>{{ formatRupiah($k->ksk) }}</td>
                                <td>{{ formatRupiah($k->tp) }}</td>
                                <td>{{ formatRupiah($k->bnhp) }}</td>
                                <td>{{ formatRupiah($k->rpaw) }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="keuangan-nazir/edit/{{ $k->id }}" class="btn text-white btn-warning">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                        </a>
                                        <a href="keuangan-nazir/destroy/{{ $k->id }}" onclick="return confirm('Yakin mau hapus data?');" class="btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                            </svg>
                                        </a>
                                        <a href="keuangan-nazir/hitung/{{ $k->id }}" class="btn btn-primary">Hitung</a>

                                        {{-- MODAL 
                                            <a href="keuangan-nazir/hitung/{{ $k->id }}" class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#modal-default">Hitung</a> --}}
                                        
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    
    <!-- Modal Content -->
    {{-- <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Perhitungan Keuangan - {{ $k->id }}</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>...</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary">Accept</button>
                    <button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
