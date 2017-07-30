<div id="service_notes" class="module">
    <div class="module-header">
        <div class="module-name">Service Notes</div>
        <img class="collapse-toggle" src="../images/module-arrow.png"/>
    </div>
    <div class="module-body">
        <label>Service Details:<span>Moni Job Number (<?php echo $service["Moni Job Number"] ?>)</span></label>
        <textarea id="service-details" disabled>
            <?php
                echo $service["Service Notes"];
            ?>
        </textarea>
        <label>Work Performed:</label>
        <textarea id="work-performed"></textarea>
        <input type="button" class="button" value="Service Complete"/>
    </div>
</div>
