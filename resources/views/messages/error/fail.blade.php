@if (Session::has('fail'))
    <div class="alert danger">
        {{ Session::get('fail') }}
    </div>
@endif