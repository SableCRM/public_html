<?php

$_SESSION['GetData']->zip = ($_SESSION['Deal']['Zip']) ? $_SESSION['Deal']['Zip'] : $_SESSION['Deal']['Postal Code'];

$agencies = $_SESSION['GetData']->Get('agencies');

$agencies = $_SESSION['Post']->Post('GetData', $agencies, 'array');

?>

<div id="agencies" class="module">
    <div class="module-header">
        <div class="module-name">Agencies</div>
        <img class="collapse-toggle" src="images\down-arrow.png"/>
    </div>
    <div class="column-headings">
        <div class="agency-selected">Selected (3 Max)</div>
        <div class="agency-name">Agency Name / Type</div>
        <div class="agency-contact">Agency Contact Number</div>
    </div>
    <div id="js_agency_module" class="module-body">
        <?php
        /**
         * @todo try to catch when there are no agencies returned from moni api and call chris soda to update.
         */
            try
            {
                foreach($agencies as $agency)
                {
                    echo '
                        <div class="agency" data-agency_no="'.trim($agency->agency_no).'" data-agencytype_id="'.trim($agency->agencytype_id).'" data-agency_name="'.trim($agency->agency_name).'" data-city_name="'.trim($agency->city_name).'" data-state_id="'.trim($agency->state_id).'" data-phone1="'.trim($agency->phone1).'">
                        <div class="agency-selected"><input type="checkbox"/></div>
                        <div class="agency-name">'.trim($agency->agency_name).'</div>
                        <div class="agency-contact">'.trim($agency->phone1).'</div>
                        </div>';
                }
            }
            catch(exception $exception)
            {
                echo '<h2>NO AGENCIES RETURNED FOR ZIP/POSTAL-CODE '.$_SESSION['GetData']->zip.'</h2>';
            }
        ?>
    </div>
</div>