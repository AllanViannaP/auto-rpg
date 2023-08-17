@extends('template.master')
<title>Settings</title>
@section('content')
<section class="inner-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Settings</h1>
                <div> Username: {{$user->name}} 
                </div>
                <div> Email: {{$user->email}}
                </div>
                

            </div>
        </div>
    </div>
</section>
@endsection
