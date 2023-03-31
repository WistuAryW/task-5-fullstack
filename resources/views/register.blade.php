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
 
<div class="container pt-5 my-5">
    <div class="text-center my-5">
        <h1>Daftar Ke My Blogs</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card rounded" style="background-color: #AAC4FF; box-shadow: 5px 5px 0px #4267B2">
                <div class=" card-body">
                    <h1 class="text-white">Register</h1>
                    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group text-white">
                            <label for="">Email</label>
                            <input class="form-control" type="email" name="email"  placeholder="Email">
                        </div>
                        <div class="form-group text-white">
                            <label for="">Username</label>
                            <input class="form-control" type="text" name="name"  placeholder="Username">
                        <div class="form-group text-white">
                            <label for="">Password</label>
                            <input class="form-control" type="password" name="password"  placeholder="Password">
                        </div>
                        <div class="form-group mt-3">
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
                                class="btn  form-control rounded" type="submit">Register</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection