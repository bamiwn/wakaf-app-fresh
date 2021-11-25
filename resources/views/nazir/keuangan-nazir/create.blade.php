@extends('layouts.app')
@section('title', 'Tambah Keuangan Nazir')

@section('content')
    <div class="main py-4">
        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            <h2 class="mb-4 h5">{{ __('Tambah Keuangan Wakaf') }}</h2>

            <form id="input-keuangan" class="form-group" action="{{ route('nazir.keuangan.store') }}" method="post">
                @csrf
                
                <input type="hidden" name="FK_USER" id="FK_USER" value="{{ auth()->user()->id }}">
                <input type="hidden" name="FK_KN" id="FK_KN" value="{{ $fkkn + 1 }}">
                
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="PWP" class="mt-2">Penerimaan Wakaf Permanen :</label>
                        <input name="PWP" type="text" class="form-control" placeholder="masukkan angka" autocomplete="off" required>
                    </div>
                    <div class="col-md-4">
                        <label for="PWT" class="mt-2">Penerimaan Wakaf Temporer :</label>
                        <input name="PWT" type="text" class="form-control" placeholder="masukkan angka" autocomplete="off" required>
                    </div>
                    <div class="col-md-4">
                        <label for="JP" class="mt-2">Jumlah Penghasilan :</label>
                        <input name="JP" type="text" class="form-control" placeholder="masukkan angka" autocomplete="off" required>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="TA" class="mt-2">Total Aset :</label>
                        <input name="TA" type="text" class="form-control" placeholder="masukkan angka" autocomplete="off" required>
                    </div>
                    <div class="col-md-4">
                        <label for="TBO" class="mt-2">Total Bebas Operasional :</label>
                        <input name="TBO" type="text" class="form-control" placeholder="masukkan angka" autocomplete="off" required>
                    </div>
                    <div class="col-4">
                        <label for="KAN" class="mt-2">Kenaikan Aset Neto :</label>
                        <input name="KAN" type="text" class="form-control" placeholder="masukkan angka" autocomplete="off" required>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="HPPAW" class="mt-2">Hasil Pengelolaan Pengembangan Aset Wakaf :</label>
                        <input name="HPPAW" type="text" class="form-control" placeholder="masukkan angka" autocomplete="off" required>
                    </div>
                    <div class="col-md-4">
                        <label for="DP" class="mt-2">Donasi Penyaluran :</label>
                        <input name="DP" type="text" class="form-control" placeholder="masukkan angka" autocomplete="off" required>
                    </div>
                    <div class="col-md-4">
                        <label for="DRI" class="mt-2">Dampak Revaluasi/Impairment :</label>
                        <input name="DRI" type="text" class="form-control" placeholder="masukkan angka" autocomplete="off" required>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="INVESTASI" class="mt-2">Investasi :</label>
                        <input name="INVESTASI" type="text" class="form-control" placeholder="masukkan angka" autocomplete="off" required>
                    </div>
                    <div class="col-md-4">
                        <label for="KSK" class="mt-2">Kas dan Setara Kas :</label>
                        <input name="KSK" type="text" class="form-control" placeholder="masukkan angka" autocomplete="off" required>
                    </div>
                    <div class="col-md-4">
                        <label for="TP" class="mt-2">Total Pengeluaran :</label>
                        <input name="TP" type="text" class="form-control" placeholder="masukkan angka" autocomplete="off" required>
                    </div>
                </div>
                
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="BNHP" class="mt-2">Bagian Nazhir atas Hasil Pengelolaan :</label>
                        <input name="BNHP" type="text" class="form-control" placeholder="masukkan angka" autocomplete="off" required>
                    </div>
                    <div class="col-md-6">
                        <label for="RPAW" class="mt-2">Reinvestasi Pengelolaan Aset Wakaf :</label>
                        <input name="RPAW" type="text" class="form-control" placeholder="masukkan angka" autocomplete="off" required>        
                    </div>
                </div>
                
                <a href="{{ route('nazir.keuangan.index') }}" class="btn btn-primary mt-4">Back</a>
                <button class="btn btn-info mt-4" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
