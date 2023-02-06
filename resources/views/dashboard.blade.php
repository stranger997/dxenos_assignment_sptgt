@extends('layout')
  
@section('content')

<style>
    .wrapper{position:relative;}
    .right,.left{width:70%; position:absolute;}
    .right{right:-100px;}
    #listings{overflow: auto; height: 600px; width: 500px;}
    .left{left:0; overflow:hidden; position:absolute;}
</style>
<main role="main" class="container">
    <div class="container mt-5">
        <div class="wrapper">
            <div class="left">

                @include('new_listing')

            </div>
            <div class="right">

                @include('listings')

            </div>
        </div>
    </div>
</main>




@endsection