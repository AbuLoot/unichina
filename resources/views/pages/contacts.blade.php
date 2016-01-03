@extends('layout')

@section('content')
    <div class="container page">
      <h3 class="h1">{{ $page->title }}</h3><br>

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
              <textarea class="input-lg form-control" placeholder="Сообщение"></textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-lg btn-block btn-success"><span class="glyphicon glyphicon-send"></span> Отправить Сообщение</button>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection
