@if(count($errors) > 0)
<div class="col-8 offset-2 center-c fill alert alert-danger alert-dismissable fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    @foreach($errors->all() as $error)
            {{$error}}<br>
    @endforeach
</div>
@endif

@if (session('success'))
    <div class="col-8 offset-2 center-c fill alert alert-success alert-dismissable fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{session('success')}}
    </div>
@endif

@if (session('error'))
    <div class="col-8 offset-2 center-c fill alert alert-danger alert-dismissable fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{session('error')}}
    </div>
@endif
