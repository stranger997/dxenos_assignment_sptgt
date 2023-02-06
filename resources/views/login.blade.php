@extends('layout')
  
@section('content')
<main role="main" class="container">
<div><br></div>
<div class="row d-flex justify-content-center">
    <div class="col-md-6">
        <div class="card px-5 py-5">
            <form method="POST" action="{{ route('user.login') }}">
                @csrf
            <input type="email" name="email" class="form-control" placeholder="Email" />
            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" />
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="mb-3"> <button type="submit" class="btn btn-dark w-100">Sign In</button> </div>
                <!-- /.col -->
            </div>
            </form>
        </div>
    </div>
</div>   
</main>   

@endsection