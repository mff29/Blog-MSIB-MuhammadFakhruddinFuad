@extends('layouts.app2')
@section('title', 'Detail POST')
@section('content')
<div class="card">
     <div class="card-header text-center">
          <h3 class="m-0">DETAIL POST</h3>
     </div>

     <div class="card-body">
          <div class="row">
               <div class="col-md-12">
                    <div class="d-flex justify-content-center">
                         <div class="text-center">
                              <img src="{{ asset('storage/'.$post->img) }}" alt="Image post" width="80" height="80" class="mb-2">
                              <h3>{{ $post->title }}</h3>
                              <h6>Author : {{ $post->user->name }}</h6>
                         </div>
                    </div>
                    <div class="post-content">
                         @if ($post->content)
                              @foreach (explode("\n", $post->content) as $paragraph)
                                   <p style="text-indent: 2em; margin: 0 0 1em; text-align: justify;">{{ $paragraph }}</p>
                              @endforeach
                         @else
                              <p>No content available.</p>
                         @endif
                    </div>
               </div>

               {{-- <div class="col-md-3">
                    <h5 class="mb-3">Artikel lainnya</h5>
                    <ul class="list-unstyled">
                         @if ($otherPost->isEmpty())
                         <li class="mb-3">
                              <p>Tidak ada artikel lain.</p>
                         </li>
                         @else
                              @foreach ($otherPost as $pl)
                              <li class="mb-3">
                                   <a href="{{ route('post.show', $pl->id) }}" class="text-decoration-none text-dark">
                                   <a href="{{ route('post.show', $pl->id) }}" class="text-decoration-none text-dark">
                                        <div class="card h-100 p-2 hover-bg">
                                             <div class="row g-0">
                                                  <div class="col-4 d-flex justify-content-center align-items-center">
                                                       <img src="{{ asset('storage/'.$pl->img) }}" width="50" height="50" class="img-fluid">
                                                  </div>
                                                  <div class="col-8">
                                                       <div class="card-body">
                                                            <h6 class="card-title m-0">{{ Str::limit($pl->title, 40) }}</h6>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                   </a>
                              </li>
                              @endforeach
                         @endif
                    </ul>
               </div> --}}
          </div>
     </div>

     {{-- <div class="card-footer">
          <a href="/home" class="btn btn-danger">Kembali</a>
     </div> --}}
</div>
@endsection

@push('css')
<style>
     .hover-bg:hover {
          background-color: blue;
          color: #FFF;
          transition: background-color 0.3s ease;
     }
</style>
@endpush