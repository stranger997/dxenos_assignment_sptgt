@extends('layout')
  
@section('content')
<main role="main" class="container">
<div><br></div>
<div class="row d-flex justify-content-center">
    <div class="col-md-6">
        <div class="card px-5 py-5">
            <form method="POST" action="{{ route('user.login') }}">
                @csrf
            <input type="email" name="email" required="required" class="form-control" placeholder="Email" />
            <div class="input-group mb-3">
                <input type="password" name="password" required="required" class="form-control" placeholder="Password" />
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="mb-3"> <button type="submit" class="btn btn-dark w-100">Sign In</button> </div>
                <!-- /.col -->
            </div>

            </form>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div> 

</main>   

@endsection