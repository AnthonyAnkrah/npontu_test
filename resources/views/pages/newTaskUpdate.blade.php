@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row push-down">
      @include('inc.messages')
      <div class="fill">
        <h4 class="text-center">Task Update</h4>
      </div>
      <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
        <form class="form" action="{{ action('UpdatesController@store') }}" method="post">
          @csrf
          <input type="hidden" name="updater" value="{{ Auth::user()->id }}">
          <div class="row">
            <div class="col-md-2">
              <div class="form-group row">
                <label class="col-form-label-sm" for="task_id">Task ID</label>
                <input type="text" class="form-control @error('task_id') is-invalid @enderror" name="task_id" id="task_id" value="{{ $task_id }}" readonly>
                @error('task_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label class="col-form-label-sm" for="task_title">Task Title</label>
                @php
                  $task_title = \App\Models\Task::select('title')->where('id',$task_id)->first();
                  $task_title = $task_title->title;
                @endphp
                <input type="text" class="form-control @error('task_title') is-invalid @enderror" name="task_title" id="task_title" value="{{ ucwords($task_title) }}" readonly>
                @error('task_title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label class="col-form-label-sm" for="curr_user">Updater</label>
                <input type="text" class="form-control @error('curr_user') is-invalid @enderror" name="curr_user" id="curr_user" value="{{ ucwords(\Auth::user()->f_name." ".substr(\Auth::user()->s_name,0,1).".") }}" readonly>
                @error('curr_user')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group row">
                <label class="col-form-label-sm" for="completed">Duties Completed</label>
                <textarea name="completed" rows="6" id="completed" class="form-control @error('completed') is-invalid @enderror textarea">{{ old('completed') }}</textarea>
                @error('completed')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group row">
                <label class="col-form-label-sm" for="uncompleted">Duties Unattended</label>
                <textarea name="uncompleted" rows="6" id="uncompleted" class="form-control @error('uncompleted') is-invalid @enderror textarea">{{ old('uncompleted') }}</textarea>
                @error('uncompleted')
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
                  <button class="btn btn-success btn-fill" name="addUpdate" id="addUpdate" role="submit"><span class="icon-save"></span> &nbsp;&nbsp;{{ __('Add Update') }}</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
