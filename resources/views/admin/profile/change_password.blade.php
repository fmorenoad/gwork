@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Administración</h1>
@stop

@section('content')

<div class="container-fluid">

    
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Mi Perfil - Cambio de Contraseña') }}
                    
                </div>
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                          <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                    
                          <h3 class="profile-username text-center">Nina Mcintire</h3>
                    
                          <p class="text-muted text-center">Software Engineer</p>
                    
                          <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                              <b>Followers</b> <a class="pull-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                              <b>Following</b> <a class="pull-right">543</a>
                            </li>
                            <li class="list-group-item">
                              <b>Friends</b> <a class="pull-right">13,287</a>
                            </li>
                          </ul>
                    
                          <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                        </div>
                        <!-- /.box-body -->
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')

@stop

@section('js')

@stop