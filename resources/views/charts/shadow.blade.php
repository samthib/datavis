<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  
  <!-- Style of this chart -->
  <style media="screen">{!! $chart->css !!}</style>

  <!-- Libraries links for this chart -->
  @foreach ($chart->libraries as $key => $library)
    <script src="{!! $library->link !!}"></script>
  @endforeach
  
</head>
<body>


  <div id="graph">
    <!-- THE GRAPH WILL SHOW HERE -->
  </div>


  <!-- Script for this chart -->
  <script>{!! $chart->js !!}</script>

</body>
</html>