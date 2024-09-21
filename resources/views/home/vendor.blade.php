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
        <div class="setup_field">
            Privacy
        </div>
        <div class="setup_field">
            Services
        </div>
        <!-- Schedule -->
        <div class="setup_field">
            Schedule
        </div>
        <!-- Design -->
        <div class="setup_field">
            Design
        </div>
        <!-- Settings -->
        <div class="setup_field">
            Settings
        </div>
    </div>

@endsection
