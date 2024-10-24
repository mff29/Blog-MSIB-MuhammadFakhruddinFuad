@extends('layouts.app2')
@section('title', 'Tambah post')
@section('content')
     <div class="card">
          <div class="card-header text-center">
               <h3 class="m-0">TAMBAH post</h3>
          </div>

          <div class="card-body">
               @if ($errors->any())
               <div class="alert alert-danger">
                    <strong>Whoops!</strong> Ada kesalahan pada inputan Anda.<br><br>
                    <ul>
                         @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                         @endforeach
                    </ul>
               </div>
               @endif
               <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('post.form')
               </form>
          </div>
     </div>
@endsection