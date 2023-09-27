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
                        <i class=" h3 bi bi-chat-dots cursor_pointer" title="Chat" id="chat" name="chat"> &nbsp; </i>
                        <i class=" h3 bi bi-file-earmark-person cursor_pointer" title="Sheets" id="sheet" name="sheet" > &nbsp; </i>
                        <i class=" h3 bi bi-file-earmark-text cursor_pointer" title="Files" id="file" name="file" > &nbsp; </i>
                        <i class=" h3 bi bi-book cursor_pointer" title="Library" id="library" name="library" > &nbsp; </i>
                        <i class=" h3 bi bi-gear " title="Configs" id="config" name="config" > &nbsp;</i>
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
        
        $(document).ready(function(){
            talk();
        });

        $('#chat').on('click',function(){
            talk();
        });

        function talk(){
            $('#main_div').remove();
                $('#selection_menu').append(
                '<div id="main_div" name="main_div">'+
                '<ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">'+
                    '<li>'+
                            '<i class=" h5 fa-solid fa-comments cursor_pointer" title="Talk" id="talk" name="talk" onclick=talk() style="color: gray"> &nbsp; </i>'+
                            '<i class=" h5 fa-solid fa-dice cursor_pointer" title="Dice"  id="dice" name="dice" onclick=dice() style="color: gray"> &nbsp; </i>'+
                    '</li>'+
                    'talk'+
                '</ul>'+
                '</div>'
                );
        }

        function dice(){
            $('#main_div').remove();
                $('#selection_menu').append(
                    '<div id="main_div" name="main_div">'+
                    '<ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">'+
                    '<li>'+
                            '<i class=" h5 fa-solid fa-comments cursor_pointer" title="Talk" id="talk" name="talk" onclick=talk() style="color: gray"> &nbsp; </i>'+
                            '<i class=" h5 fa-solid fa-dice cursor_pointer" title="Dice" id="dice" name="dice" onclick=dice() style="color: gray"> &nbsp; </i>'+
                    '</li>'+
                    'dice'+
                '</ul>'+
                '</div>'
                );
        }

        $('#sheet').on('click',function(){
            $('#main_div').remove();

            $('#selection_menu').append(
            '<div id="main_div" name="main_div">'+
                '<ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">'+
                    '<li class="nav-item">'+
                        '<a href="#" class="nav-link align-middle px-0">'+
                            '<i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Holder</span>'+
                        '</a>'+
                    '</li>'+
                    '<li>'+
                        '<a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">'+
                            '<i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">AAAAAAAAAAAAAAn</span> </a>'+
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
            '</div>'
            );
        });

        $('#file').on('click',function(){
            $('#main_div').remove();

            $('#selection_menu').append(
            '<div id="main_div" name="main_div">'+
                '<ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">'+
                    '<li class="nav-item">'+
                        '<a href="#" class="nav-link align-middle px-0">'+
                            '<i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Holder</span>'+
                        '</a>'+
                    '</li>'+
                    '<li>'+
                        '<a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">'+
                            '<i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">CCC</span> </a>'+
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
            '</div>'
            );
        });

        $('#library').on('click',function(){
            $('#main_div').remove();

            $('#selection_menu').append(
            '<div id="main_div" name="main_div">'+
                '<ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">'+
                    '<li class="nav-item">'+
                        '<a href="#" class="nav-link align-middle px-0">'+
                            '<i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Holder</span>'+
                        '</a>'+
                    '</li>'+
                    '<li>'+
                        '<a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">'+
                            '<i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">AAAbAn</span> </a>'+
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
            '</div>'
            );
        });

        $('#config').on('click',function(){
            $('#main_div').remove();

            $('#selection_menu').append(
            '<div id="main_div" name="main_div">'+
                '<ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">'+
                    '<li class="nav-item">'+
                        '<a href="#" class="nav-link align-middle px-0">'+
                            '<i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Holder</span>'+
                        '</a>'+
                    '</li>'+
                    '<li>'+
                        '<a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">'+
                            '<i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">AAAbAn</span> </a>'+
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
            '</div>'
            );
        });


    </script>

</section>   
@endsection