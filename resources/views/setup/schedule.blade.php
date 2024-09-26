@extends("layout")
@section("content")
    <h1>Determine Your Schedule Settings: {{$vendor->name}}</h1>
    <div class="day-container">
        <div class="day">Monday</div>
        <div class="day">Tuesday</div>
        <div class="day">Wednesday</div>
        <div class="day">Thursday</div>
        <div class="day">Friday</div>
        <div class="day">Saturday</div>
        <div class="day">Sunday</div>
    </div>
    <p>Auto Approve?</p>
    <input type="checkbox" id="auto-approve">
    <p>Auto Cancel?</p>
    <input type="checkbox" id="auto-approve">
    <p>Open for</p>
    <select>
        <option value="1">7 days</option>
        <option value="2">1 month</option>
        <option value="3">3 months</option>
    </select>
    <p>Would you like to set a repeating weekly schedule?</p>
    <input type="checkbox" id="showCalendar">
    <div id="calendar"></div>

    <script>

        // 2. Initialize FullCalendar with week view and options
        let calendarEl = $('#calendar')[0];  // Use jQuery to select the element
        let calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',  // Set the initial view to Week view
            headerToolbar: {
                left: 'prev,next today',  // Left side controls (navigation buttons)
                center: 'title',          // Center title (current week or date)
                right: 'dayGridMonth,timeGridWeek,timeGridDay'  // View options (Month, Week, Day)
            },
            selectable: true,  // Allow users to select time ranges
            editable: true,    // Allow dragging and resizing of events
            events: [          // Sample events to display on the calendar

            ],
            dateClick: function(info) {
                alert('Clicked on date: ' + info.dateStr);
            },
            select: function(info) {
                alert('Selected time range: ' + info.startStr + ' to ' + info.endStr);
            }

        });
        calendar.render();
        $("#calendar").hide()
        $("#showCalendar").change(function(){
            if ($(this).is(':checked')){
                $("#calendar").show()
            }else{
                $("#calendar").hide()
            }
        })
        //calendar.render();

    </script>



<style>
    .day-container{
        display: flex;
        flex-flow: row wrap;
        justify-content: flex-start;
        align-items: center;
    }
    .day{
        margin: 10px;
        padding: 10px;
        background-color: antiquewhite;
        opacity: 0.5;
        cursor: pointer;
    }
</style>
@endsection
