@extends('layouts.app')
@section('title', 'Perhitungan Keuangan')
@section('content')

<div class="main py-4">
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <h2 class="mb-4 h5">{{ __('Perhitungan Keuangan Wakaf') }}</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nama Perhitungan</th>
                    <th>Sub Perhitungan</th>
                    <th>Perhitungan</th>
                    <th>Nilai Hitung</th>
                    <th>Hasil</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td rowspan="8">Proporsi</td>
                    <td rowspan="2">Funding</td>
                    <td>Penerimaan Wakaf Permanen / Jumlah Penghasilan</td>
                    <td>{{ $pwp }} / {{ $jp }}</td>
                    <td>{{ $pwp/$jp }}</td>
                </tr>
                <tr>
                    <td>Penerimaan Wakaf Temporer / Jumlah Penghasilan</td>
                    <td>{{ $pwt }} / {{ $jp }}</td>
                    <td>{{ $pwt/$jp }}</td>
                </tr>

                <tr>
                    <td rowspan="5">Managing</td>
                    <td>Hasil Pengelolaan dan Pengembangan / Jumlah Penghasilan</td>
                    <td>{{ $hppaw }} / {{ $jp }}</td>
                    <td>{{ $hppaw/$jp }}</td>
                </tr>
                <tr>
                    <td>Total Beban Operasional / Hasil Pengelolaan Pengembangan</td>
                    <td>{{ $tbo }} / {{ $hppaw }}</td>
                    <td>{{ $tbo/$hppaw }}</td>
                </tr>
                <tr>
                    <td>Bagian Nazir atas Hasil Pengelolaan / Hasil Pengelolaan Pengembangan</td>
                    <td>{{ $bnhp }} / {{ $hppaw }}</td>
                    <td>{{ $bnhp/$hppaw }}</td>
                </tr>
                <tr>
                    <td>Reinvestasi Pengelolaan Aset Wakaf / Hasil Pengelolaan Pengembangan</td>
                    <td>{{ $rpaw }} / {{ $hppaw }}</td>
                    <td>{{ $rpaw/$hppaw }}</td>
                </tr>
                <tr>
                    <td>Investasi / Total Aset</td>
                    <td>{{ $investasi }} / {{ $ta }}</td>
                    <td>{{ $investasi/$ta }}</td>
                </tr>

                <tr>
                    <td>Donating</td>
                    <td>Donasi Penyaluran / Hasil Pengelolaan & Pengembangan</td>
                    <td>{{ $dp }} / {{ $hppaw }}</td>
                    <td>{{ $dp/$hppaw }}</td>
                </tr>


                <tr>
                    <td rowspan="3">Multiplayer</td>
                    <td rowspan="3">-</td>
                    <td>(Wakaf Permanen + Wakaf Temporer) / Total Beban Operasional</td>
                    <td>({{ $pwp }} + {{ $pwt }}) / {{ $tbo }}</td>
                    <td>{{ ($pwp+$pwt)/$tbo }}</td>
                </tr>
                <tr>
                    <td>Donasi Penyaluran / Total Beban Operasional</td>
                    <td>{{ $dp }} / {{ $tbo }}</td>
                    <td>{{ $dp/$tbo }}</td>
                </tr>
                <tr>
                    <td>Hasil Pengelolaan Pengembangan / Total Beban Operasional</td>
                    <td>{{ $hppaw }} / {{ $tbo }}</td>
                    <td>{{ ($hppaw)/$tbo }}</td>
                </tr>


                <tr>
                    <td>Return</td>
                    <td>-</td>
                    <td>Hasil Pengelolaan Pengembangan / Investasi</td>
                    <td>{{ $hppaw }} / {{ $investasi }}</td>
                    <td>{{ $hppaw/$investasi }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="card card-body my-5 border-0 shadow table-wrapper table-responsive">
        <table class="table table-hover">
            <thead> 
                <tr>
                    <th>Nama Perhitungan</th>
                    <th>Sub Perhitungan</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td rowspan="3">Proporsi</td>
                    <td>Funding</td>
                    <td>{{ $totalFunding }}</td>
                </tr>
                <tr>
                    <td>Managing</td>
                    <td>{{ $totalManaging }}</td>
                </tr>
                <tr>
                    <td>Donating</td>
                    <td>{{ $totalDonating }}</td>
                </tr>
                <tr>
                    <td colspan="2">Total Proporsi</td>
                    <td>{{ $proporsi }}</td>
                </tr>


                <tr>
                    <td rowspan="3">Multiplayer</td>
                    <td rowspan="3">-</td>
                    <td>{{ $efisiensi1 }}</td>
                </tr>
                <tr>
                    <td>{{ $efisiensi2 }}</td>
                </tr>
                <tr>
                    <td>{{ $efisiensi3 }}</td>
                </tr>
                <tr>
                    <td colspan="2">Total Multiplayer</td>
                    <td>{{ $efisiensi }}</td>
                </tr>


                <tr>
                    <td>Return</td>
                    <td>-</td>
                    <td>{{ $hasilPengelolaan }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
    
@endsection