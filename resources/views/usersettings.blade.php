@extends('template.master')
<title>Settings</title>
@section('content')
<section class="inner-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Account Settings</h2> <br> <br><br>
                            <i class="bi bi-pencil-square h5 text-secondary end-div" id="edit_profile" name="edit_profile"></i>
                        </div>
                        <div id="profileinfo" class="">
                            <p class="centered-div">Username: {{$user->name}}</p>
                            <p class="centered-div">Title: {{$user->titlepre}} {{$user->title}}</p>
                        </div>
                        <div id="profileedit" class="d-none">
                            <form method="POST" class="centered-div">
                                <input type="text" placeholder="Username" value="{{$user->name}}" title="Username">
                                <br>
                            </form>


                            <div class="custom-box" id="custom-box-0">
                                <select class="custom-select" id ="custom-select-0"> 

                                </select>
                                <button onclick="randomizeselection(0)"> Randomize <button>
                            </div>

                            <div class="custom-box" id="custom-box-1">
                                <select class="custom-select" id ="custom-select-1"> 

                                </select>
                                <button onclick="randomizeselection(1)"> Randomize <button>
                            </div>

                            <button onclick="confirmSelection()">Confirm</button>




                        </div> 
                    
                    


                <br>

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

</script>
    
<script>
    //
   // function shift(hide,show){
     //   $(hide).addClass('d-none');
    //    $(show).removeClass('d-none');
   // }

    function shift(hide, show) {
        hideElement = document.getElementById(hide);
        showElement = document.getElementById(show);
        hideElement.classList.add('d-none');
        showElement.classList.remove('d-none');
    }

</script>

<script>
// Title selection box

    document.addEventListener("DOMContentLoaded", function(){
        loadOptions(0);
        loadOptions(1);
        loadSelectedOption();
    });

    function loadOptions(boxIndex){
        //precisa de ajax aq pra pegar a opção selecionada do DB.
        fetch('get_options.php?value${boxIndex}')
            .then(response => response.json())
            .then(data =>{

                selectBox = document.getElementById('custom-select-${boxIndex}');
                selectBox.innerHTML = "";
                data.forEach(option => {
                    optionElement.value = option.id;
                    optionElement.textContent = option.title;
                    selectBox.appendChild(optionElement);
                });
            })
            .catch(error => console.error("Error fetching options: " + error));
    }

    function randomizeSelection(boxIndex){
        selectBox = document.getElementById('custom-select-${boxIndex}');
        options = selectBox.options;
        randomIndex = Math.floor(Math.random()*options.lenght);
        selectBox.selectedIndex = randomIndex;
    }

    function confirmSelection(){
        titlepre = document.getElementById("custom-select-0").value;
        title = document.getElementById("custom-select-1").value;
        //precisa de ajax aqui pra salvar as opcoes selecionadas no DB

        fetch("save_selected_options.php", {
            method: "POST",
            body: JSON.stringify({ titlepre, title}),
            headers: {
                "Content-type": "application/json"
            }
        })

        .then(response => response.json())
        .then(data => console.log("Selected options saved successfully: " +JSON.stringify(data)))
        .catch(error => console.error("Errir saving selected options: " +error));
    }
</script>



@endsection
