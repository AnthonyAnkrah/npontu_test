@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row push-down">
      @include('inc.messages')
      <div class="fill">
        <h4 class="text-center">All Tasks</h4>
      </div>
      <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
        <form class="form" action="{{ route('findTask') }}" method="post">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-form-label-sm" for="search_value">Search Term</label>
                <input type="text" class="form-control @error('search_value') is-invalid @enderror" name="search_value" id="search_value" value="{{ old('search_value') }}" required autocomplete="search_value" autofocus placeholder="{{ __('Search Term') }}">
                @error('search_value')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="col-form-label-sm" for="search_param">Search by</label>
                <select class="form-control @error('search_param') is-invalid @enderror" name="search_param" id="search_param" required autocomplete="search_param" autofocus>
                  <option value="title">Title</option>
                  <option value="description">Description</option>
                </select>
                @error('search_param')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
          </div>
          <div class="row ">
            <div class="col-md-6 offset-md-3">
              <div class="form-group row">
                <div class="col">
                  <button class="btn btn-success btn-fill" disabled name="findTask" id="findTask" role="submit"><span class="icon-search"></span> &nbsp;&nbsp;{{ __('Find Task(s)') }}</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="col-sm-12 col-md-10 offset-md-1">
        <div class="row">
          <div class="col-md-12 bg-blanche-box">
            @if (count($allTasks)>0)
              <table class="table table-hover table-sm">
                <thead class="thead-light">
                  <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th class="sm-hide">Created By</th>
                    <th>Status</th>
                    <th class="sm-hide">Entry Date</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($allTasks as $a_task)
                    <tr onclick="window.location='/task/{{ $a_task->id }}'">
                      <td nowrap>{{ ucwords($a_task->title) }}</td>
                      <td>{{ ucfirst($a_task->description) }}</td>
                      <td class="sm-hide">{{ ucwords($a_task->status) }}</td>
                      @php
                        $creator = App\Models\User::select('f_name','s_name')->where('id',$a_task->created_by)->first();
                        $creator = substr($creator->f_name,0,1).". ".$creator->s_name;
                      @endphp
                    	<td nowrap>{{ ucwords($creator) }}</td>
                      <td class="sm-hide" nowrap>{{ date('d-M-Y', strtotime($a_task->created_at)) }}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                <div class="row">
                  <div class="mx-auto">
                    {{ $allTasks->links() }}
                  </div>
                </div>
            @else
              <div style="padding-top:4%;" class="mx-auto center-c">
                <img src="/images/undraw_empty_xct9.svg" alt="Nothing to show" class="img-fluid mx-auto center-c" width="500">
                <p class="no-object-found-msg">Oops! That's a shame. We found no such record.</p>
              </div>
            @endif
          </div>
        </div>
      </div>
      @if (Auth::user())
        <div class="mx-auto center-c">
          <a href="/task/create" class="btn btn-info">New Task</a>
        </div>
      @endif
    </div>
  </div>
@endsection
