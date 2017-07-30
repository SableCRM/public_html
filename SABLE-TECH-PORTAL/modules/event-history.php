<div id="event-history" class="module">
    <div class="module-header start_collapsed">
        <div>
            <div class="module-name">Event History</div>
            <img class="refresh-icon" src="../images\refresh-icon.png"/>
        </div>
        <img class="collapse-toggle" src="../images\down-arrow.png"/>
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
                    <option value="event_date">Alarms-Only</option>
                    <option value="event_date">Date-Time</option>
                    <option value="zone_id">Zone</option>
                    <option value="event_id">Event</option>
                    <option value="zonestate_id">State</option>
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
<!--        DYNAMICALLY GENERATED EVENT-HISTORY FROM DATABASE-->
    </div>
</div>