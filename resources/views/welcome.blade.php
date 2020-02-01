@extends('layouts.app')

@section('content')


<div class="container">

    <div class="jumbotron">
        <div class="row">
            <div class="col-7">

                <h1 class="display-4">Welcome!</h1>
                <p class="lead">This is Junior task for "Fast Invest" PHP developer role.</p>

                <p class="lead">To start application 
                    <a href="/login" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Log in</a>
                    or
                    <a href="/register" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Register</a>
                    to create accounts.
                </p>

                <p>
                    You can generate Database and fill it by yourself by typing to console: <b>php artisan migrate</b> <br>
                    Or you can import <i>fast_invest.sql</i> file to your database which will be added to main folder.
                </p>


                <hr class="my-4">
                <p>Created by Lukas Petkevičius</p>
                <p>2020-01-31</p>

            </div>

        <div class="col-1"></div>

        <div class="col-4">

            <ul class="list-group">
                <li class="list-group-item active">List of created accounts</li>
                <li class="list-group-item">laura@mail.com</li>
                <li class="list-group-item">john@mail.com</li>
                <li class="list-group-item">david@mail.com</li>
                <li class="list-group-item">sandra@mail.com</li>
                <li class="list-group-item text-muted">All accounts passwords: "password123"</li>
              </ul>

        </div>

    </div>
    </div>


</div>


@endsection