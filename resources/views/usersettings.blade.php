@extends('template.master')
<title>Settings</title>
@section('content')
<section class="inner-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Account Settings</h1>
                <div class="card">
                    <div class="card-header"> <h4>My Profile </h4>
                    </div>
                    <div class="card-body">
                        <div id="profileinfo" hidden>
                            <p>Username: {{$user->name}}</p>
                            <p>Title: {{$user->titlepre}} {{$user->title}}</p>
                            <button onclick> 
                        </div>
                        <div id="profileedit" hidden>
                            <form method="POST">                    
                            </form>
                        </div>
                    
                            
                    </div> 
                </div>  <br>
                <div class="card">
                    <div class="card-header"> Account info </div>
                    <div class="card-body"> 
                    <div> Email: {{$user->email}} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
