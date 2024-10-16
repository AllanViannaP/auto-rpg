@extends('template.master')

@section('title')
    <title>Library</title>
@endsection

@section('content')
<section class="inner-page">
    
    <?php $i=0; ?>
    @foreach($division as $holder)
        <div id="father_{{$i}}">
            <div class="d-flex mt-3 align-items-center ">
                <h3 style="margin-left: 2%; margin-bottom: 0%;" >{{$holder->division}}</h3>
                <i class="bi bi-plus-circle cursor_pointer" id="new_div_{{$i}}" data-bs-toggle="modal" data-bs-target="#newModal" style="margin-left: 2%"></i>
                <i class="bi bi-pencil-square cursor_pointer" id="edit_div_{{$i}}" data-bs-toggle="modal" data-bs-target="#editModal" style="margin-left: 1%"></i>
                @if($i != 0)
                    <i class="bi bi-trash3 cursor_pointer" id="trash_div_{{$i}}" onclick="delete({{$i}})" style="margin-left: 1%"></i>
                @endif
                
            </div>
            <div class=" col-md-6 mb-2 d-flex cursor_pointer" onclick="divisions_append({{$i}})">
                <hr class=" col-md-6"> 
                <i class="bi bi-arrow-down-circle" id="down_{{$i}}" style="margin-left: 5%"></i>
            </div>

            <div id="append_div_{{$i}}">
            </div>
        </div>
        <?php $i++; ?>
    @endforeach

    <div class="modal fade" id="fileModal" tabindex="-2" aria-labelledby="fileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-gradient-primary-to-secondary p-4">
                    <h4 class="modal-title font-alt text-white" id="fileModalLabel">Add files</h4>
                    <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action='{{ route("new_file") }}' enctype="multipart/form-data"> 
                    @csrf
                        <div class="d-flex align-items-center justify-content-center">
                            <input class="mt-3 mb-3 form-control" type="file" name="file_insert[]" id="file" onchange="check(this)" style="max-width:70%;" required/>
                        </div>

                        <div id="new_files" >
                            <div id="controller_files">
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-center ">
                            <i class="bi bi-file-earmark-plus" style="font-size: 30px" title="Add new file"  onclick="new_file()"></i>
                        </div>

                        <div class="d-flex align-items-center justify-content-center mt-3 mb-3">
                            <button type="submit" class="btn btn-primary">
                                Add files!
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="newModal" tabindex="-2" aria-labelledby="newModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-gradient-primary-to-secondary p-4">
                    <h4 class="modal-title font-alt text-white" id="newModallLabel">Add new division</h4>
                    <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                        <div class="form-group row mt-4 justify-content-center">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" maxlength="21" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-center mt-3 mb-3">
                            <button class="btn btn-primary" onclick="new_division()">
                                Create New Division
                            </button>
                        </div>
            </div>
        </div>
    </div>


</section>   

<script>

    function cleaner(div){
        $('input[type=file]').val('');
        $('#new_files').append(
            '<input hidden name="div_inp" value='+div+' required/>'
        );
    }

    function remove_file(div){
        $(div.parentElement).remove();
    }

    function new_file(){
        $('#new_files').append(
            '<div class="d-flex align-items-center justify-content-center" id="new_file_div">'+
                '<input class="mt-3 mb-3 form-control" type="file" onchange="check(this)" name="file_insert[]" id="file" style="max-width:70%;" required/>'+
                ' <i class="bi bi-trash3 p-4" title="Remove" onclick="remove_file(this)"></i>'+
            '</div>'
        );
    }

    function new_division(){
        var name = $('#name').val();
        $.ajax({headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('new_division') }}",
            type: "post",
            dataType: "json",
            data: {name:name},
            success: function(Response){
                if(Response){
                    window.location.reload()
                }
                else{
                    //swall alert here
                }
            }});
        }
    

    function check(file){
        const files = file.files;
        const fileName = files[0].name;
        $.ajax({headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('check_files') }}",
            type: "post",
            dataType: "json",
            data: {file:fileName},
            success: function(Response){
                console.log(Response);
                //Sweet alert for duplicated
            }});
        }

    function divisions_append(div){
        if(!$('#mother_'+div).length){
            $('#down_'+div).removeClass('bi bi-arrow-down-circle');
            $('#down_'+div).addClass('bi bi-arrow-down-circle-fill');

            $('#append_div_'+div).append(
                '<div id="mother_'+div+'"'+
                    '<div class="col-xl-1 col-md-6 mb-4">'+
                        '<div class="card card border-left-primary shadow h-100 py-2" style="justify-content:center;  text-align: center;">'+
                                '<a class="bi bi-plus-square size_10" data-bs-toggle="modal" data-bs-target="#fileModal" onclick="cleaner('+div+')"></a>'+
                                '<hr>'+
                                '<p>New File</p>'+
                        '</div>'+
                    '</div>'+
                '</div>')
        }
        else{
            $('#down_'+div).removeClass('bi bi-arrow-down-circle-fill');
            $('#down_'+div).addClass('bi bi-arrow-down-circle');
            $('#mother_'+div).remove();
        }
    }
    
</script>

@endsection