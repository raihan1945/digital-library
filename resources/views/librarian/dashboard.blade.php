@extends('layouts.librarian')

@section('title')
    <title>Welcome to digital library</title>
@endsection

@section('content')
<div class="card bg-dark text-white">
  <img src="/picture/template/bg1.png" class="card-img" alt="backround">
  <div class="card-img-overlay">
<center style="padding-top: 150px !important;">
	<h3 class="text-white">{{ __('Digital library') }}<font-color="black"></h3>
    <h4 class="text-white">{{ __('Read wherever') }}</h4>
    <h4 class="text-white">{{ __('any time......') }}</h4>
</center>
  </div>
</div>
<h3>{{ __('New release:') }}</h3>
    <div class="card-group"style='margin-left: 40px;'>
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner"role="listbox">
          @foreach($books->chunk(3) as $book)
            <div class="card card-block carousel-item {{ $loop->first ? 'active' : '' }}">
              <div class="row">
              @foreach($book as $book)
                <div class="col-md-4">
                  <a href="{{ route ('librarian.bookdetails',$book->id) }}">
                    <img src="/book/cover/{{ $book->cover }}" class="card-img-top" alt="{{ $book->title }}">
                  </a>
                  </div>
              @endforeach
                </div>
            </div>
          @endforeach
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>
      </div>
    </div>
@endsection