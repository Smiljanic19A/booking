<h1>Welcome Dude</h1>
<div class="error_block">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        @if(session('message'))
            <h3>
                {{session('message')}}
            </h3>
        @endif
</div>

