@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row push-down">
      @include('inc.messages')
      <div class="fill">
        <h4 class="text-center">New Task</h4>
      </div>
      <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
        <form class="form" action="{{ action('TasksController@store') }}" method="post">
          @csrf
          <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-form-label-sm" for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="col-form-label-sm" for="status">Status</label>
                <select class="form-control @error('status') is-invalid @enderror" name="status" id="status" required autocomplete="status" autofocus>
                  <option value="pending">Pending</option>
                  <option value="completed">Completed</option>
                  <option value="suspended">Suspended</option>
                </select>
                @error('status')
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
                <label class="col-form-label-sm" for="title">Task Description</label>
                <textarea name="description" rows="6" id="description" class="form-control @error('description') is-invalid @enderror textarea">{{ old('description') }}</textarea>
                @error('description')
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
                  <button class="btn btn-success btn-fill" name="addTask" id="addTask" role="submit"><span class="icon-save"></span> &nbsp;&nbsp;{{ __('Add Task') }}</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
