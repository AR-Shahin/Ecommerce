@extends('layouts.frontend_master')
@section('title','Message')

@section('frontend_master_content')
<div class="contai">
        <img src="https://media.istockphoto.com/vectors/profile-placeholder-image-gray-silhouette-no-photo-vector-id1016744034?k=20&m=1016744034&s=612x612&w=0&h=kjCAwH5GOC3n3YRTHBaLDsLIuF8P3kkAJc9RvfiYWBY=" alt="Avatar" style="width:100%;">
        <p>Hello. How are you today?</p>
        <span class="time-right">11:00</span>
</div>

<div class="contai darker">
        <img src="https://media.istockphoto.com/vectors/profile-placeholder-image-gray-silhouette-no-photo-vector-id1016744034?k=20&m=1016744034&s=612x612&w=0&h=kjCAwH5GOC3n3YRTHBaLDsLIuF8P3kkAJc9RvfiYWBY=" alt="Avatar" class="right" style="width:100%;">
        <p>Hey! I'm fine. Thanks for asking!</p>
        <span class="time-left">11:01</span>
</div>

        <div class="contai">
        <img src="https://media.istockphoto.com/vectors/profile-placeholder-image-gray-silhouette-no-photo-vector-id1016744034?k=20&m=1016744034&s=612x612&w=0&h=kjCAwH5GOC3n3YRTHBaLDsLIuF8P3kkAJc9RvfiYWBY=" alt="Avatar" style="width:100%;">
        <p>Sweet! So, what do you wanna do today?</p>
        <span class="time-right">11:02</span>
        </div>

<div class="contai darker">
        <img src="https://media.istockphoto.com/vectors/profile-placeholder-image-gray-silhouette-no-photo-vector-id1016744034?k=20&m=1016744034&s=612x612&w=0&h=kjCAwH5GOC3n3YRTHBaLDsLIuF8P3kkAJc9RvfiYWBY=" alt="Avatar" class="right" style="width:100%;">
        <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
        <span class="time-left">11:05</span>
</div>
<div class="mt-3">
    <form action="">
        <textarea name="message" id="" cols="30" rows="5" class="form-control">

        </textarea>

        <button class="btn btn-success btn-sm mt-3">Send </button>
    </form>
</div>
@stop

@push('css')
<style>
.contai {
    border: 2px solid #dedede;
    background-color: #f1f1f1;
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
  }

  .darker {
    border-color: #ccc;
    background-color: #ddd;
  }

  .contai::after {
    content: "";
    clear: both;
    display: table;
  }

  .contai img {
    float: left;
    max-width: 60px;
    width: 100%;
    margin-right: 20px;
    border-radius: 50%;
  }

  .contai img.right {
    float: right;
    margin-left: 20px;
    margin-right:0;
  }

  .time-right {
    float: right;
    color: #aaa;
  }

  .time-left {
    float: left;
    color: #999;
  }
  </style>
@endpush
