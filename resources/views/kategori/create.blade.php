@extends('layouts.app2')
@section('title', 'Tambah Kategori')
@section('content')
     <div class="card">
          <div class="card-header">
               <h3 class="m-0 text-center">TAMBAH KATEGORI</h3>
          </div>

          <div class="card-body">
               <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf
                    @include('kategori.form')
               </form>
          </div>
     </div>
@endsection