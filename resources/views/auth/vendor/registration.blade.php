@extends("layout")
@section("content")
    @if(!session('vendor_user_registered'))
        <form action="{{ route('auth.vendor.user') }}" method="post">
            @csrf
            <input type="submit" value="form1">
        </form>
    @endif

    @if(session('vendor_user_registered'))
        <form action="">
            <input type="submit" value="form2">
        </form>
    @endif
@endsection
