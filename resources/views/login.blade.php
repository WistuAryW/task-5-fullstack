@extends('app')
   
@section('content')

      
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
 
<div class="container pt-5 mt-5">
    <div class="text-center my-5">
        <h1>Masuk Ke My Blogs</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card rounded" style="background-color: #AAC4FF; box-shadow: 5px 5px 0px #4267B2">
                <div class=" card-body">
                    <h1 class="text-white">Login</h1>
                    <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="form-group text-white ">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group mb-3 text-white">
                        <label class="form-label ">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                        <div class="form-group">
                            <div class="row mb-3">
                                <div class="col">
                                    <button style="background-color: #4267B2; box-shadow: 5px 5px 0px #DBB632"
                                        class="btn form-control text-white rounded" type="submit">Facebook</button>
                                </div>
                                <div class="col">
                                    <button style="box-shadow: 5px 5px 0px #4267B2"
                                        class="btn btn-warning text-white form-control rounded"
                                        type="submit">Google</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <button style="background-color: #B1B2FF; box-shadow: 5px 5px 0px #4267B2"
                                class="btn  form-control rounded" type="submit">Login</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection