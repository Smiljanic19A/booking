@extends("layout")
@section("content")

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
