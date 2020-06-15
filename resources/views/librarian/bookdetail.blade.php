@extends('layouts.librarian')

@section('title')
    <title>{{ $books->title }}</title>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-body">
      <div class="booksmedia-detail-box">
        <div class="detailed-box">
            <div class="col-xs-12 col-sm-5 col-md-3">
                <div class="post-thumbnail">
                    <div class="book-list-icon blue-icon"></div>
                    <img src="/book/cover/{{ $books->cover }}" class="card-img-top" alt="{{ $books->title }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-7 col-md-6">
                <div class="post-center-content">
                    <h2>{{ $books->title }}</h2>
                    <p><strong>Author :</strong> {{ $books->author }}</p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        <p><strong>Summary :</strong> {{ $books->synopsis }}</p>
        <a href="/book/{{ $books->content }}" class="btn btn-primary">{{ __('Read') }}</a>
        </div>
      </div>
    </div>
</div>
@endsection