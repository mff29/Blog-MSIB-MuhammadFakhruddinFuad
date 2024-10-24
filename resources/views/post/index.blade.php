@extends('layouts.app2')
@section('title', 'Data POST')
@section('content')
     <div class="card">
          <div class="card-header text-center">
               <h3 class="m-0">DATA POST</h3>
          </div>
          <div class="card-body">
               <a href="{{ route('post.create') }}" class="btn btn-primary">Tambah</a>
               <hr>
               @include('alert')
               <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="post-table">
                         <thead>
                              <tr class="table-primary">
                                   <th width="10">No</th>
                                   <th width="75">Img</th>
                                   <th>Title</th>
                                   <th>Kategori</th>
                                   <th>Author</th>
                                   <th>Status</th>
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
               $('#post-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '/post',
                    columns: [
                         {data: 'DT_RowIndex', orderable: false, searchable: false},
                         { data: 'img', name: 'img', orderable: false, searchable: false },
                         { data: 'title', name: 'title' },
                         { data: 'kategori.nama', name: 'kategori.nama' },
                         { data: 'user.name', name: 'user.name' },
                         { data: 'status', name: 'status' },
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
                              url: '/post/' + userId,
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
                                   $('#post-table').DataTable().ajax.reload();
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