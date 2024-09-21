@extends("layout")
@section("content")
    @if(isset($vendor))
        <p>
            {{$vendor->name}}
            {{$vendor->user->username}}
        </p>
    @else
        @dd("kurac")
    @endif

    <!-- Page is used for setting up vendor information before they are publicly viewed -->
    <h1>Setup You Vendor Profile!te</h1>
    <div class="setup-container">
        <!-- Services -->
        <div onclick="window.location.href = '{{route("setup.page", ["page"=>"privacy"])}}'" class="setup_field">
            Privacy
        </div>
        <div onclick="window.location.href = '{{route("setup.page", ["page"=>"services"])}}'" class="setup_field">
            Services
        </div>
        <!-- Schedule -->
        <div onclick="window.location.href = '{{route("setup.page", ["page"=>"schedule"])}}'" class="setup_field">
            Schedule
        </div>
        <!-- Design -->
        <div onclick="window.location.href = '{{route("setup.page", ["page"=>"design"])}}'" class="setup_field">
            Design
        </div>
        <!-- Settings -->
        <div onclick="window.location.href = '{{route("setup.page", ["page"=>"settings"])}}'" class="setup_field">
            Settings
        </div>
    </div>

@endsection
