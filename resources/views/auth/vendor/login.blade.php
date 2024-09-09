@extends("layout")
@section("content")
    <form action="{{ route("auth.vendor.login.check") }}" method="post">
        @csrf
        <label for="username">Email:</label>
        <input type="email" name="email">
        <label for="password">Password:</label>
        <input type="password" name="password">
        <input type="submit" value="Login">
    </form>
@endsection
