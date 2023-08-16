@extends('template.master')

@section('title')
    <title>My games</title>
@endsection

@section('content')
<section class="inner-page">
    <div class="container">

        {{-- PLAYER ROOMS --}}
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h4 class="">Player Rooms</h4>
                @if(isset($player_rooms))
                    @foreach($player_rooms as $player_holder)
                    <div class="col-md-3">
                        <div class="card">
                            <?php
                            $text = $text="text-dark";
                            if($player_holder->bg == "bg-dark"){$text="text-white";}?>

                            <div class="card-header text-center {{$text}} {{$player_holder->bg}}">{{$player_holder->room_name}}</div>
                            <a class="text-center" href="{{route("/room/$player_holder->id")}}">Join</a>
                        </div>
                    </div>
                    @endforeach
                @endif
                <div class="col-md-2">
                    <div class="card">
                        <font size="10">
                            <center>
                            <a class="bi bi-plus-square" href="{{route("join_room")}}"></a>
                            </center>
                        </font>
                    </div>
                </div>
            </div>
        </div>

        {{-- GM ROOMS --}}
        <div class="row justify-content-center">
            <div class="col-md-10">
                    <h4>Play as Game Master</h4>
                <div class="card-columns" style="width: 13rem;">
                    @if(isset($gm_rooms))
                        @foreach($gm_rooms as $gm_holder)
                            <div class="card {{$gm_holder->bg}}">
                                <?php
                                $text = $text="link-light";
                                if($gm_holder->bg == "bg-light"){ $text="link-dark";}
                                ?>
                                <div class="card-body text-center">
                                    <br>
                                    <a class="card-text text-center {{$text}}" href="/room/{{$gm_holder->id}}">{{$gm_holder->room_name}}</a>
                                    <br><br>
                                </div>  
                            </div>
                        @endforeach
                    @endif
                    <div class="col-md-4">
                        <div class="card">
                            <font size="10">
                                <center>
                                    <a class="bi bi-plus-square" data-bs-toggle="modal" data-bs-target="#createModal"></a>
                                </center>
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
</section>   
@endsection