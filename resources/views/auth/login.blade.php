@extends('master')
@section('css')
<style type="text/css">
    body {
      background-color: #DADADA !important;
    }
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }
  </style>
@endsection
@section('body')



<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui black image header">
      <img src="{{url('img/logo.png')}}" class="image">
      <div class="content">
        Inicia Sesion
      </div>
    </h2>
    {!!Form::open(['url'=> '/auth/login' ,'method' => 'POST', 'class' => 'ui large form'])!!}
    
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="mail icon"></i>
            <input type="email" name="email" placeholder="Email" min="6" required>
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Contraseña" minlength="6" required>
          </div>
        </div>
        <button type="submit" class="ui fluid black submit button">Entrar</button>
       
      </div>

      @if (Session::has('errors'))
      <div class="ui error visible message">
  <i class="close icon"></i>
  <div class="header">
    hubo errores en el registro
  </div>
  <ul class="list">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

     {!!Form::close()!!}

    <div class="ui message">
      No estas Registrado? <a href="{{url('auth/register')}}">Registrate</a>
    </div>
  </div>
</div>






@endsection