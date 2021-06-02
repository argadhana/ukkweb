@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card-header">Tambah
                    <h3>Tambah Buku</h3>
                </div>
                <div class="card-body">
                    <form action="/posts/store" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('post.partials.form-control', ['submit' => 'Create'])
                </div>
            </div>
        </div>
    </div>
@endsection
