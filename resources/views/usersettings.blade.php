@extends('template.master')
<title>Settings</title>
@section('content')
<section class="inner-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Account Settings</h1>
                <div class="card">

                    <div class="card-header">
                        <div class="h3">My Profile 
                                <i class="bi bi-pencil-square h5" style="color: grey" id="edit_profile" name="edit_profile"></i>
                        </div>
                        
                    </div>

                    <div class="card-body">
                        <div id="profileinfo" class="">
                            <p>Username: {{$user->name}}</p>
                            <p>Title: {{$user->titlepre}} {{$user->title}}</p>
                        </div>

                        <div id="profileedit" class="d-none">
                            aaaaaaaaaaaaaaaaaaaaaaaa
                            <form method="POST">   
                                <input type="text" placeholder="Username" value="{{$user->name}}" title="Username">      
                            </form>
                        </div> 
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
    </div>
</section>


<script>
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

</script>
@endsection
