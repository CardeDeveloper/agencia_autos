<!DOCTYPE html>

<html lang="es">
    <head >
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agencia</title>
        
        {!!Html::style('http://www.w3schools.com/lib/w3.css')!!}
        
       
      
        
      
        
    </head>
    <body>
<h1 style="text-align: center;">Agencia de Autos</h1>


<div >
  <div >
    <table class="w3-table w3-bordered">
  <thead>
    <tr><th>Auto</th>
    <th>Modelo</th>
    <th>Color</th>
    <th>Precio</th>
    <th>Cantidad</th>
   
  </tr></thead>
  <tbody>
    @foreach($array as $result)
    <tr>
      <td>
          <img style="width: 60px;" src="{{$result->imagen}}" >
          </td>
          <td>
            {{$result->nombre." ". $result->modelo}}
     </td>
       <td>
        {{$result->color}}
      </td>
       <td>
        ${{$result->precio}}
      </td>
      <td>
        {{$result->existencia}}
      </td>
    </tr>
    
    @endforeach
    
  </tbody>
</table>
  </div>
</div>

</body>
</html>


