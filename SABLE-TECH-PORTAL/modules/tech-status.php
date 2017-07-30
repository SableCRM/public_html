<div id="tech_status" class="module">
    <div class="module-header">
        <div>
            <div class="module-name">Technician Status</div>
            <img class="check_icon_solid" src=""/>
            <div id="status_text"></div>
        </div>
        <img class="collapse-toggle" src="../images\down-arrow.png"/>
    </div>
    <div class="module-body">
        <div id="not_on_site">
            <input type="radio" name="tech_status" value="Not On Site"/>
            <input type="button" class="button red-button status_button" value="Not On Site"/>
        </div>
        <div id="in_route">
            <input type="radio" name="tech_status" value="In Route"/>
            <input type="button" class="button yellow_button status_button" value="In Route"/>
        </div>
        <div id="on_site">
            <input type="radio" name="tech_status" value="On Site"/>
            <input type="button" class="button green-button status_button" value="On Site"/>
        </div>
    </div>
</div>
