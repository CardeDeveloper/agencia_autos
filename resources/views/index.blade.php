@extends('master')

@section('body')
<div class="ui top attached demo menu">
  <a id="toggleButton" class="item">
    <i class="sidebar icon"></i>
    Menu
  </a>
</div>
<div class="ui bottom attached ">
  <div class="ui labeled icon left inline vertical sidebar tabular menu uncover disabled">
    <a  data-tab="first" class="item active">
      <i class="home icon"></i>
      Inicio
    </a>
    <a  data-tab="second" class="item">
      <i class="block layout icon"></i>
      Formulario
    </a>
    <a  data-tab="third" class="item">
      <i class="car icon"></i>
      Autos
    </a>
    <a data-tab="four" class="item">
      <i class="line chart icon"></i>
      Estadisticas
    </a>
    <a class="item" href="logout">
      <i class="sign out icon"></i>
      Salir
    </a>
  </div>
  <div class="pusher dimmed">
    
      <h3 class="ui centered header"></h3>
      <p></p>
      <p></p>
      <p></p>
      <p></p>
      </div>

  <div class="ui bottom attached tab active" data-tab="first">
 @include('venta')
</div>
<div class="ui bottom attached tab" data-tab="second">
  @include('formulario')
</div>
<div class="ui bottom attached tab" data-tab="third">
  @include('autos')
</div>
<div class="ui bottom attached tab" data-tab="four">
 No hay material chavo!
</div>
</div>
@endsection
@section('js')
<script type="text/javascript">
$('.left.sidebar').first()
  .sidebar('attach events', '#toggleButton')
;
$('#toggleButton')
  .removeClass('disabled')
;
$('.menu .item').tab();
$('.ui.dropdown')
  .dropdown({
    apiSettings: {
      url: '//tcircle.local/api/{query}'
    }
  })
;
/* $('.dynamic.menu .item')
    .tab({
      apiSettings: {
        loadingDuration: 300
      },
      cache   : false,
      context : 'parent',
      auto    : true,
      history : false,
      path    : '/home'
    })
  ;*/
</script>
@endsection