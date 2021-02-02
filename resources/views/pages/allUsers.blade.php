@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row push-down">
      @include('inc.messages')
      <div class="fill">
        <h4 class="text-center">All Users</h4>
      </div>
      @if (Auth::user())
        <div class="col-12 bg-light pt-5 mb-5">
          <div class="row">
            <div class="col-10 offset-1">
              <form class="form" action="{{ action('UsersController@store') }}" method="post">
                @csrf
                <div class="mb-4" id="rowContainer">
                  <div class="form-row newPurchase mb-2">
                    <div class="col">
                      <input type="text" class="form-control @error('f_name') is-invalid @enderror" name="f_name" id="date" placeholder="First Name" value="{{ old('f_name') }}">
                        @error('f_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col">
                      <input type="text" class="form-control @error('s_name') is-invalid @enderror" name="s_name" id="s_name" placeholder="Surname" value="{{ old('s_name') }}">
                        @error('s_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col">
                      @php
                        $ports = App\Models\Portfolio::orderBy('title', 'asc')->get();
                      @endphp
                      <select class="form-control @error('portfolio') is-invalid @enderror" name="portfolio" id="portfolio" required autocomplete="portfolio" autofocus>
                        <option value="">{{ __('Choose Portfolio') }}</option>
                        @foreach ($ports as $port)
                          <option value="{{ $port->id }}">{{ ucwords($port->title) }}</option>
                        @endforeach
                      </select>
                      @error('portfolio')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-row newPurchase mb-2">
                    <div class="col">
                      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Valid Email Address">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col">
                      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                        @error('password')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                  </div>
                </div>
                <div class="col-12 col-md-10 offset-md-1">
                  <div class="row form-group">
                    <div class="col">
                      <button class="btn btn-primary btn-fill" name="genPassword" id="genPassword" type="button" onclick="makeid(10)">{{ __('Generate Password') }}</button>
                    </div>
                    <div class="col">
                      <button class="btn btn-success" style="width:100%" type="submit">Save User</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      @endif
      <div class="col-sm-12 col-md-10 offset-md-1">
        <div class="row">
          <div class="col-md-12 bg-blanche-box">
            @if (count($users)>0)
              <table class="table table-hover table-sm">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th class="sm-hide" scope="col">Portfolio</th>
                    <th class="sm-hide" scope="col">Locked</th>
                    <th scope="col">Reg. Date</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $a_user)
                    <tr onclick="window.location='/user/{{ $a_user->id }}'">
                      @php
                        $firstName = ($a_user->f_name == "NULL") ? '' : $a_user->f_name ;
                        $surName = ($a_user->s_name == "NULL") ? '' : $a_user->s_name ;
                        $port = App\Models\Portfolio::select('title')->where('id',$a_user->portfolio)->first();
                        $port = $port->title;
                        $locked = ($a_user->locked == 0) ? 'False' : 'True' ;
                      @endphp
                      <td>{{ ucwords($firstName." ".$surName) }}</td>
                      <td nowrap>{{ $a_user->email }}</td>
                      <td class="sm-hide">{{ ucwords($port) }}</td>
                      <td class="sm-hide">{{ $locked }}</td>
                      <td nowrap>{{ $a_user->created_at->format('d-M-Y') }}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                <div class="row">
                  <div class="mx-auto">
                    {{ $users->links() }}
                  </div>
                </div>
            @else
              <div style="padding-top:4%;" class="mx-auto center-c">
                <img src="/images/undraw_empty_street_sfxm.svg" alt="Nothing to show" class="img-fluid" width="200">
                <p class="no-object-found-msg">Oops! That's a shame. We found no such record.</p>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
