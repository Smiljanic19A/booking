@extends("layout")
@section("content")
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
    </div>
    <form action="{{route('auth.user.register')}}" method="post">
        @csrf

        <label for="username">Username:</label>
        <input type="text" name="username" id="">

        <label for="password">Password:</label>
        <input type="password" name="password" id="">

        <label for="confirm_password">Confirm:</label>
        <input type="password" name="confirm_password" id="">

        <label for="email">Email:</label>
        <input type="email" name="email">

        <input type="submit">
    </form>
@endsection
