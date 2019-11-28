@if (count($errors)>0)
    <div class="alert alert-danger" role="alert">
        @foreach($errors->all() as $error)
            {{$error}}
        @endforeach
    </div>
@endif
