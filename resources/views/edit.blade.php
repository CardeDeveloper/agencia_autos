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
        Agregar Auto
      </div>
    </h2>
    @foreach($general as $result)
    {!!Form::open(['url'=> '/auto/'.$result->id ,'method' => 'PUT', 'class' => 'ui large form','files'=>true])!!}
    
      <div class="ui stacked segment">
      <div class="field">
        {!!Form::text('nombre', $result->nombre, ['required'])!!}
      </div>
      <div class="field">
        {!!Form::number('modelo', $result->modelo, ['placeholder' => '1990','min' => '1900','max' => '2017','required'])!!}
      </div>
        <div class="field">
        {!!Form::text('color', $result->color, ['placeholder' => 'Color','required'])!!}
      </div>
      <div class="field">
        {!!Form::number('precio', $result->precio, ['placeholder' => 'precio','min' => '10000','max' => '1000000','required'])!!}
      </div>
      <div class="field">
        {!!Form::number('existencia', $result->existencia, ['placeholder' => 'Cantidad','min' => '1','required'])!!}
      </div>
      
        @endforeach
        <button type="submit" class="ui fluid black submit button">Actualizar</button>
       
      </div>

      <div class="ui error message"></div>

     {!!Form::close()!!}

    <div class="ui message">
      Cuidado Al cambiar los datos alteras todos las compras!!
    </div>
  </div>
</div>






@endsection