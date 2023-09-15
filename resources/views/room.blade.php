@extends('template.master')

@section('title')
    <title>{{$room->room_name}}</title>
@endsection

@section('content')
<section class="inner-page">




    <div class="container-fluid ">
        <div class="row flex-nowrap d-flex flex-sm-row-reverse">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <div class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <i class=" h3 bi bi-chat-dots" title="Chat" id="chat" name="chat" style="cursor: pointer"> &nbsp; </i>
                        <i class=" h3 bi bi-file-earmark-person" title="Sheets" id="sheet" name="sheet" style="cursor: pointer"> &nbsp; </i>
                        <i class=" h3 bi bi-file-earmark-text" title="Files" id="file" name="file" style="cursor: pointer"> &nbsp; </i>
                        <i class=" h3 bi bi-gear" title="Configs" id="config" name="config" style="cursor: pointer"> &nbsp;</i>
                    </div>
                        <div id="selection_menu" name="selection_menu">
                            
                        </div>
                </div>
            </div>
            <div class="col py-3">
                AAAAAAAAAAAAAAAAAAA
                @if($dm)
                    bbbbbbbbbbbb
                @else
                    cccccccccccccccc
                @endif
            </div>
        </div>
    </div>
            
    <script>
        $('#chat').on('click',function(){
            $('#selection_menu').append(
                '<ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">'+
        '<li class="nav-item">'+
            '<a href="#" class="nav-link align-middle px-0">'
                '<i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Holder</span>'+
            '</a>'+
        '</li>'+
        '<li>'+
            '<a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">'+
                '<i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Holder dropdown</span> </a>'+
            '<ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">'+
                '<li class="w-100">'+
                    '<a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 1 </a>'+
                '</li>'+
                '<li>'+
                    '<a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 2 </a>'+
                '</li>'+
            '</ul>'+
        '</li>'+
        '<li>'+
            '<a href="#" class="nav-link px-0 align-middle">'+
                ' <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Holder</span></a>'+
        '</li>'+
        '<li>'+
            '<a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">'+
                '<i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Holder Dropdown</span></a>'+
            '<ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">'+
                '<li class="w-100">'+
                    '<a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 1</a>'+
                '</li>'+
                '<li>'+
                    '<a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 2</a>'+
                '</li>'+
            '</ul>'+
        '</li>'+
        '<li>'+
            '<a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">'+
                '<i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Holder Dropdown</span> </a>'+
                '<ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">'+
                '<li class="w-100">'+
                    '<a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 1</a>'+
                '</li>'+
                '<li>'+
                    '<a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 2</a>'+
                '</li>'+
                '<li>'+
                    '<a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 3</a>'+
                '</li>'+
                '<li>'+
                    '<a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 4</a>'+
                '</li>'+
            '</ul>'+
        '</li>'+
        '<li>'+
            '<a href="#" class="nav-link px-0 align-middle">'+
                '<i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Holder</span> </a>'+
        '</li>'+
    '</ul>'+
        );
        });
    </script>

</section>   
@endsection