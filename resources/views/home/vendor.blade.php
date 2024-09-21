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
    <h1>Setup You Vendor Profile</h1>
    <div class="setup-container">
        <!-- Privacy -->
        <div onclick="window.location.href = '{{ route("setup.page", ["page"=>"privacy", "vendor" => $vendor]) }}'" class="setup_field">
            Privacy
        </div>
        <!-- Services -->
        <div onclick="window.location.href = '{{route("setup.page", ["page"=>"services", "vendor"=>$vendor])}}'" class="setup_field">
            Services
        </div>
        <!-- Schedule -->
        <div onclick="window.location.href = '{{route("setup.page", ["page"=>"schedule", "vendor"=>$vendor])}}'" class="setup_field">
            Schedule
        </div>
        <!-- Design -->
        <div onclick="window.location.href = '{{route("setup.page", ["page"=>"design", "vendor"=>$vendor])}}'" class="setup_field">
            Design
        </div>
        <!-- Settings -->
        <div onclick="window.location.href = '{{route("setup.page", ["page"=>"settings", "vendor"=>$vendor])}}'" class="setup_field">
            Settings
        </div>
    </div>

@endsection
