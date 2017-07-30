<?php

    $eventType = $comm->Post('GetData', $wsi->Get('events'), 'json');
    $deviceType = $comm->Post('GetData', $wsi->Get('equiptypes'), 'json');

?>

<div id="zone-list" class="module">
    <div class="module-header start_collapsed">
        <div>
            <div class="module-name">Zone List</div>
            <img class="refresh-icon" src="../images\refresh-icon.png"/>
        </div>
        <img class="collapse-toggle" src="../images\down-arrow.png"/>
    </div>
    <div class="column-headings">
        <div class="zone-tested"></div>
        <div class="zone-existing">Existing</div>
        <div class="zone-number"></div>
        <div class="zone-name">Zone Name</div>
        <div class="zone-type">Event Type</div>
        <div class="zone-hardware">Device Type</div>
        <div class="zone-delete"></div>
    </div>
    <div id="js_zone_module" class="module-body" data-event_id='<?php echo $eventType ?>' data-equiptype_id='<?php echo $deviceType ?>'>
        <!-- DYNAMICALLY GENERATED CONTENT -->
    </div>
    <div id="zone_buttons">
        <input id="edit_zones" class="save-all" type="button" class="button grey-button" value="Edit Zones" onclick=""/>
        <input id="add_zone" type="button" class="button" value="+ Add Zone" onclick=""/>
    </div>
    <div id="zone-list-footer">
        <div id="test-requirement-notice">
            <div class="zone-tested"><img src="../images\\red-x-icon.png"/></div>
            <p>All zones have <strong>&nbsp;NOT&nbsp;</strong> been successfully tested!</p>
        </div>
        <div id="zone-footer-buttons">
            <input id="call_for_survey" type="button" class="button all-zones-tested" value="Call For Survey" onclick=""/>
            <input id="add-two-way" type="button" class="button grey-button" value="Add Two-Way" onclick=""/>
        </div>
    </div>
</div>
