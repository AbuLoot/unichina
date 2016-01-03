@extends('layout')

@section('content')

    <div class="bg-header">
      <div class="container">
        <h1 class="text-upp">{!! $landing->title !!}</h1><br>
        <p>{!! $landing->secondary !!}</p><br><br><br>

        <form action="" class="form-inline">
          <div class="form-group has-error">
            <input type="text" class="input-lg form-control" id="name" placeholder="Введите Имя">
          </div>
          <div class="form-group has-error">
            <input type="text" class="input-lg form-control" id="number" placeholder="Номер Телефона">
          </div>
          <button type="submit" class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-send"></span> Отправить Заявку</button>
        </form>
      </div>
    </div>

    <div class="container universities">
      <p class="h2">{!! $landing->title_for_universities !!}</p>
      <p class="h4 text-muted">{!! $landing->secondary_text_for_universities !!}</p>

      <div id="carousel-uni" class="carousel slide" data-ride="carousel" data-interval="false">
        <div class="carousel-inner" role="listbox">
          @foreach($universities->chunk(3) as $key => $chunk)
            <div class="row item {{ ($key == 0) ? 'active' : null }}">
              @foreach($chunk as $university)
                <div class="col-xs-4 col-md-4">
                  <div class="thumbnail">
                    <img src="/img/universities/{{ $university->image }}" alt="...">
                  </div>
                  <h4>{{ $university->title }}</h4>
                  <p class="text-muted"><span class="glyphicon glyphicon-map-marker"></span> {{ $university->map }}</p>
                  <p>{{ $university->meta_description }}</p>
                </div>
              @endforeach
            </div>
          @endforeach
        </div>

        <!-- Controls -->
        <a class="left carousel-uni-control hidden-xs" href="#carousel-uni" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-uni-control hidden-xs" href="#carousel-uni" role="button" data-slide="next">
          <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

        <!-- Indicators -->
        <ol class="carousel-indicators">
          @foreach($universities->chunk(3) as $key => $chunk)
            <li data-target="#carousel-uni" data-slide-to="{{ $key }}" {{ ($key == 0) ? 'class="active"' : null }}></li>
          @endforeach
        </ol>
      </div>
    </div>

    <div class="programs">
      <div class="container">
        {!! $landing->programs !!}
        <div class="clearfix"></div>
      </div>
    </div>

    <div class="reviews">
      <div class="container">

        <h2>Отзывы Наших Студентов</h2><br>

        <div class="row">
          <div class="col-md-4 col-xs-12">
            <div class="panel panel-default">
              <div class="panel-body">
                <p class="review">"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
                <h4><span class="glyphicon glyphicon-user"></span> <a href="#">Arman Zholdasbekov</a></h4>
                <p class="text-muted"><span class="glyphicon glyphicon-map-marker"></span> China, Pekin</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-xs-12">
            <div class="panel panel-default">
              <div class="panel-body">
                <p class="review">"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
                <h4><span class="glyphicon glyphicon-user"></span> <a href="#">Arman Zholdasbekov</a></h4>
                <p class="text-muted"><span class="glyphicon glyphicon-map-marker"></span> China, Pekin</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-xs-12">
            <div class="panel panel-default">
              <div class="panel-body">
                <p class="review">"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
                <h4><span class="glyphicon glyphicon-user"></span> <a href="#">Arman Zholdasbekov</a></h4>
                <p class="text-muted"><span class="glyphicon glyphicon-map-marker"></span> China, Pekin</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row hidden-xs">
          <div class="col-md-4 col-xs-12">
            <div class="panel panel-default">
              <div class="panel-body">
                <p class="review">"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
                <h4><span class="glyphicon glyphicon-user"></span> <a href="#">Arman Zholdasbekov</a></h4>
                <p class="text-muted"><span class="glyphicon glyphicon-map-marker"></span> China, Pekin</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-xs-12">
            <div class="panel panel-default">
              <div class="panel-body">
                <p class="review">"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
                <h4><span class="glyphicon glyphicon-user"></span> <a href="#">Arman Zholdasbekov</a></h4>
                <p class="text-muted"><span class="glyphicon glyphicon-map-marker"></span> China, Pekin</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-xs-12">
            <div class="panel panel-default">
              <div class="panel-body">
                <p class="review">"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
                <h4><span class="glyphicon glyphicon-user"></span> <a href="#">Arman Zholdasbekov</a></h4>
                <p class="text-muted"><span class="glyphicon glyphicon-map-marker"></span> China, Pekin</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="advantages">
      <div class="container">
        {!! $landing->three_steps !!}

        <br><br>
        <h3 class="h1">Начни Сейчас</h3><br>
        <div class="row">
          <div class="col-md-4 hidden-xs">
            <br><br><br>
            <p class="look-at-form"><span class="glyphicon glyphicon-share-alt"></span></p>
          </div>
          <div class="col-md-4 col-xs-10">
            <form class="form-horizontal">
              <div class="form-group">
                <input type="password" class="input-lg form-control" id="name" placeholder="Введите имя">
              </div>
              <div class="form-group">
                <input type="text" class="input-lg form-control" id="number" placeholder="Введите номер телефона">
              </div>
              <div class="form-group">
                <input type="email" class="input-lg form-control" id="email" placeholder="Введите Email">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-lg btn-block btn-success"><span class="glyphicon glyphicon-send"></span> Начать</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="certificates">
      <div class="container">
        <h3 class="h1">Сертификаты</h3><br>
        <div class="row">
          <div class="col-md-3 col-xs-6">
            <img src="/bower_components/bootstrap/dist/img/certificate.jpg" class="img-responsive">
          </div>
          <div class="col-md-3 col-xs-6">
            <img src="/bower_components/bootstrap/dist/img/certificate.jpg" class="img-responsive">
          </div>
          <div class="col-md-3 col-xs-6">
            <img src="/bower_components/bootstrap/dist/img/certificate.jpg" class="img-responsive">
          </div>
          <div class="col-md-3 col-xs-6">
            <img src="/bower_components/bootstrap/dist/img/certificate.jpg" class="img-responsive">
          </div>
        </div>
      </div>
    </div>

@endsection
