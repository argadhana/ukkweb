@extends('layouts.app')
@section('content')
    <div class="container">
        <div>
            <h3 class="text-center">Daftar Buku</h3>

        </div>
        <div class="d-flex justify-content-between">
            @auth
            <a href="/posts/create" class="btn btn-primary"> Tambah buku</a>
            @endauth
            <hr>
            <form action="/posts/cari" method="GET">
                <input type="text" name="cari" placeholder="Cari Judul buku ..">
                <input type="submit" value="CARI">
            </form>
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
                            <p><b>Pengarang : </b>{{Str::limit($post->pengarang, 100, '.')}}</p>
                            <p><b>Penerbit : </b>{{Str::limit($post->penerbit, 100, '.')}}</p>

                        </div>
                    </div>
                    <div class="card-footer justify-content-between">
                        @can('delete', $post)
                            <a href="posts/{{$post->id}}/" class="btn btn-sm btn-info ">Readmore</a>
                        @endcan
                        @can('update', $post)
                           <a href="posts/{{$post->id}}/edit" class="btn btn-sm btn-warning ">Edit</a>
                        @endcan
                    </div>
                </div>
            </div>

            @empty
                <div class="btn btn-info">Nothing here</div>

            @endforelse
        </div>
        <div class="d-flex justify-content-center">
            {{$posts ?? ''->links()}}
        </div>
    </div>
@endsection
