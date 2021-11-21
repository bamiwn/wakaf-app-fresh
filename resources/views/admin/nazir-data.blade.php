@extends('layouts.app')
@section('title', 'Daftar Data Nazir')

@section('content')
    <div class="main py-4">
        <div class="card card-body border-0 shadow table-wrapper table-responsive mt-4">
            <h2 class="mb-4 h5">{{ __('Data Nazir') }}</h2>

            <table id="data" class="table table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Nazir</th>
                        <th>Email</th>
                        <th>Status Verifikasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $user as $u )
                        @if (!$u->is_admin)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->email }}</td>

                                @if ($u->email_verified_at != NULL)
                                    <td class="text-success"><span class="badge bg-success fs-6"> Terverifikasi</span></td>
                                @else
                                    <td class="text-danger"><span class="badge bg-danger fs-6"> Belum Verifikasi</span></td>
                                @endif
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
