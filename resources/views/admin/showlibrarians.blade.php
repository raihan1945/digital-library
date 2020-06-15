@extends('layouts.admin')

@section('title')
<title>{{ __('List of librarians') }}</title>
@endsection

@section('isi')
<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">{{ __('List of librarians') }}</h1>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">{{ __('List of librarians') }}</h6>
  </div>
  <div class="card-body">
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
            <th>{{ __('Profile') }}</th>
            <th>{{ __('Fullname') }}</th>
            <th>{{ __('Role ID') }}</th>
            <th>{{ __('E-mail') }}</th>
            <th>{{ __('Date of entry') }}</th>
            <th>{{ __('Verification date') }}</th>
            <th>{{ __('Status') }}</th>
            <th>{{ __('Custom') }}</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>{{ __('ID') }}</th>
            <th>{{ __('Profile') }}</th>
            <th>{{ __('Fullname') }}</th>
            <th>{{ __('Role ID') }}</th>
            <th>{{ __('E-mail') }}</th>
            <th>{{ __('Date of entry') }}</th>
            <th>{{ __('Verification date') }}</th>
            <th>{{ __('Status') }}</th>
            <th>{{ __('Custom') }}</th>
          </tr>
        </tfoot>
        <tbody>
        @foreach($data as $users)
          <tr>
            <td>{{ $users->id }}</td>
            <td>
            <div class="d-flex flex-row flex-nowrap">
              <div class="img img-responsive">
                <img class="img img-fluid rounded-circle" src="/picture/profile/{{ $users->avatar }}">
              </div>
            </div>
            </td>
            <td>{{ $users->name }}</td>
            <td>{{ $users->role_id }}</td>
            <td>{{ $users->email }}</td>
            <td>{{ date('d-m-Y', strtotime($users->created_at)) }}</td>
            <td>{{ date('d-m-Y', strtotime($users->email_verified_at)) }}</td>
            <td>
            @if($users->status == 1)
                <li class="text-success">
                  {{ __('Online') }}
                </li>
              @else
                <li class="text-muted">
                  {{ __('Offline') }}
                </li>
              @endif
            </td>
            <td>
              <form action="{{ route('admin.deletelibrarian',$users->id) }}" method="POST">
                <a href=" {{ route('admin.editlibrarian',$users->id) }}"class="btn btn-primary">{{ __('Edit') }}</a>
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="hidden"name="id"value="{{ $users->id }}">
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