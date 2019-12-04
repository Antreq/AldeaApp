@extends('admin.layout')

@section('content')
<h1> Bienvenido! </h1>
<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-md-6">
      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" src="/img/bg-img/gallery2.jpg" alt="User profile picture">
          </div>

          <h3 class="profile-username text-center">{{auth()->user()->name}}</h3>

          <p class="text-muted text-center">{{auth()->user()->getRoleNames()->implode(', ')}}</p>
          
                    <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Email</b> <a class="float-right">{{auth()->user()->email}}</a>
            </li>
            <li class="list-group-item">
              <b>Publicaciones</b> <a class="float-right">{{ auth()->user()->posts->count() }}</a>
            </li>
          </ul>

            <a href="{{route('admin.users.edit', auth()->user())}}" class="btn btn-primary btn-block"><b>Editar información</b></a>
        </div>
      </div>
    </div>
  </div>
</div>
@stop