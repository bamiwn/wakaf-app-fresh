@extends('layouts.app')
@section('title', 'Kinerja Nazir')
@section('content')
<div class="main py-4">
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <h2 class="mb-4 h5">{{ __('Kinerja Nazir') }}</h2>

        <table id="data" class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Keuangan ke-</th>
                    <th>Dibuat Pada</th>
                    <th>Proporsi</th>
                    <th>Multiplayer</th>
                    <th>Produktivitas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($keuangan as $k)
                    <tr>
                        @if (auth()->user()->id == $k->user_id)
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $k->id }}</td>
                            <td>{{ date('d F Y', strtotime($k->created_at)) }}</td>

                            @foreach ($proporsi as $p)
                                @if ($k->id == $p->keuangan_nazir_id )
                                    <td>{{ $p->nilai_total }} ({{ $p->kinerja }})</td>
                                @endif
                            @endforeach

                            @foreach ($efisiensi as $e)
                                @if ($k->id == $e->keuangan_nazir_id )
                                    <td>{{ $e->nilai_total }} ({{ $e->kinerja }})</td>
                                @endif
                            @endforeach

                            @foreach ($hasilPengelolaan as $hp)
                                @if ($k->id == $hp->keuangan_nazir_id )
                                    <td>{{ $hp->nilai_total }} ({{ $hp->kinerja }})</td>
                                @endif
                            @endforeach
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection