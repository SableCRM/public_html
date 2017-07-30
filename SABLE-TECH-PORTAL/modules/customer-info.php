<div id="customer_info" class="module">
    <div class="module-header">
        <div>
            <div class="module-name">Customer Information</div>
            <img class="check_icon_solid" src="../images\green-check-icon-solid.png"/>
        </div>
        <img class="collapse-toggle" src="../images\down-arrow.png"/>
    </div>
    <div class="module-body">
        <div id="first_name" class="customer_info quarter">
            <label>First Name:</label>
            <input class="validate" required type="text" value="<?php echo $firstname ?>" disabled/>
        </div>
        <div id="last_name" class="customer_info quarter">
            <label>Last Name:</label>
            <input class="validate" required type="text" value="<?php echo $lastname ?>" disabled/>
        </div>
        <div id="address" class="customer_info half">
            <label>Address:</label>
            <input class="validate" required type="text" value="<?php echo $_SESSION['deal-info']['Address'] ?>" disabled/>
        </div>
        <div id="city" class="customer_info quarter">
            <label>City:</label>
            <input class="validate" required type="text" value="<?php echo $_SESSION['deal-info']['City'] ?>" disabled/>
        </div>
        <div id="state" class="customer_info eighth">
            <label>State:</label>
            <input class="validate" required type="text" value="<?php echo $address_state ?>" disabled/>
        </div>
        <div id="zip" class="customer_info eighth">
            <label>Zip:</label>
            <input class="validate" required type="text" value="<?php echo $address_zip ?>" disabled/>
        </div>
        <div id="country" class="customer_info quarter">
            <label>Country:</label>
            <input class="validate" required type="text" value="<?php echo $_SESSION['deal-info']['Country'] ?>" disabled/>
        </div>
        <div id="level_of_service" class="customer_info quarter">
            <label>Level of Service:</label>
            <input class="validate" required type="text" value="<?php echo $_SESSION['deal-info']['Monitoring Level'] ?>" disabled/>
        </div>
        <div id="service_type" class="customer_info quarter">
            <label>Service Type:</label>
            <input class="validate" required type="text" value="<?php echo $_SESSION['deal-info']['Account Type'] ?>" disabled/>
        </div>
        <div id="panel_type" class="customer_info quarter">
            <label>Panel Type:</label>
            <input class="validate" required type="text" value="<?php echo $_SESSION['deal-info']['Panel Type'] ?>" disabled/>
        </div>
        <div id="two_way" class="customer_info eighth">
            <label>Two Way:</label>
            <input class="validate" required type="checkbox" <?php echo ($_SESSION['deal-info']['Two Way Voice'] == "true") ? "checked " : "" ?> disabled/>
        </div>

        <?php if($_SESSION['deal-info']['Skybell Only'] == "true"){ ?>

                <div id="skybell_only" class="customer_info eighth">
                    <label>Skybell Only:</label>
                    <input class="validate" required type="checkbox"<?php echo ($_SESSION['deal-info']['Skybell Only'] == "true") ? "checked " : "" ?> disabled/>
                </div>

        <?php } else { ?>

            <div id="adc_video" class="customer_info eighth">
                <label>ADC Video:</label>
                <input class="validate" required type="checkbox"<?php echo ($_SESSION['deal-info']['ADC Video'] == "true") ? "checked " : "" ?> disabled/>
            </div>

        <?php } ?>

    </div>
</div>
