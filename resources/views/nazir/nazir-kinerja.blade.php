@extends('master')
@include('layouts/nazir/aside')
@section('title', 'Kinerja Nazir')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow" style="margin: 60px 0 200px 0;">
                <div class="card-body">
                <h2>Daftar Kinerja</h2>
                <hr class="lead">
                <div style="overflow-x: auto;">
                    <table id="data" class="table table-striped table-bordered text-center">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Keuangan ke-</th>
                                <th>Proporsi</th>
                                <th>Multiplayer</th>
                                <th>Produktivitas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($keuangan as $k)
                                <tr>
                                    @if (auth()->user()->id == $k->FK_USER)
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $k->ID_KEUANGAN_NAZIR }}</td>

                                        @foreach ($proporsi as $p)
                                            @if ($k->ID_KEUANGAN_NAZIR == $p->FK_KN )
                                                <td>{{ $p->NILAI_TOTAL }} ({{ $p->KINERJA }})</td>
                                            @endif
                                        @endforeach

                                        @foreach ($efisiensi as $e)
                                            @if ($k->ID_KEUANGAN_NAZIR == $e->FK_KN )
                                                <td>{{ $e->NILAI_TOTAL }} ({{ $e->KINERJA }})</td>
                                            @endif
                                        @endforeach

                                        @foreach ($hasilPengelolaan as $hp)
                                            @if ($k->ID_KEUANGAN_NAZIR == $hp->FK_KN )
                                                <td>{{ $hp->NILAI_TOTAL }} ({{ $hp->KINERJA }})</td>
                                            @endif
                                        @endforeach
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection