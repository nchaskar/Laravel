<!DOCTYPE html>

@extends('layouts.app')

@section('content')
<div class="container col-md-12 col-sm-12">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
    <div class="">
    <div id="content" class="text-center" class="span12">
		<div align="center" class="horizontal-center" style="margin:auto 0;">
		<ul class="thumbnails list-unstyled">
    @foreach($vines as $val)
    <li class="span3 col-md-4 col-sm-4">
        <a href="<?php echo 'home/show/'.$val->id;  ?>" class="thumbnail plain">
            <img src="{{asset('assets/images/')}}/{{$val->image}}" alt="" width="100%" height="150">
            <h5>{{$val->name}}</h5>
            <p>{{$val->year}} {{$val->grapes}}<br>
            <i class="icon-globe"></i> {{$val->country}}</p>
        </a>
    </li>
    @endforeach
  </ul>
   
  </div>
  
  </div>

</div>
</div>

</div>
</div>
<div class="text-center">
  <div class="pagination"> {{ $vines->links() }} </div>
</div>
@stop



