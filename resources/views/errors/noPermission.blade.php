@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row push-down">
      <div class="mx-auto my-auto center-c">
        <img src="/images/undraw_lost_bqr2.svg" alt="Permission denied" class="img-fluid" width="500">
        <p style="padding-top:2%;" class="no-object-found-msg">Oops! You will need backstage access for this page.<br>Try <a href="/login">Logging In</a> and try again.</p>
      </div>
    </div>
  </div>
@endsection
