@extends("layout")
@section("content")
    <h1>Customize Your Design:</h1>
    <div class="template_container">
        <div onclick="setTemplateId(1)" class="template">Template 1</div>
        <div onclick="setTemplateId(2)" class="template">Template 2</div>
        <div onclick="setTemplateId(3)" class="template">Template 3</div>
    </div>

    <input name="primary_color" type="text" id="colorPickerPrimary" />
    <input name="secondary_color" type="text" id="colorPickerSecondary" />
    <input name="accent_color" type="text" id="colorPickerAccent" />


    <form method="post" action="{{route("setup.design")}}">
        @csrf
        <input type="hidden" name="template_id" id="templateId" value="">
        <input type="hidden" id="primary" name="primary_color" value="-1">
        <input type="hidden" id="secondary" name="secondary_color" value="-1">
        <input type="hidden" id="accent" name="accent_color" value="-1">
        <input type="hidden" name="vendor_id" value="{{$vendor->id}}">
        <input type="file" name="logo">
        <input type="submit" value="Save Design">
    </form>
    <style>
        .template_container{
            display: flex;
            flex-flow: row wrap;
            justify-content: flex-start;
            align-items: center;
        }
        .template{
            padding: 40px;
            background-color: grey;
            border: 2px solid black;
        }
    </style>
    <script>
        $(document).ready(function() {
            initializeColorPickers();
        });
        function setTemplateId(id){
            $("#templateId").val(id)
        }
        function setAccentColorValue(which, color){
            switch (which){
                case 1:
                    $("#primary").val(color)
                    break;
                case 2:
                    $("#secondary").val(color)
                    break;
                case 3:
                    $("#accent").val(color)

                    break;
            }
        }
        function initializeColorPickers(){
            $("#colorPickerPrimary").spectrum({
                color: "#f00", // Default color
                showInput: true, // Show the color input box
                preferredFormat: "hex", // Use hex color format
                change: function(color) {
                   setAccentColorValue(1, color.toHexString())
                    console.log("Selected color:", color.toHexString()); // Example of getting the hex color
                }
            }); $("#colorPickerSecondary").spectrum({
                color: "#fff", // Default color
                showInput: true, // Show the color input box
                preferredFormat: "hex", // Use hex color format
                change: function(color) {
                    setAccentColorValue(2, color.toHexString())
                    console.log("Selected color:", color.toHexString()); // Example of getting the hex color
                }
            });
            $("#colorPickerAccent").spectrum({
                color: "#f8f", // Default color
                showInput: true, // Show the color input box
                preferredFormat: "hex", // Use hex color format
                change: function(color) {
                    setAccentColorValue(3, color.toHexString())
                    console.log("Selected color:", color.toHexString()); // Example of getting the hex color
                }
            });
        }
    </script>
@endsection

