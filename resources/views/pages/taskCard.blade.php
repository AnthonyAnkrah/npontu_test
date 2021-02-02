@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row push-down">
      <div class="col-12 col-md-6 offset-md-3">
        @include('inc.messages')
      </div>
      <div class="col-md-10 offset-md-1 details-pane">
        <div class="d-block details-pane-inner">
          <table class="table table-borderless det-table">
            <tr class="d-none">
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
            <tr>
              <td class="data-md" colspan="1">{{$task->id}}</td>
              <td class="data-lg" colspan="4">{{ ucwords($task->title) }}</td>
              <td class="data-md" colspan="2">{{ ucwords($task->status) }}</td>
            </tr>
            <tr>
              <td class="label">Description</td>
              <td class="data" colspan="6" rowspan="3">{{ ucfirst($task->description) }}</td>
            </tr>
            <tr>
              <td class="label"></td>
            </tr>
            <tr>
              <td class="label"></td>
            </tr>
          </table>
        </div>
      </div>
      @php
        function strLimit($string, $limit){
          if (strlen($string) > $limit) {
            $string = substr($string, 0, $limit-3) . '...';
          }
          return $string;
        }
      @endphp
      @if (Auth::user())
        <div class="mx-auto center-c">
          <a href="/update/create/{{ $task->id }}" class="btn btn-info">New Milestone</a>
        </div>
      @endif
      <div class="col-sm-12 col-md-10 offset-md-1">
        <div class="row">
          <div class="col-md-12 bg-blanche-box">
            @php
              $allUpdates = \App\Models\Update::where('task_id',$task->id)->get();
            @endphp
            @if (count($allUpdates)>0)
              <table class="table table-hover table-sm">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Contributor</th>
                    <th scope="col">Completed</th>
                    <th scope="col">Uncompleted</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($allUpdates as $an_update)
                    <tr onclick="window.location='/update/{{ $an_update->id }}'">
                      @php
                        $contrib = \App\Models\User::select('f_name','s_name')->where('id',$an_update->updater)->first();
                      @endphp
                      <td>{{ ucwords($contrib->f_name." ".$contrib->s_name) }}</td>
                      <td>{{ ucfirst(strLimit($an_update->completed,35)) }}</td>
                      <td>{{ ucfirst(strLimit($an_update->uncompleted,35)) }}</td>
                      <td nowrap>{{ $an_update->created_at->format('d-M-Y') }}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
            @else
              <div style="padding-top:4%;" class="mx-auto center-c">
                <img src="/images/undraw_empty_street_sfxm.svg" alt="Nothing to show" class="img-fluid mx-auto center-c" width="500">
                <p class="no-object-found-msg">Oops! That's a shame. We found no such record.</p>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
