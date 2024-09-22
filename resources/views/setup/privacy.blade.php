@extends("layout")
@section("content")
    <div class="privacy_settings_container">
        <div class="checkbox_container">
            <div onclick="toggleFormVisibility(0)" class="public">
                Public
            </div>
            <div onclick="toggleFormVisibility(1)" class="private">
                Private
            </div>
        </div>
    </div>
    <form class="form" id="public-form" action="{{route("setup.privacy")}}" method="post">
        @csrf
        <div>
            Make Location Private?
        </div>
        <div id="yesButton" onclick="toggleLocationPrivacy(0)">Yes</div>
        <div id="noButton" onclick="toggleLocationPrivacy(1)">No</div>
        <input type="hidden" name="private_location" value="0" id="privateLocation">
        <input type="hidden" name="isPublic" id="isPublic" value="1">
        <input type="submit" value="Save Settings">
    </form>
    <form class="form" id="private-form" action="{{route("setup.privacy")}}" method="post">
        @csrf
        <div class="share_link">
            <h1>Here is your share link!</h1>
        </div>
        <input type="hidden" name="isPublic" id="isPublic" value="0">
        <input type="submit" value="Save Settings">
    </form>
@endsection
<script>
    //0 sets to true 1 sets to false

    function toggleFormVisibility(status){
        let publicForm = $("#public-form");
        let privateForm = $("#private-form");
        if (status === 0){
            publicForm.css("display", "flex");
            privateForm.css("display", "none");
            return;
        }
        publicForm.css("display", "none");
        privateForm.css("display", "flex");
    }
    function toggleLocationPrivacy(status){
       if(status === 0){
           $("#privateLocation").val(1);
           return
       }
        $("#privateLocation").val(0);


    }
</script>
<style>
    .form{
        display: none;
    }
</style>
