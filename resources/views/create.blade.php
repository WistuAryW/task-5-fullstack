@extends('app')
   
@section('content')
<div class="row my-5 pt-5">
    <div class="col-lg-12 margin-tb text-center">
        <div class="pull-left">
            <h2>Add New Articel</h2>
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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 rounded" style="background-color: #D2DAFF">
            <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="image">
                </div>
                <div class="form-group">
                    <strong>Content:</strong>
                    <textarea class="form-control" style="height:150px" name="content" placeholder="Content"></textarea>
                </div>
                <div class="form-group my-3 d-flex justify-content-end">
                    <button class="btn btn-success " type="submit">Simpan Artikel</button>
                </div>
        </form>
        </div>
    </div>
</div>
<script>
    $('#summernote').summernote({
        placeholder: 'mengetik..',
        tabsize: 2,
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
    </script>
@endsection