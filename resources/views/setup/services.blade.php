@extends("layout")
@section("content")
    Service
    <div class="feedback">
        @if(session('message'))
            <h3>
                {{session('message')}}
            </h3>
        @endif
    </div>
    <!-- Existing Service Container -->
    <div class="service_container">
        @if(count($services) === 0)
            You Currently Have 0 Services
        @else
            @foreach($services as $service)
                <p>{{$service->name}}</p>
            @endforeach
        @endif
    </div>
    <!-- New Service Input -->
    <div class="service_input">
        <form method="post" action="{{route('setup.service')}}">
            @csrf
            <input type="text" name="name" placeholder="name">
            <input type="number" name="price" placeholder="price">
            <input type="number" name="duration_in_minutes" placeholder="duration in minutes">
            <input type="hidden" name="vendor_id" value="{{$vendor->id}}">
            <textarea name="description" placeholder="description">

            </textarea>
            <input type="submit" value="Add Service">

        </form>
    </div>
@endsection
