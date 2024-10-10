@if (session('message'))
     <div class="alert alert-success">
          {{ session('message') }}
          <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
@endif