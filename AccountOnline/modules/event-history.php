<div id="event-history" class="module">
    <div class="module-header">
        <div>
            <div class="module-name">Event History</div>
            <img class="refresh-icon" src="images\refresh-icon.png"/>
        </div>
        <img class="collapse-toggle" src="images\down-arrow.png"/>
    </div>
    <div id="filters">
        <div class="left">
            <div class="filter-heading">Date Range:</div>
            <div class="filter-inputs">
                <input id="date-from" type="date" placeholder="mm/dd/yyyy"/><span id="date-range-divider">to</span>
                <input id="date-to" type="date" placeholder="mm/dd/yyyy"/>
                <input id="filter-date" type="button" class="button" value="Go" onclick=""/>
            </div>
        </div>
        <div class="right">
            <div class="filter-heading">Sort by:</div>
            <div class="filter-inputs">
                <select id="sort-method">
                    <option>Date-time</option>
                    <option>Date-time</option>
                    <option>Date-time</option>
        		</select>
                <input id="sort-events" type="button" class="button" value="Sort" onclick=""/>
            </div>
        </div>
    </div>
    <div class="column-headings">
        <div class="event-date">Date-time</div>
        <div class="event-zone">Zone</div>
        <div class="event-id">Event</div>
        <div class="event-state">State</div>
        <div class="event-match">Match</div>
        <div class="event-computed">Computed</div>
    </div>
    <div class="module-body">
<!--        <div class="event">-->
<!--            <div class="event-date">12-21-2016 9:50 PM</div>-->
<!--            <div class="event-zone">2</div>-->
<!--            <div class="event-id">CIE570</div>-->
<!--            <div class="event-state">B</div>-->
<!--            <div class="event-match">4,CID,E570,TASK:12</div>-->
<!--            <div class="event-computed">Sliding Door</div>-->
<!--        </div>-->
    </div>
</div>