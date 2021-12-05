<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  
  <!-- Libraries styles links for this chart -->
  @foreach ($styles as $style)
  <link rel="stylesheet" href="{!! $style->link !!}">
  @endforeach
  
  <!-- Style of this chart -->
  <style media="screen">{!! $chart->css !!}</style>
  
</head>
<body>


  <div id="graph">
    <!-- THE GRAPH WILL SHOW HERE -->
  </div>


  <!-- Libraries scripts links for this chart -->
  @foreach ($scripts as $script)
      <script src="{!! $script->link !!}"></script>
  @endforeach

  <!-- Script for this chart -->
  <script>{!! $chart->js !!}</script>

</body>
</html>