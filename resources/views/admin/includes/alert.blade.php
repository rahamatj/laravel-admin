@if (session('alert-success'))
    <div class="alert alert-success">
        {{ session('alert-success') }}
    </div>
@elseif (session('alert-danger'))
    <div class="alert alert-danger">
        {{ session('alert-danger') }}
    </div>
@endif
