@include('layout.header')
@extends('layout.sidebar')
<html>
{{--  <link href="{{ asset('assets/css/invoice.css')}}" rel="stylesheet" type="text/css" />  --}}
<main class="main-wrap">

    <body>
        <div class="container mt-10">
            <div class="row d-flex justify-content-center align-items-center">

                <div class="row">

                    <div class="col">
                        <div class="card" style="background-color: #ff4f4f;">
                            <div class="card-body border-0 text-center  ">
                                <h2 style="color: #ffffff;">Jumlah Booth</h2>
                                @foreach ($bio as $key)
                                <h2 style="color: #ffffff;"><strong>{{$key->id}}</strong></h2>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="background-color: #E52D27;">
                            <div class="card-body border-0 text-center ">
                                <h2 style="color: #ffffff;">Jumlah User</h2>
                                @foreach ($user as $key)
                                <h2 style="color: #ffffff;"><strong>{{$key->id}}</strong></h2>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</main>

</html>
