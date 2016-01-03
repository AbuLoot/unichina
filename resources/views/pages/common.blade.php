@extends('layout')

@section('content')
    <div class="container page">
      <h3 class="h1">{{ $page->title }}</h3>
      {{ $page->text }}
    </div>
@endsection
