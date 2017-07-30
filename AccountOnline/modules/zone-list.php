<?php

    $zn_vars = array('event_id' => 'events', 'equiptype_id' => 'equiptypes');

    foreach($zn_vars as $key => $value)
    {
        $zn_list = $_SESSION[GetData]->Get($value);

        $$key = $_SESSION[Post]->Post('GetData', $zn_list, 'json');
    }

?>

<div id="zone-list" class="module">
    <div class="module-header">
        <div>
            <div class="module-name">Zone List</div>
            <img class="refresh-icon" src="images\refresh-icon.png"/>
        </div>
        <img class="collapse-toggle" src="images\down-arrow.png"/>
    </div>
    <div class="column-headings">
        <div class="zone-edit"></div>
        <div class="zone-tested"></div>
        <div class="zone-tested">Existing</div>
        <div class="zone-number"></div>
        <div class="zone-name">Zone Name</div>
        <div class="zone-type">Event Type</div>
        <div class="zone-hardware">Device Type</div>
        <div class="zone-delete"></div>
    </div>
    <div id="js_zone_module" class="module-body" data-event='<?php echo(trim($event_id)) ?>' data-equiptype='<?php echo(trim($equiptype_id)) ?>'>
        <!-- DYNAMICALLY GENERATED CONTENT -->
    </div>
    <div id="add-zone">
        <input type="button" class="button" value="+ Add Zone" onclick=""/>
    </div>
    <div id="zone-list-footer">
        <div id="test-requirement-notice">
            <div class="zone-edit"></div>
            <div class="zone-tested"><img src="images\red-x-icon.png"/></div>
            <p>ALL zones must be tested before placing account online. Complete zone tests before proceeding.</p>
        </div>
        <div id="zone-footer-buttons">
            <input id="add-two-way" type="button" class="button grey-button" value="Add Two-Way" onclick=""/>
            <input id="place-account-online" type="button" class="button all-zones-tested" value="Place Account Online" onclick=""/>
        </div>
    </div>
</div>
