<!DOCTYPE html>

<html lang="es">
    <head >
         <!--  Meta Tags     -->
        
       
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agencia @yield('title')</title>
        
        
        <!--  CSS  -->
        @yield('css')
        <!--  Semantic UI      -->
        {!!Html::style('http://semantic-ui.com/dist/semantic.min.css')!!}
        
      
        
    </head>
    <body>
       @yield('body')
        
        
        <!--  JQuery      -->
        {!!Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.js')!!}
        <!--  Semantic UI      -->
         {!!Html::script('http://semantic-ui.com/dist/semantic.min.js')!!}
        <script type="text/javascript">
            $('.message .close')
  .on('click', function() {
    $(this)
      .closest('.message')
      .transition('fade')
    ;
  })
;
        </script>
        <!--  Scripts      -->
        @yield('js')
    </body>
</html>
