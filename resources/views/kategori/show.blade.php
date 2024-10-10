@extends('layout.app')
@section('title', 'Detail Kategori')
@section('content')
     <div class="container">
          <div class="card">
               <div class="card-header">
                    <h3 class="text-center">DETAIL DATA KATEGORI</h3>
               </div>

               <div class="card-body">
                    <div class="table-responsive">
                         <table class="table table-bordered table-striped" id="kategori-table">
                              <thead class="text-center">
                                   <tr>
                                        <th width="10">No</th>
                                        <th>Deskripsi</th>
                                        <th width="70">#</th>
                                   </tr>
                              </thead>
                         </table>
                    </div>
               </div>
          </div>
     </div>
@endsection