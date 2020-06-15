@extends('layouts.admin')

@section('title')
<title>{{ __('List of books') }}</title>
@endsection
@section('isi')
<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">{{ __('List of books') }}</h1>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">{{ __('List of books') }}</h6>
  </div>
  <div class="card-body">
  <a href=" {{ route('admin.addbooks') }}"class="btn btn-success">{{ __('Add Book') }}</a>
  @if (session('status'))
    <div class="alert alert-success text-center" role="alert">
      {{ session('status') }}
    </div>
  @endif
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" id="table_librarians">
        <thead>
          <tr>
            <th>{{ __('ID') }}</th>
            <th>{{ __('Title') }}</th>
            <th>{{ __('Cover') }}</th>
            <th>{{ __('Synopsis') }}</th>
            <th>{{ __('Author') }}</th>
            <th>{{ __('Content') }}</th>
            <th>{{ __('Date Added') }}</th>
            <th>{{ __('Custom') }}</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>{{ __('ID') }}</th>
            <th>{{ __('Title') }}</th>
            <th>{{ __('Cover') }}</th>
            <th>{{ __('Synopsis') }}</th>
            <th>{{ __('Author') }}</th>
            <th>{{ __('Content') }}</th>
            <th>{{ __('Date Added') }}</th>
            <th>{{ __('Custom') }}</th>
          </tr>
        </tfoot>
        <tbody>
        @foreach($data as $book)
          <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->title }}</td>
            <td>
            <div class="d-flex flex-row flex-nowrap">
              <div class="img img-responsive">
                <img class="img img-fluid" src="/book/cover/{{ $book->cover }}">
              </div>
            </div>
            </td>
            <td>{{ $book->synopsis }}</td>
            <td>{{ $book->author }}</td>
            <th>{{ $book->content }}</th>
            <td>{{ date('d-m-Y', strtotime($book->created_at)) }}</td>
            <td>
              <form action="{{ route('admin.deletebook',$book->id) }}" method="POST">
                <a href="/book/{{ $book->content }}"class="btn btn-success">{{ __('View') }}</a>
                <a href=" {{ route('admin.editbook',$book->id) }}"class="btn btn-primary">{{ __('Edit') }}</a>
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="hidden"name="id"value="{{ $book->id }}">
                <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
              </form>
            </td> 
          </tr>
        @endforeach
          </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>
@endsection