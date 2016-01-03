@extends('admin.layout')

@section('content')

  <h3>Редактирование страницы</h3>
  <form action="{{ route('admin.landing.update', $page->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
    <input name="_method" type="hidden" value="PUT">
    {!! csrf_field() !!}
    <div class="form-group">
      <div class="col-md-offset-2 col-md-9">
        @include('partials.alerts')
      </div>
    </div>
    <div class="form-group">
      <label for="title" class="col-md-2">Заголовок</label>
      <div class="col-md-9">
        <input type="text" class="form-control" id="title" name="title" minlength="3" maxlength="255" value="{{ $page->title }}" required>
      </div>
    </div>
    <div class="form-group">
      <label for="secondary" class="col-md-2">Подзагаловок</label>
      <div class="col-md-9">
        <input type="text" class="form-control" id="secondary" name="secondary" minlength="3" maxlength="255" value="{{ $page->secondary }}" required>
      </div>
    </div><hr>
    <div class="form-group">
      <label for="title_for_universities" class="col-md-2">Загаловок для Университетов</label>
      <div class="col-md-9">
        <input type="text" class="form-control" id="title_for_universities" name="title_for_universities" minlength="3" maxlength="255" value="{{ $page->title_for_universities }}" required>
      </div>
    </div>
    <div class="form-group">
      <label for="secondary_text_for_universities" class="col-md-2">Подзагаловок для Университетов</label>
      <div class="col-md-9">
        <input type="text" class="form-control" id="secondary_text_for_universities" name="secondary_text_for_universities" maxlength="255" value="{{ $page->secondary_text_for_universities }}" required>
      </div>
    </div><hr>
    <div class="form-group">
      <label for="programs" class="col-md-2">Программа UniChina</label>
      <div class="col-md-9">
        <textarea class="form-control" id="programs" name="programs" rows="10">{{ $page->programs }}</textarea>
      </div>
    </div><hr>
    <div class="form-group">
      <label for="three_steps" class="col-md-2">Всего 3 Шага</label>
      <div class="col-md-9">
        <textarea class="form-control" id="three_steps" name="three_steps" rows="10">{{ $page->three_steps }}</textarea>
      </div>
    </div><hr>
    <div class="form-group">
      <label for="status" class="col-md-2">Язык</label>
      <div class="col-md-9">
        <select class="form-control" name="lang">
          @foreach(trans('lang.languages') as $key => $language)
            @if ($key == $page->lang)
              <option value="{{ $key }}" selected>{{ $language }}</option>
            @else
              <option value="{{ $key }}">{{ $language }}</option>
            @endif
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="status" class="col-md-2">Статус</label>
      <div class="col-md-9">
        <label>
          <input type="checkbox" id="status" name="status" {{ ($page->status == 1) ? 'checked' : null }}> Активен
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
