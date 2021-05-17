@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            
                <h3>Daftar Buku</h3>
            <hr>
            @auth
            <a href="/posts/create" class="btn btn-primary"> Tambah buku</a>
            @endauth
        </div>

        <div class="row mt-5">
            @forelse ($posts as $post)
            <div class="col-md-4">

                <div class="card mb-4">
                    <div class="card-header">
                        <h3>{{$post->judul}}</h3>
                    </div>
                    @if ($post->gambar)
                    <img style="height: 270px; object-fit: cover; object-position: center;" src="{{ $post->takeImage}}" class="card-img-top" alt="...">
                        
                    @endif

                    <div class="card-body">
                        <div class="div">
                            <p>{{Str::limit($post->pengarang, 100, '.')}}</p>
                            <a href="/posts/{{$post->id}}"> Read more</a>
                        </div>
                    </div>
                    <div class="card-footer justify-content-between">
                        @can('delete', $post)
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">Delete</button>
                        @endcan
                        @can('update', $post)
                           <a href="posts/{{$post->id}}/edit" class="btn btn-sm btn-info ">Edit</a>
                        @endcan
                    </div>
                </div>
            </div>

            @empty
                <div class="btn btn-info">Nothing here</div>

            @endforelse
        </div>
        <div class="d-flex justify-content-center">
            {{$posts->links()}}
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Apakah anda ingin menghapusnya?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <h1>{{$post->title}}</h1>
            </div>
            <div class="modal-footer">
                <form action="/posts/{{$post->id}}/delete" method="POST">
                    @method('delete')
                    @csrf
                    <button class="btn-danger" type="submit">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
