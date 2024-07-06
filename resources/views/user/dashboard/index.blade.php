@extends('layouts.app')
@section('content')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route("front.index")}}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container">
            <div class="row">


              <div class="col-md-12">
                <div class="alert alert-success text-center">
                    Selamat datang, {{Auth::user()->name}}
                </div>

              </div>

            </div>
        </div>
    </div>

</div>
@endsection
