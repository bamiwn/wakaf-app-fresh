@extends('master')
@section('title', 'Data Nazir Wakaf')
@section('aside')
    @include('/layouts/admin/aside')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow" style="margin: 60px 0 200px 0;">
                    <div class="card-body">
                    <h2>Daftar Nazir</h2>
                    <hr class="lead">
                    
                    <table id="data" class="table table-striped table-bordered text-center">
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
                                @if ($u->is_admin != 1)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->email }}</td>

                                        @if ($u->email_verified_at != NULL)
                                            <td class="text-success">Sudah Verifikasi</td>
                                        @else
                                            <td class="text-danger">Belum Verifikasi</td>
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
