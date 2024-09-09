@extends("layout")
@section("content")

    <form action="" method="post">
        @csrf
        <label for="username">Username:</label>
        <input type="text" name="username">
        <label for="password">Password:</label>
        <input type="password" name="password">
        <input type="submit" value="Login">
    </form>

@endsection
