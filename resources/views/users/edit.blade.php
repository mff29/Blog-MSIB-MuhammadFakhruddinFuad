@extends('layouts.app2')
@section('title', 'Edit Users')
@section('content')
     <div class="card">
          <div class="card-header">
               <h3 class="m-0 text-center">Edit User</h3>
          </div>

          <div class="card-body">
               <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('users.form')
               </form>
          </div>
     </div>
@endsection