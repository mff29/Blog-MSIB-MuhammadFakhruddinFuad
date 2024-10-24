@extends('layouts.app2')
@section('title', 'Users')
@section('content')
     <div class="card">
          <div class="card-header">
               <h3 class="m-0 text-center">Data Users</h3>
          </div>
          <div class="card-body">
               <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah</a>
               <hr>
               @include('alert')
               <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="users-table">
                         <thead>
                              <tr class="table-primary">
                                   <th width="10">No</th>
                                   <th>Nama</th>
                                   <th>Email</th>
                                   <th>Role</th>
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
               $('#users-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '/users',
                    columns: [
                         {data: 'DT_RowIndex', orderable: false, searchable: false},
                         { data: 'name', name: 'name' },
                         { data: 'email', name: 'email' },
                         { data: 'roles', name: 'roles' },
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
                              url: '/users/' + userId,
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
                                   $('#users-table').DataTable().ajax.reload();
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