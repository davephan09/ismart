@if ($errors->any())
    <div class="alert error alert-danger">
        <ul class="error">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::has('error'))
    <div class="alert error alert-dangger">
        {{ Session::get('error') }}
    </div>
@endif

@if (Session::has('success'))
    <div class="alert error alert-dangger">
        {{ Session::get('success') }}
    </div>
@endif