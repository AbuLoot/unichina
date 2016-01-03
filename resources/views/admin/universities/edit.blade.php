@extends('admin.layout')

@section('content')

  <h3>Редактирование страницы</h3>
  <form action="{{ route('admin.universities.update', $university->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
    <input name="_method" type="hidden" value="PUT">
    {!! csrf_field() !!}
    <div class="form-group">
      <div class="col-md-offset-3 col-md-9">
        @include('partials.alerts')
      </div>
    </div>
    <div class="form-group">
      <label for="sort_id" class="col-md-3">Номер</label>
      <div class="col-md-9">
        <input type="text" class="form-control" id="sort_id" name="sort_id" minlength="3" maxlength="60" value="{{ $university->sort_id }}" required>
      </div>
    </div>
    <div class="form-group">
      <label for="title" class="col-md-3">Название</label>
      <div class="col-md-9">
        <input type="text" class="form-control" id="title" name="title" minlength="3" maxlength="60" value="{{ $university->title }}" required>
      </div>
    </div>
    <div class="form-group">
      <label for="slug" class="col-md-3">URI</label>
      <div class="col-md-9">
        <input type="text" class="form-control" id="slug" name="slug" minlength="3" maxlength="60" value="{{ $university->slug }}">
      </div>
    </div>
    <div class="form-group">
      <label for="image" class="col-md-3">Картинка университета</label>
      <div class="col-md-4">
        <input type="file" name="image" id="image">
      </div>
      <div class="col-md-5">
        <img src="{{ url('img/universities/'.$university->image) }}" class="img-responsive">
      </div>
    </div>
    <div class="form-group">
      <label for="meta_title" class="col-md-3">Мета название</label>
      <div class="col-md-9">
        <input type="text" class="form-control" id="meta_title" name="meta_title" maxlength="255" value="{{ $university->meta_title }}">
      </div>
    </div>
    <div class="form-group">
      <label for="meta_description" class="col-md-3">Мета описание</label>
      <div class="col-md-9">
        <input type="text" class="form-control" id="meta_description" name="meta_description" maxlength="255" value="{{ $university->meta_description }}">
      </div>
    </div>
    <div class="form-group">
      <label for="summernote" class="col-md-3">Текст</label>
      <div class="col-md-9">
        <textarea class="form-control" id="summernote" name="text" rows="10" maxlength="2000">{{ $university->text }}</textarea>
      </div>
    </div>
    <div class="form-group">
      <label for="map" class="col-md-3">Адрес</label>
      <div class="col-md-9">
        <input type="text" class="form-control" id="map" name="map" maxlength="255" value="{{ $university->map }}">
      </div>
    </div>
    <div class="form-group">
      <label for="status" class="col-md-3">Язык</label>
      <div class="col-md-9">
        <select class="form-control" name="lang">
          @foreach(trans('lang.languages') as $key => $language)
            @if ($key == $university->lang)
              <option value="{{ $key }}" selected>{{ $language }}</option>
            @else
              <option value="{{ $key }}">{{ $language }}</option>
            @endif
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="status" class="col-md-3">Статус</label>
      <div class="col-md-9">
        <label>
          <input type="checkbox" id="status" name="status" {{ ($university->status == 1) ? 'checked' : null }}> Активен
        </label>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-9 col-md-offset-3">
        <button type="submit" class="btn btn-primary">Сохранить</button>
      </div>
    </div>
  </form>
@endsection

@section('styles')
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.7.1/summernote.css" rel="stylesheet">
@endsection

@section('scripts')
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.7.1/summernote.js"></script>
  <script>
    $(document).ready(function() {
      $('#summernote').summernote({
        height: 200,
      });
    });
  </script>
@endsection