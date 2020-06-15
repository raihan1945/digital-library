@extends('layouts.librarian')

@section('title')
    <title>List of books</title>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="booksmedia-detail-box">
        @foreach($book as $book)
          <div class="media">
            <div class=" col-xs-12 col-sm-5 col-md-3">
                  <div class="post-thumbnail">
                    <img src="/book/cover/{{ $book->cover }}" class="card-img-top" alt="{{ $book->title }}">
                </div>
            </div>
            <div class="media-body">
                <div class="post-center-content">
                    <h2>{{ $book->title }}</h2>
                    <p><strong>Author :</strong> {{ $book->author }}</p>
                    <div class="clearfix"></div>
                    <p><strong>Summary :</strong> {{ $book->synopsis }}</p>
                  <a href="/book/{{ $book->content }}" class="btn btn-primary">{{ __('Read') }}</a>
                </div>
            </div>
        </div><br>
        @endforeach
          </div>
        </div>
      </div>
    </div>
</div>
@endsection