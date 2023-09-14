@extends('template.master')

@section('title')
    <title>My games</title>
@endsection

@section('content')
<section class="inner-page">
    <div class="container">
        <?php
        session_start();
        if (isset($_SESSION['room'])) {
            echo '<div class="alert alert-danger" style="margin-top : 20px;" role="alert">' . $_SESSION['room']['mensagem'] . '</div>';
            unset($_SESSION['room']);
        }
        ?>
        {{-- PLAYER ROOMS --}}

        <div class="row justify-content-center">
            <div class="col-md-10">
                <h4 class="">Player Rooms</h4>

                <div class="container-fluid mt-4">
                    <!-- Content Row -->
                    <div class="row">
                            @if(isset($player_rooms))
                                @foreach($player_rooms as $player_holder)
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <a class="card border-left-primary shadow h-100 py-2 {{$player_holder->bg}}" href="/{{$player_holder->code}}" style="text-decoration:none">
                                        <div class="card-body {{$player_holder->bg}}">
                                            <?php
                                                $text = $text="link-light";
                                                if($player_holder->bg == "bg-light"){ $text="link-dark";}
                                            ?>
                                            <div class="row no-gutters align-items-center" style="text-align: center;">
                                                <div class="col mr-2">
                                                    <div class="h4 text-xs font-weight-bold text-uppercase mb-1  {{$text}}">
                                                        {{$player_holder->room_name}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            @endif

                        <div class="col-xl-2 col-md-6 mb-4">
                            <div class="card card border-left-primary shadow h-100 py-2" style="justify-content:center;  text-align: center;">
                                <font size="10">
                                    <a class="bi bi-plus-square " data-bs-toggle="modal" data-bs-target="#joinModal"></a>
                                </font>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- GM ROOMS --}}
        <div class="row justify-content-center">
            <div class="col-md-10">
                    <h4>Play as Game Master</h4>

                <div class="container-fluid mt-4">
                    <!-- Content Row -->
                    <div class="row">
                    @if(isset($gm_rooms))
                        @foreach($gm_rooms as $gm_holder)
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a class="card border-left-primary shadow h-100 py-2 {{$gm_holder->bg}}" href="/{{$gm_holder->code}}" style="text-decoration:none">
                                <div class="card-body {{$gm_holder->bg}}">
                                    <?php
                                        $text = $text="link-light";
                                        if($gm_holder->bg == "bg-light"){ $text="link-dark";}
                                    ?>
                                    <div class="row no-gutters align-items-center" style="text-align: center;">
                                        <div class="col mr-2">
                                            <div class="h4 text-xs font-weight-bold text-uppercase mb-1 {{$text}}">
                                                {{$gm_holder->room_name}}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    @endif

                        <div class="col-xl-2 col-md-6 mb-4 ">
                            <div class="card card border-left-primary shadow h-100 py-2 align-center" style="justify-content:center;  text-align: center;">
                                <font size="10">
                                        <a class="bi bi-plus-square" data-bs-toggle="modal" data-bs-target="#createModal"></a>
                                </font>
                            </div>
                        </div>  

                    </div>   
                </div>
            </div>
        </div>

    <!-- Create Modal-->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-gradient-primary-to-secondary p-4">
                    <h4 class="modal-title font-alt text-white" id="createModalLabel">Create Room</h4>
                    <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action='{{ route("publish_room") }}'> 
                    @csrf
                    <div class="modal-body border-0 p-4">
                        <div class="form-group row mt-4">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="color" class="col-md-4 col-form-label text-md-right">Card color</label> 
                            <center>
                                <div>
                                    <input type="radio" id="color" name="color" value="bg-primary" checked />
                                    <label class="text-primary" for="color">Blue</label>
                                    <input type="radio" id="color" name="color" value="bg-secondary"/>
                                    <label class="text-secondary" for="color">Purple</label>
                                    <input type="radio" id="color" name="color" value="bg-success"/>
                                    <label class="text-success" for="color">Green</label>
                                    <input type="radio" id="color" name="color" value="bg-danger"/>
                                    <label class="text-danger" for="color">Red</label>

                                </div>
                                <div>
                                    <input type="radio" id="color" name="color" value="bg-warning"/>
                                    <label class="text-warning" for="color">Yellow</label>
                                    <input type="radio" id="color" name="color" value="bg-info"/>
                                    <label class="text-info" for="color">Cyan</label>
                                    <input type="radio" id="color" name="color" value="bg-light"/>
                                    <label class="text-dark" for="color">White</label>
                                    <input type="radio" id="color" name="color" value="bg-dark"/>
                                    <label class="text-dark" for="color">Black</label>
                                </div>
                            </center>    
                        </div>

                        <div class="form-group row mb-0 mt-4">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create Room
                                </button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- join Modal-->
    <div class="modal fade" id="joinModal" tabindex="-1" aria-labelledby="joinModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-gradient-primary-to-secondary p-4">
                    <h4 class="modal-title font-alt text-white" id="joinModalLabel">Join Room</h4>
                    <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action='{{ route("join_room") }}'> 
                    @csrf
                    <div class="modal-body border-0 p-4">
                        <div class="form-group row mt-4">
                            <label for="code" class="col-md-4 col-form-label text-md-right">ROOM CODE</label>
                            <div class="col-md-6">
                            <input id="code" type="text" class="form-control" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>
                            </div>

                            <div class="form-group row mb-0 mt-4">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Join Room
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>   
@endsection