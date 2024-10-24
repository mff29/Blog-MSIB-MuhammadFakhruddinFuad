@extends('layouts.app2')
@section('title', 'Edit Kategori')
@section('content')
     <div class="card">
          <div class="card-header">
               <h3 class="m-0 text-center">EDIT KATEGORI</h3>
          </div>

          <div class="card-body">
               <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('kategori.form')
               </form>
          </div>
     </div>
@endsection