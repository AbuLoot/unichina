@extends('admin.layout')

@section('content')
          <h1 class="page-header">Страницы</h1>

          <div>
            <a href="{{ route('admin.pages.create') }}" class="btn btn-success">Добавить</a>
          </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>URI</th>
                  <th>Название</th>
                  <th>Статус</th>
                  <th>Язык</th>
                  <th class="text-right">Функции</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($pages as $page)
                  <tr>
                    <td>{{ $page->sort_id }}</td>
                    <td>{{ $page->slug }}</td>
                    <td>{{ $page->title }}</td>
                    @if ($page->status == 1)
                      <td class="success">Активен</td>
                    @else
                      <td class="danger">Неактивен</td>
                    @endif
                    <td>{{ trans('lang.languages.'.$page->lang) }}</td>
                    <td class="text-right">
                      <a class="btn btn-primary btn-xs" href="{{ url($page->slug) }}" title="Просмотр страницы" target="_blank"><span class="glyphicon glyphicon-file"></span></a>
                      <a class="btn btn-primary btn-xs" href="{{ route('admin.pages.edit', $page->id) }}" title="Редактировать"><span class="glyphicon glyphicon-edit"></span></a>
                      <form method="POST" action="{{ route('admin.pages.destroy', $page->id) }}" accept-charset="UTF-8" class="btn btn-xs">
                        <input name="_method" type="hidden" value="DELETE">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Удалить запись ({{ $page->title }})?')"><span class="glyphicon glyphicon-trash"></span></button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="5">Нет записи</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
@endsection