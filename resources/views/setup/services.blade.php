@extends("layout")
@section("content")
    Service
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
        <form>
            <input type="text" name="name" placeholder="name">
            <input type="number" name="price" placeholder="price">
            <input type="number" name="duration_in_minutes" placeholder="duration in minutes">
            <textarea name="description" placeholder="description">

            </textarea>
            <input type="submit" value="Add Service">

        </form>
    </div>
@endsection
