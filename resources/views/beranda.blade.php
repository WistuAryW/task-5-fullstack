@extends('app')
  
@section('content')
<header class="masthead my-5" style="background-image: url('assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="text-center">
                <div class="post-heading">
                    <h1>Selamat Datang di My Blogs</h1>
                    <span class="subheading">Baca dan bagikan artikel di My Blogs</span>
                </div>
            </div>
        </div>
    </div>
</header>
    <div class="container">
        <div class="row">
            <!-- filter kategori -->
            <div class="col-lg-5 mb-2">
                <div class="dropdown ">
                    <div class=" text-secondary btn-sm   form-control px-2" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">Filter
                        berdasarkan
                        kategori <span class=" d-flex justify-content-end dropdown-toggle pb-1"></span>
                    </div>
                    <ul class="dropdown-menu form-control" arial-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item " name="find" href="">Android</a></li>
                        <li><a class="dropdown-item " href="">Design</a></li>
                        <li><a class="dropdown-item " href="">Game</a></li>
                        <li><a class="dropdown-item " href="">Website</a></li>
                    </ul>
                </div>
            </div>
            <!-- search -->
            <div class="col-lg-5 mb-2">
                <form class="d-flex justify-content-end " action="" method="get">
                    <input placeholder="Cari artikel disini.." class="form-control" type="text" name="find">
                    <button class="btn  btn-outline-secondary btn-sm " type="submit">Cari </button>
                </form>
            </div>
            <!-- tambah artikel -->
            <div class="col-lg-2 mb-2 d-flex justify-content-end ">
                <a class="btn btn-outline-secondary btn-sm form-control"
                href="{{ url('create') }}">Tambah
                    Artikel</a>
            </div>
        </div>
         
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
       
        <div class="row mb-5">
            @foreach ($articels as $articel)
            <div class="col-md-4 mt-3 justify-content-center">
                <div class="card shadow-sm">
                    <div class="card-body m-3 p-0 rounded">
                        <img src="/images/{{ $articel->image }}"  width="100%" height="250px"
                        alt="thumbnail">
                    </div>
                    <div class="" style="background-color: #FFF">
                        <h6 class="post-title mx-3 mt-2 mb-0 ">{{ $articel->title }}</h6>
                        <p class="post mt-1 mb-5 mx-3  p-0">
                            <?php echo strlen(strip_tags( $articel->content )) >= 150? substr(strip_tags( $articel->content ),0,147).'...':strip_tags($articel->content ); ?>
                        </p>
                        <hr class="m-0">
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-outline-secondary btn-sm ms-3 my-2 me-lg-4"
                                href="{{ route('show',$articel->id) }}">Selengkapnya</a>
                            </div>
    
                            <div class="col">
                                <span class="btn btn-link d-flex justify-content-end"><i
                                        class="bi bi-heart-fill fa-lg me-1 text-danger"></i>100</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="container">
        {{ $articels->links() }}
    </div>
@endsection