@extends('layouts.app2')
@section('title', 'Create Users')
@section('content')
     <div class="card">
          <div class="card-header">
               <h3 class="m-0 text-center">Create User</h3>
          </div>

          <div class="card-body">
               <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    @include('users.form')
               </form>
          </div>
     </div>
@endsection