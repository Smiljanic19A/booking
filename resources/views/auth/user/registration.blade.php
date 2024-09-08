@extends("layout")
@section("content")
    <div class="error_block">

    </div>
    <form action="">
        <label for="username">Username:</label>
        <input type="text" name="username" id="">

        <label for="password">Password:</label>
        <input type="password" name="password" id="">

        <label for="confirm_password">Confirm:</label>
        <input type="password" name="confirm_password" id="">

        <label for="email">Email:</label>
        <input type="email">

        <input type="submit">
    </form>
@endsection
