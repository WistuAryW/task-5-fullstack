@extends('app')
  
@section('content')
    <div class="container my-5 pt-5">
        <div class="row">
            <div class="col text-center">
                <div class="pull-left">
                    <h2>Edit Articel</h2>
                </div>
            </div>
        </div>
          
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8 rounded" style="background-color: #D2DAFF">
                <form action="{{ route('update',$articel->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <strong>Title:</strong>
                        <input type="text" name="title" value="{{ $articel->title }}" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <strong>Image:</strong>
                        <input type="file" name="image" class="form-control" placeholder="image">
                    </div>
                    <div class="form-group">
                        <strong>Content:</strong>
                        <textarea class="form-control" style="height:150px" name="content" placeholder="Content">{{ $articel->content }}</textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary my-3 " type="submit">Edit Artikel</button>
                    </div>
            </form>
            </div>
        </div>
    </div>
@endsection