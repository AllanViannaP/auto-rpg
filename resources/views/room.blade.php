@extends('template.master')

@section('title')
    <title>{{$room->room_name}}</title>
@endsection

@section('content')
<section class="inner-page">
    AAAAAAAAAAAAAAAAAAA
    
    @if($dm)
    bbbbbbbbbbbb
    @else
    cccccccccccccccc
    @endif

</section>   
@endsection