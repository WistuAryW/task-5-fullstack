@extends('app')
  
@section('content')
    <div class="container my-5 pt-5">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2></h2>
                </div>
                <div class="pull-right" style="margin-bottom:10px;">
                <a class="btn btn-success" href="{{ url('create') }}"> Create New Artikel</a>
                </div>
            </div>
        </div>
         
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
     
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Title</th>
                <th>Content</th>
                <th class="text-center" width="280px">Action</th>
            </tr>
            @foreach ($articels as $articel)
            <tr>
                <td>{{ ++$i }}</td>
                <td><img src="/images/{{ $articel->image }}" width="100px"></td>
                <td>{{ $articel->title }}</td>
                <td>{{ $articel->content }}</td>
                <td>
                    <form class="text-center" action="{{ route('destroy',$articel->id) }}" method="POST">
          
                        <a class="btn btn-sm btn-info" href="{{ route('show',$articel->id) }}">Show</a>
           
                        <a class="btn btn-sm btn-primary" href="{{ route('edit',$articel->id) }}">Edit</a>
          
                        @csrf
                        @method('DELETE')
             
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
         
        {{  $articels->links() }}
    </div>
 
@endsection