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
        Venta
      </div>
    </h2>
    {!!Form::open(['url'=> 'venta' ,'method' => 'POST', 'class' => 'ui large form'])!!}
    
      <div class="ui stacked segment">
      <div class="field">
        <select name="auto" style="z-index: 100;" class="ui search selection dropdown" id="search-select" required>
        </select>
      </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="email" name="usuario" placeholder="Email" value="{{Auth::user()->email}}" required disabled>
          </div>
        </div>
        
        <button type="submit" class="ui fluid black submit button">vender</button>
       
      </div>

      <div class="ui error message"></div>

     {!!Form::close()!!}
 @if (Session::has('errors'))
      <div class="ui error visible message">
  <i class="close icon"></i>
  <div class="header">
    hubo errores:
  </div>
  <ul class="list">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif


 @if (Session::has('status'))
      <div class="ui success visible message">
  <i class="close icon"></i>
  <div class="header">
    Se realizo:
  </div>
  <ul class="list">
    
        <li> {{ session('status') }}</li>
    
  </ul>
</div>
@endif

    <div class="ui message">
      Una vez Efectuada la venta no puede cancelarse!
    </div>
 
</div>
</div>