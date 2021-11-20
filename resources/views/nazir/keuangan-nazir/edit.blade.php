@extends('master')
@section('title', $title)
@section('aside')
    @include('layouts/nazir/aside')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card shadow"  style="margin-top: 120px;">
                    <div class="card-body">
                        <h2>Tambah Keuangan</h2>
                        <hr class="lead">

                        <form action="/nazir/keuangan-nazir/update/{{ $keuangan_nazir->ID_KEUANGAN_NAZIR }}" method="post" class="form-group">
                        @csrf

                            <label for="PWP" class="mt-2">Penerimaan Wakaf Permanen :</label>
                            <input name="PWP" type="text" class="form-control" placeholder="masukkan angka" value="{{ $keuangan_nazir->PWP }}" autocomplete="off" required>
                            
                            <label for="PWT" class="mt-2">Penerimaan Wakaf Temporer :</label>
                            <input name="PWT" type="text" class="form-control" placeholder="masukkan angka" value="{{ $keuangan_nazir->PWT }}" autocomplete="off" required>
                            
                            <label for="JP" class="mt-2">Jumlah Penghasilan :</label>
                            <input name="JP" type="text" class="form-control" placeholder="masukkan angka" value="{{ $keuangan_nazir->JP }}" autocomplete="off" required>
                            
                            <label for="TA" class="mt-2">Total Aset :</label>
                            <input name="TA" type="text" class="form-control" placeholder="masukkan angka" value="{{ $keuangan_nazir->TA }}" autocomplete="off" required>
                            
                            <label for="TBO" class="mt-2">Total Bebas Operasional :</label>
                            <input name="TBO" type="text" class="form-control" placeholder="masukkan angka" value="{{ $keuangan_nazir->TBO }}" autocomplete="off" required>
                            
                            <label for="KAN" class="mt-2">Kenaikan Aset Neto :</label>
                            <input name="KAN" type="text" class="form-control" placeholder="masukkan angka" value="{{ $keuangan_nazir->KAN }}" autocomplete="off" required>
                            
                            <label for="HPPAW" class="mt-2">Hasil Pengelolaan dan Pengembangan Aset Wakaf :</label>
                            <input name="HPPAW" type="text" class="form-control" placeholder="masukkan angka" value="{{ $keuangan_nazir->HPPAW }}" autocomplete="off" required>
                            
                            <label for="DP" class="mt-2">Donasi Penyaluran :</label>
                            <input name="DP" type="text" class="form-control" placeholder="masukkan angka" value="{{ $keuangan_nazir->DP }}" autocomplete="off" required>

                            <label for="DRI" class="mt-2">Dampak Revaluasi/Impairment :</label>
                            <input name="DRI" type="text" class="form-control" placeholder="masukkan angka" value="{{ $keuangan_nazir->DRI }}" autocomplete="off" required>
                            
                            <label for="INVESTASI" class="mt-2">Investasi :</label>
                            <input name="INVESTASI" type="text" class="form-control" placeholder="masukkan angka" value="{{ $keuangan_nazir->INVESTASI }}" autocomplete="off" required>
                            
                            <label for="KSK" class="mt-2">Kas dan Setara Kas :</label>
                            <input name="KSK" type="text" class="form-control" placeholder="masukkan angka" value="{{ $keuangan_nazir->KSK }}" autocomplete="off" required>
                            
                            <label for="TP" class="mt-2">Total Pengeluaran :</label>
                            <input name="TP" type="text" class="form-control" placeholder="masukkan angka" value="{{ $keuangan_nazir->TP }}" autocomplete="off" required>
                            
                            <label for="BNHP" class="mt-2">Bagian Nazhir atas Hasil Pengelolaan :</label>
                            <input name="BNHP" type="text" class="form-control" placeholder="masukkan angka" value="{{ $keuangan_nazir->BNHP }}" autocomplete="off" required>
                            
                            <label for="RPAW" class="mt-2">Reinvestasi Pengelolaan Aset Wakaf :</label>
                            <input name="RPAW" type="text" class="form-control" placeholder="masukkan angka" value="{{ $keuangan_nazir->RPAW }}" autocomplete="off" required>
                            
                            <a href="../" class="btn btn-primary mt-4">Back</a>
                            <button class="btn btn-info mt-4" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection