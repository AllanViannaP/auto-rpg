@extends('template.master')

@section('title')
    <title>Library</title>
@endsection

@section('content')
<section class="inner-page">
    



    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card card border-left-primary shadow h-100 py-2" style="justify-content:center;  text-align: center;">
                <a class="bi bi-plus-square size_10" data-bs-toggle="modal" data-bs-target="#fileModal"></a>
        </div>
    </div>


    <div class="modal fade" id="fileModal" tabindex="-2" aria-labelledby="fileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-gradient-primary-to-secondary p-4">
                    <h4 class="modal-title font-alt text-white" id="fileModalLabel">Add files</h4>
                    <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action='{{ route("new_file") }}' enctype="multipart/form-data"> 
                    @csrf
                        <div class="d-flex align-items-center ">
                            <input class="mt-3 mb-3 form-control" type="file" name="file_insert[]" id="file"  style="max-width:70%;" required/>
                        </div>

                        <div id="new_files">
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
</section>   

<script>
    function remove_file(div){
        $(div.parentElement).remove();
    }

    function new_file(){
        $('#new_files').append(
            '<div class="d-flex align-items-center" id="new_file_div">'+
                '<input class="mt-3 mb-3 form-control" type="file" name="file_insert[]" id="file" style="max-width:70%;" required/>'+
                ' <i class="bi bi-trash3 p-4" title="Remove" onclick="remove_file(this)"></i>'+
            '</div>'
        );
    }

    $('#file').change(function() {
                    $.ajax({headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ route('check_files') }}",
                        type: "post",
                        dataType: "json",
                        success: function(Response){

                        }});
                        
                        });
</script>

@endsection