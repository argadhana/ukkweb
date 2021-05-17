@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card-header">
                    <h3>Edit Post</h3>
                </div>
                <div class="card-body">
                <form action="/posts/{{$post->id}}/edit" method="post" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                       @include('post.partials.form-control')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
