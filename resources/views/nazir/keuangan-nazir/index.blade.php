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
        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            <h2 class="mb-4 h5">{{ __('Keuangan Wakaf') }}</h2>

            <a href="{{ route('nazir.keuangan.create') }}" class="btn btn-success mb-5"><i class="fa fa-plus"></i> Tambah Data</a>

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
                                        <a href="{{ route('nazir.keuangan.edit') . $k->id }}" class="btn text-white btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="{{ route('nazir.keuangan.destroy') . $k->id }}" onclick="return confirm('Yakin mau hapus data?');" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        <a href="{{ route('nazir.keuangan.hitung') .$k->id }}" class="btn btn-primary">Hitung</a>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
