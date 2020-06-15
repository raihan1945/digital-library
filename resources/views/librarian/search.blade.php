@extends('layouts.librarian')

@section('title')
<title>{{ __('Search') }}</title>
@endsection

@section('content')
<div class="card-group">
  @foreach($book as $book)
    <div class="card">
      <img src="/book/cover/{{ $book->cover }}" class="card-img-top" alt="{{ $book ?? ''->title }}">
      <br>
      <a href="/book/{{ $book->content }}" class="btn btn-primary">{{ __('Read') }}</a>
      <br>
    </div>
  @endforeach
</div>
@endsection