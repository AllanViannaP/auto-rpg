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
                                <label for="text">Username: </label>  
                                <input type="text" placeholder="Username" value="{{$user->name}}" title="Username">
                                <br>
                                <center> Title </center>
                                <select value="{{$user->titlepre}}" id="titlepre" name="titlepre">
                                    <option value="Awkward">Awkward</option>    
                                    <option value="Beginner">Beginner</option>
                                    <option value="Brave">Brave</option>
                                    <option value="Chunky">Chunky</option>
                                    <option value="Chaotic">Chaotic</option> 
                                    <option value="Clumsy">Clumsy</option>
                                    <option value="Confused">Confused</option>
                                    <option value="Crazy">Crazy</option>
                                    <option value="Cunning">Cunning</option>
                                    <option value="Determined">Determined</option>
                                    <option value="Devilish">Devilish</option>
                                    <option value="Dumb">Dumb</option>
                                    <option value="Erratic">Erratic</option>
                                    <option value="Fluffy">Fluffy</option>
                                    <option value="Friendzoned">Friendzoned</option>
                                    <option value="Good">Good</option>
                                    <option value="Lawful">Lawful</option>  
                                    <option value="Lost">Lost</option>
                                    <option value="Lumbering">Lumbering</option>
                                    <option value="Majestic">Majestic</option>
                                    <option value="Merciful">Merciful</option>
                                    <option value="Merciless">Merciless</option>
                                    <option value="Neutral">Neutral</option>
                                    <option value="Nimble">Nimble</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Plain">Plain</option>
                                    <option value="Popular">Popular</option>
                                    <option value="Purring">Purring</option>
                                    <option value="Ruthless">Ruthless</option>
                                    <option value="Silly">Silly</option>
                                    <option value="Smart">Smart</option>
                                    <option value="Special">Special</option>
                                    <option value="Unidentified">Unidentified</option>
                                    <option value="Worrisome">Worrisome</option>
                                </select>

                                <select value="{{$user->title}}" id="title" name="titlepre">
                                    <option value="Aasimar">Aasimar</option>    
                                    <option value="Adventurer">Adventurer</option>
                                    <option value="Ant">Ant</option>
                                    <option value="Arsonist">Arsonist</option>
                                    <option value="Barbarian">Barbarian</option>
                                    <option value="Cat">Cat</option>
                                    <option value="Candy">Candy</option>
                                    <option value="Centaur">Centaur</option>
                                    <option value="Cleric">Cleric</option> 
                                    <option value="Combatant">Combatant</option>
                                    <option value="Creature">Creature</option>
                                    <option value="Dog">Dog</option>
                                    <option value="Dragonborn">Dragonborn</option>
                                    <option value="Dungeon Master">Dungeon Master</option> 
                                    <option value="Dwarf">Dwarf</option>
                                    <option value="Eagle">Eagle</option>
                                    <option value="Elf">Elf</option>
                                    <option value="Enemy">Enemy</option>
                                    <option value="Fairy">Fairy</option>
                                    <option value="Firbolg">Firbolg</option>
                                    <option value="Friend">Friend</option>
                                    <option value="Goblin">Goblin</option>
                                    <option value="Goliath">Goliath</option>
                                    <option value="Half-elf">Half-elf</option>
                                    <option value="Half-orc">Half-orc</option>
                                    <option value="Human">Human</option>
                                    <option value="Investigator">Investigator</option>
                                    <option value="Kenku">Kenku</option>
                                    <option value="Leader">Leader</option>
                                    <option value="Mage">Mage</option>
                                    <option value="Master">Master</option> 
                                    <option value="Oaf">Oaf</option>
                                    <option value="Occultist">Occultist</option>
                                    <option value="Orc">Orc</option>
                                    <option value="Owl">Owl</option>
                                    <option value="Potato">Potato</option>
                                    <option value="Rogue">Rogue</option> 
                                    <option value="Scammer">Scammer</option>
                                    <option value="Shopkeeper">Shopkeeper</option>
                                    <option value="Snowflake">Snowflake</option>
                                    <option value="Sorcerer">Sorcerer</option>
                                    <option value="Specialist">Sorcerer</option>
                                    <option value="Tabaxi">Tabaxi</option>
                                    <option value="Thief">Thief</option>
                                    <option value="Tiefling">Tiefling</option>
                                    <option value="Warrior">Warrior</option>
                                    <option value="Weirdo">Weirdo</option>
                                    <option value="Wizard">Wizard</option>    
                                </select>
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
