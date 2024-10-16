@extends('template.master')
<title>Settings</title>
@section('content')
<section class="inner-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Account Settings</h2> <br> <br><br>
                    <i class="bi bi-pencil-square h5 text-secondary end-div cursor_pointer" id="edit_profile" name="edit_profile"></i>
            </div>
            <div id="profileinfo" class="">
                <p class="centered-div">Username: {{$user->name}}</p>
                <p class="centered-div">Title: {{$atualpre->title}} {{$atualtitle->title}}</p>
            </div>
            <div id="profileedit" class="d-none">
                <form method="POST" action="{{route('profilesave')}}" class="centered-div">
                    @csrf
                        <input type="text" id="username" name="username" placeholder="Username" value="{{$user->name}}" title="Username">
                        <br>
                    <h4> Title </h4>
                    <div class="custom-box" id="custom-box-0">
                        
                        <select class="custom-select" id ="prefixtitle" name ="prefixtitle"> 
                            @foreach($pretitle as $pref)
                                
                                @if($pref->id==$user->titlepre)
                                    <option selected value="{{$pref->id}}">{{$pref->title}}</option>
                                @else
                                    <option value="{{$pref->id}}">{{$pref->title}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="custom-box" id="custom-box-1">
                        <select class="custom-select" id ="suffixtitle" name ="suffixtitle"> 
                            @foreach($title as $titles)
                                @if($titles->id==$user->title)
                                    <option selected value="{{$titles->id}}">{{$titles->title}}</option>
                                @else
                                    <option value="{{$titles->id}}">{{$titles->title}}</option>
                                @endif
                            @endforeach
                        </select>

                        <i class="bi bi-dice-5 cursor_pointer" onclick="randomtitles()"></i>
                    </div> <br><br>
                    <button type="SUBMIT">Confirm</button>
                </form>
            </div>
                    
                <br> <br>
            <div class="card">
                <div class="card-header"> Account info 
                    <i class="bi bi-pencil-square h5" style="color: grey" id="edit_info" name="edit_info"></i>
                </div>
                <div class="card-body">
                    <div id="accinfo" class="" class="centered-div"> 
                        <div> Email: {{$user->email}} </div>
                    </div>
                    <div id="accedit" class="d-none">
                        <form method="POST">
                            <label for="text">Email: </label>  
                            <input type="text" placeholder="myemail@email.com" value="{{$user->name}}" title="Email">
                            Criar confirmação de email
                            <br>
                        </form>
                        <div id="changepassbutton" class="">
                            <button type="button" onclick="shift('changepassbutton','passedit')">Change Password</button>
                        </div>
                        <div id="passedit" class="d-none">
                            <form method="POST">
                                <label for="currpassword">Current password: </label>  
                                <input type="text" title="currpassword" id="currpassword"> <br>
                                <label for="newpassword">New password: </label>  
                                <input type="text" title="newpassword" id="newpassword"><br>
                                <label for="confnewpassword">Confirm the new password: </label>  
                                <input type="text" title="confnewpassword" id="confnewpassword"><br>
                            </form>
                            <button type="button" onclick="shift('passedit','changepassbutton')">Cancel</button>
                            <button type="submit" onclick="">Confirm</button>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// ------------------User Settings Scripts------------------------------------
// Edit boxes
var check= 1;
$('#edit_profile').on('click',function(){
    if(check==1){
        $("#profileinfo").addClass('d-none');
        $("#profileedit").removeClass('d-none');
        check = 0;
    }
    else{
        $("#profileinfo").removeClass('d-none');
        $("#profileedit").addClass('d-none');
        check = 1;
    }
});
    var checki= 1;
$('#edit_info').on('click',function(){
    if(checki==1){
        $("#accinfo").addClass('d-none');
        $("#accedit").removeClass('d-none');
        checki = 0;
    }
    else{
        $("#accinfo").removeClass('d-none');
        $("#accedit").addClass('d-none');
        checki = 1;
    }
});

    function randomtitles(){
        pref =$("#prefixtitle")[0].childElementCount;
        suff =$("#suffixtitle")[0].childElementCount;
        
        check = Math.floor((Math.random() * (pref - 0)));
        checki = Math.floor((Math.random() * (suff - 0)));
        $("#prefixtitle option:eq("+check+")").prop('selected', true);
        $("#suffixtitle option:eq("+checki+")").prop('selected', true);
    }
</script>
@endsection
