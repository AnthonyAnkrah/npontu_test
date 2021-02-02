@extends('layouts.app')

@section('content')
<div class="site-blocks-cover" style="overflow: hidden;" id="home-section">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            @include('inc.messages')
            <div class="col-md-12" style="position: relative;" data-aos="fade-up" data-aos-delay="200">
                <img src="images/undraw_investing_7u74.svg" alt="Image" class="img-fluid img-absolute">
                <div class="row mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-lg-6 mr-auto">
                        <h1>We Help You Track Your Tasks</h1>
                        <p class="mb-5">We operate with a top-notch tracking algo that keeps track of your duties! From <b>thought</b> to <b>cloud</b>, we help you tell the story of your development projects.</p>
                        <div>
                            <a href="/tasks" class="btn btn-primary mr-2 mb-2">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
