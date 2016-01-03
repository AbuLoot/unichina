<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>UniChina</title>
    <meta name="author" content="Issayev Adilet">
    <meta name="description" content="">

    <!-- Bootstrap -->
    <link href="bower_components/bootstrap/dist/css/bootstrap-cerulean.min.css" rel="stylesheet">
    <link href="bower_components/bootstrap/dist/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <header class="header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <h2 class="logo">
              <span class="glyphicon glyphicon-education text-primary"></span> <a href="#">UniChina</a>
            </h2>
          </div>
          <div class="col-md-9 text-right">
            <nav class="nav-menu">
              @foreach($pages as $page)
                @if(Request::is($page->slug))
                  <a class="btn btn-primary">{{ $page->title }}</a>
                @else
                  <a class="btn btn-link" href="{{ url($page->slug) }}">{{ $page->title }}</a>
                @endif
              @endforeach

              <div class="btn-group" role="group">
                <button type="button" class="btn btn-default dropdown-toggle text-uppercase" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ App::getLocale() }} <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                  @foreach(trans('lang.languages') as $key => $language)
                    <li><a class="text-uppercase" href="{{ url('lang/'.$key) }}">{{ $language }}</a></li>
                  @endforeach
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </header>

    @yield('content')

    <footer class="footer">
      <div class="container">
        <p class="h1">Наши контактные данные</p><br>
        <div class="col-md-offset-1 col-md-10 text-center">
          <div class="col-md-4">
            <p class="h1"><span class="glyphicon glyphicon-map-marker"></span></p>
            <h4>050000, г.Алматы, ул.<br>Гоголя Фурманова,<br> офис 500</h4>
          </div>
          <div class="col-md-4">
            <p class="h1"><span class="glyphicon glyphicon-phone"></span></p>
            <h4>+7 727 555 66 77<br> +7 747 333 44 55</h4>
          </div>
          <div class="col-md-4">
            <p class="h1"><span class="glyphicon glyphicon-envelope"></span></p>
            <h4>info@unichina.kz<br> company@unichina.kz</h4>
          </div>
        </div>
      </div>
    </footer>
    <script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=AHPbDhkj1YuyOmViN4LNv5wplwDFKGrJ&width=100%&height=400&lang=ru_RU&sourceType=constructor"></script>

    <footer class="footer">
      <div class="container">
        <h4>© 2016 UniChina.kz</h4>
      </div>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>