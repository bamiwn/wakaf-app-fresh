@extends('layouts/app')
@section('title', 'Dashboard Admin')
@section('content')
<section class="content mt-5">

  <div class="container-fluid">
    <div class="row">

      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $jumlah_user }}</h3>
            <p>Nazir Terdaftar</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ url('admin/data-nazir') }}" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>


      <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $proporsi_terbaik }}</h3>
            <p>Top Proporsi</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>


      <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{ $efisiensi_terbaik }}</h3>
            <p>Top Efisiensi</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{ $hp_terbaik }}</h3>
            <p>Top Hasil Pengelolaan</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

    
@endsection