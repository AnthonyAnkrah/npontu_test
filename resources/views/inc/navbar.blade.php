<header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
    @if (\Request::is('login') or \Request::is('register'))
    @else
      <div class="container-fluid text-right">
        <ul class="navbar-nav d-inline-flex upper-nav-cust">
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ ucwords(substr(Auth::user()->f_name,0,1).". ".Auth::user()->s_name) }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                  <a class="dropdown-item" href="{{ route('myDash') }}">{{ __('My Account') }}</a>
                  <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          </li>
        </ul>
      </div>
    @endif
    <div class="container">
        <div class="row align-items-center">
            <div class="col-6 col-md-3 col-xl-4  d-block">
                <h1 class="mb-0 site-logo"><a href="/" class="text-black h2 mb-0">{{ substr(config('app.name', 'Laravel'),0, 5) }}<span class="text-primary">{{ substr(config('app.name', 'Laravel'), 5) }}</span> </a></h1>
            </div>
            <div class="col-12 col-md-9 col-xl-8 main-menu">
                <nav class="site-navigation position-relative text-right" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block ml-0 pl-0">
                      <li><a href="/user" class="nav-link">Team Members</a></li>
                      <li class="has-children">
                          <a href="/tasks" class="nav-link">Tasks</a>
                          <ul class="dropdown arrow-top">
                              <li><a href="/task/completed" class="nav-link">Completed</a></li>
                              <li><a href="/task/uncompleted" class="nav-link">Pending</a></li>
                          </ul>
                      </li>
                    </ul>
                </nav>
            </div>
            <div class="col-6 col-md-9 d-inline-block d-lg-none ml-md-0">
                <a href="#" class="site-menu-toggle js-menu-toggle text-black float-right">
                    <span class="icon-menu h3"></span>
                </a></div>
        </div>
    </div>
</header>
