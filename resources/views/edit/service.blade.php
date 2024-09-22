@extends("layout")
@section("content")
    <h3>Editing Service {{$service->name}}</h3>
   <form>
       <input type="text" value="{{$service->name}}" name="name">
       <input type="number" name="price" value="{{$service->price}}">
       <input type="number" name="duration_in_minutes" value="{{$service->duration_in_minutes}}">
       <textarea name="description">
           {{$service->description}}
       </textarea>
       <input type="hidden" name="vendor_id" value="{{$vendor->id}}">
       <input type="submit" value="Edit Service">
   </form>
@endsection
