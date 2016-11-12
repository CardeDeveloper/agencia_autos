
<div  class="ui top attached tabular menu">
  <a class="active item" data-tab="general">General</a>
  <a class="item" data-tab="modelo">Por Modelo</a>
  <a class="item" data-tab="precio">Por Precio</a>
</div>
<div class="ui bottom attached active tab segment" data-tab="general">
  <table class="ui unstackable table">
  <thead>
    <tr><th>Auto</th>
    <th>Color</th>
    <th>Precio</th>
    <th>Cantidad</th>
    <th>Accion</th>
    
  </tr></thead>
  <tbody>
    @foreach($general as $result)
    @include('tabla')
    @endforeach
    
  </tbody>
</table>
<div class="moviles">
<div class="ui center aligned container">
<a target="tab" href="/pdf/general" class="ui red icon fluid button">
  <i class="icon file pdf outline"></i> Generar PDF
</a>
</div>
</div>
</div>
<div class="ui bottom attached tab segment" data-tab="modelo">
  <table class="ui unstackable table">
  <thead>
    <tr><th>Auto</th>
     <th>Color</th>
    <th>Precio</th>
    <th>Cantidad</th>
    <th>Accion</th>
    
  </tr></thead>
  <tbody>
    @foreach($modelo as $result)
    @include('tabla')
    @endforeach
    
  </tbody>
</table>
<div class="moviles">
<div class="ui center aligned container">
<a target="tab" href="/pdf/modelo" class="ui red icon fluid button">
  <i class="icon file pdf outline"></i> Generar PDF
</a>
</div>
</div>
</div>
<div class="ui bottom attached tab segment" data-tab="precio">
  <table class="ui unstackable table">
  <thead>
    <tr><th>Auto</th>
     <th>Color</th>
    <th>Precio</th>
    <th>Cantidad</th>
    <th>Accion</th>
    
  </tr></thead>
  <tbody>
    @foreach($precio as $result)
    @include('tabla')
    @endforeach
    
  </tbody>
</table>
<div class="moviles">
<div class="ui center aligned container">
<a target="tab" href="/pdf/precio" class="ui red icon fluid button">
  <i class="icon file pdf outline"></i> Generar PDF
</a>
</div>
</div>
</div>