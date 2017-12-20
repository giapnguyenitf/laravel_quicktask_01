@if (count($errors))
    <div class="alert alert-danger">
        <strong> @lang('navbar.notification') </strong>
        <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::has('message'))
    <div class="alert alert-danger">
        {{ Session::get('message') }}
    </div>
@endif
