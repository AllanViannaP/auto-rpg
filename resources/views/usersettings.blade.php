@extends('template.master')
<title>Settings</title>
@section('content')
<section class="inner-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Account Settings</h1>
                <div class="card">
                    <div class="card-header"> My Profile </div>
                    <div class="card-body">
                        <center>
                        <p>Username: {{$user->name}}</p>
                        <p>Title: {{$user->titlepre}} {{$user->title}}</p>
                        </center>
                    </div> 
                </div>
                <br>
                <div class="card">
                    <div class="card-header"> Account info </div>
                    <div class="card-body"> 
                    <div> Email: {{$user->email}} </div>
                    </div>
            </div>
        </div>
    </div>
</section>
@endsection
