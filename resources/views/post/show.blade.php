@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>{{$post->judul}}</h1>
            <hr>
        <div>
            <p>{{$post->penerbit}}</p>
        </div>
        <div class="text-secondary">
                {{$post->author->name}}
        </div>
        <hr>
        @can('delete', $post)
            <div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Delete</button>
            </div>
        @endcan

        <!-- Modal -->
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
