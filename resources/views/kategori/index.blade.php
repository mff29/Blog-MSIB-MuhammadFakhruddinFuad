@extends('layouts.app2')
@section('title', 'Kategori')
@section('content')
     <div class="card">
          <div class="card-header">
               <h3 class="m-0 text-center">DATA KATEGORI</h3>
          </div>
          <div class="card-body">
               <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah</a>
               <hr>
               @include('alert')
               <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="kategori-table">
                         <thead>
                              <tr class="table-primary">
                                   <th width="10">No</th>
                                   <th>Nama</th>
                                   <th>Deskripsi</th>
                                   <th width="110">Action</th>
                              </tr>
                         </thead>
                    </table>
               </div>
          </div>
     </div>
@endsection

@push('scripts')
     <script>
          $(function() {
               $('#kategori-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '/kategori',
                    columns: [
                         {data: 'DT_RowIndex', orderable: false, searchable: false},
                         { data: 'nama', name: 'nama' },
                         { data: 'deskripsi', name: 'deskripsi' },
                         { data: 'action', name: 'action', orderable: false, searchable: false }
                    ]
               });
          });
     </script>

     <script>
          function alert_delete(userId) {
               Swal.fire({
                    title: "Are you sure?",
                    text: "Data tersebut akan dihapus.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Delete!"
               }).then((result) => {
                    if (result.isConfirmed) {
                         $.ajax({
                              url: '/kategori/' + userId,
                              type: 'POST',
                              data: {
                                   _method: 'DELETE',
                                   _token: '{{ csrf_token() }}'
                              },
                              success: function(response) {
                                   Swal.fire({
                                   title: "Deleted!",
                                   text: response.message,
                                   icon: "success"
                                   });
                                   $('#kategori-table').DataTable().ajax.reload();
                              },
                              error: function() {
                                   Swal.fire({
                                   title: "Failed!",
                                   text: "Terjadi kesalahan saat menghapus.",
                                   icon: "error"
                                   });
                              }
                         });
                    }
               });
          }
     </script>
@endpush