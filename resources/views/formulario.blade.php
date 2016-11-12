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

<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui black image header">
      <img src="{{url('img/logo.png')}}" class="image">
      <div class="content">
        Agregar Auto
      </div>
    </h2>
    {!!Form::open(['url'=> '/auto' ,'method' => 'POST', 'class' => 'ui large form','files'=>true])!!}
    
      <div class="ui stacked segment">
      <div class="field">
        {!!Form::text('nombre', null, ['placeholder' => 'Nombre','required'])!!}
      </div>
      <div class="field">
        {!!Form::number('modelo', null, ['placeholder' => '1990','min' => '1900','max' => '2017','required'])!!}
      </div>
        <div class="field">
        {!!Form::text('color', null, ['placeholder' => 'Color','required'])!!}
      </div>
      <div class="field">
        {!!Form::number('precio', null, ['placeholder' => 'precio','min' => '10000','max' => '10000000','required'])!!}
      </div>
      <div class="field">
        {!!Form::number('existencia', null, ['placeholder' => 'Cantidad','min' => '1','required'])!!}
      </div>
      <div class="field">
        {!!Form::file('imagen',  ['accept'=>'image/*','required'])!!}
      </div>
        
        <button type="submit" class="ui fluid black submit button">Agregar</button>
       
      </div>

      <div class="ui error message"></div>

     {!!Form::close()!!}

    <div class="ui message">
      Puedes verlos en la seccion Auto del menu
    </div>
 
</div>
</div>