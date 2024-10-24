@extends('layouts.app2')
@section('title', 'Home')
@section('content')
@include('alert')
     
     <div class="card">
          <div class="card-header">
               <h3 class="text-center m-0">Blog MSIB - Fu'ad</h3>
          </div>

          <div class="card-body text-center">
               <p>Muhammad Fakhruddin Fu'ad</p>
               <p>Universitas Wahid Hasyim</p>
               <p>Teknik Informatika</p>
               <p>Studi Independen Bersertifikat</p>
               <p>PT Citra Gama Sakti</p>
               <hr>
               <span>Untuk membaca artikel silahkan klik >>> <a href="/artikel">Halaman Artikel</a></span>
          </div>
     </div>
@endsection

