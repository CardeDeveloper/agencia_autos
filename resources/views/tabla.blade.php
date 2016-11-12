<tr>
      <td>
        <h4 class="ui image header">
          <img src="{{$result->imagen}}" class="ui mini rounded image">
          <div class="content">
            {{$result->nombre}}
            <div class="sub header">{{$result->modelo}}
          </div>
        </div>
      </h4></td>
       <td>
        {{$result->color}}
      </td>
       <td>
        ${{$result->precio}}
      </td>
      <td>
        {{$result->existencia}}
      </td>
      <td>
        <a href="/auto/{{$result->id}}/edit" class="ui button">editar</a>
      </td>
    </tr>