<div id="package_details" class="module">
    <div class="module-header">
        <div class="module-name">Package Details</div>
        <img class="collapse-toggle" src="../images/module-arrow.png"/>
    </div>
    <div class="module-body">
        <div id="package" class="package_detail">
            <label>Package:</label>
            <select class="validate" required>
                <option><?php echo $deal["Package Type"] ?></option>
                <option>Basic</option>
                <option>Silver</option>
                <option>Gold</option>
                <option>Platinum</option>
            </select>
        </div>
        <div id="level_of_service" class="package_detail">
            <label>Level of Service:</label>
            <select class="validate" required>
                <option><?php echo $deal["Monitoring Level"] ?></option>
                <option>Wireless Signal Forwarding</option>
                <option>Interactive Security</option>
                <option>Basic Interactive</option>
                <option>Interactive Security and Automation</option>
                <option>Interactive Gold</option>
                <option>Landline</option>
            </select>
        </div>
        <div id="communication_type" class="package_detail">
            <label>Communication Type:</label>
            <select class="validate" required>
                <option value="None">None</option>
                <option value="AlarmDotcom">AlarmDotcom</option>
                <option value="AlarmNet">AlarmNet</option>
                <option value="Tellular">Tellular</option>
                <option value="DSC">DSC</option>
                <option value="icontrol">icontrol</option>
            </select>
        </div>
        <div id="length_of_contract" class="package_detail half">
            <label>Length of Contract:</label>
            <select class="validate" required>
            </select>
        </div>
        <div id="takeover" class="package_detail eighth">
            <label>Takeover:</label>
            <input type="checkbox" <?php echo ($deal["Takeover"]) ? "checked" : "" ?>>
        </div>

        <div id="video" class="package_detail eighth">
            <label>Video:</label>
            <input type="checkbox" <?php echo ($deal["ADC Video"]) ? "checked" : "" ?>>
        </div>

        <div id="twoway" class="package_detail eighth">
            <label>Twoway:</label>
            <input type="checkbox" <?php echo ($deal["Two Way Voce"]) ? "checked" : "" ?>>
        </div>

        <div class="divider"></div>

        <h2 class="package_details_heading">Alarm Details</h2>

        <div id="panel_type" class="package_detail">
            <label>Panel Type:</label>
            <select class="validate" required>
                <option><?php echo $deal["Panel Type"] ?></option>
                <option>Go Control</option>
                <option>Go Control 3</option>
                <option>GE Simon XTi-5</option>
                <option>GE Simon XTi</option>
                <option>GE Simon XT</option>
                <option>GE Concord 4</option>
                <option>DSC Neo</option>
                <option>DSC PC1616</option>
                <option>DSC PC1832</option>
                <option>DSC Maxsys</option>
                <option>Qolsys IQ 1</option>
                <option>Honeywell Vista32FBPT</option>
            </select>
        </div>
        <div id="door_window" class="package_detail">
            <label>Door / Window(s):</label>
            <input class="validate" required type="number" value="<?php echo $deal["Door(s) / Window(s)"] ?>"/>
        </div>
        <div id="motion" class="package_detail">
            <label>Motion(s):</label>
            <input class="validate" required type="number" value="<?php echo $deal["Motion(s)"] ?>"/>
        </div>
        <div id="smoke" class="package_detail quarter">
            <label>Smoke(s):</label>
            <input class="validate" required type="number" value="<?php echo $deal["Smoke(s)"] ?>"/>
        </div>
        <div id="glass_break" class="package_detail quarter">
            <label>Glass Break(s):</label>
            <input class="validate" required type="number" value="<?php echo $deal["Glass Break(s)"] ?>"/>
        </div>
        <div id="other" class="package_detail half">
            <label>Other:</label>
            <textarea class="validate" required><?php echo $deal["Other"] ?></textarea>
        </div>

        <div class="divider"></div>

        <h2 class="package_details_heading">Z-wave Details</h2>

        <div id="thermostat" class="package_detail">
            <label>Thermostat(s):</label>
            <input class="validate" required type="number" value="<?php echo $deal["Thermostat(s)"] ?>">
        </div>
        <div id="lock" class="package_detail">
            <label>Lock(s):</label>
            <input class="validate" required type="number" value="<?php echo $deal["Lock(s)"] ?>">
        </div>
        <div id="lighting" class="package_detail">
            <label>Light(s):</label>
            <input class="validate" required type="number" value="<?php echo $deal["Light(s)"] ?>">
        </div>

        <div class="divider"></div>

        <h2 class="package_details_heading">ADC Camera Details</h2>

        <div id="indoor" class="package_detail">
            <label>Indoor:</label>
            <input class="validate" required type="number" value="<?php echo $deal["Indoor Camera(s)"] ?>">
        </div>
        <div id="Outdoor" class="package_detail">
            <label>Outdoor:</label>
            <input class="validate" required type="number" value="<?php echo $deal["Outdoor Camera(s)"] ?>">
        </div>
        <div id="skybell" class="package_detail">
            <label>Sky Bell:</label>
            <select class="validate" required>
                <option><?php echo $deal["Sky Bell"] ?></option>
                <option>Silver</option>
                <option>Black</option>
            </select>
        </div>

        <div class="divider"></div>

        <h2 class="package_details_heading">Takeover Details</h2>

        <div id="existing_panel_type" class="package_detail">
            <label>Existing Panel Type:</label>
            <select class="validate" required>
                <option><?php echo $deal["Existing Panel Type"] ?></option>
                <option>Honeywell</option>
                <option>2 Gig</option>
                <option>GE/Interlogix</option>
                <option>DSC</option>
                <option>Napco</option>
                <option>Other</option>
            </select>
        </div>
        <div id="wired_wireless" class="package_detail">
            <label>Wired / Wireless:</label>
            <select class="validate" required>
                <option><?php echo $deal["Wired / Wireless"] ?></option>
                <option>Hardwired</option>
                <option>Wireless</option>
                <option>Both</option>
            </select>
        </div>

        <div class="divider"></div>

        <h2 class="package_details_heading">Pricing Information</h2>

        <div id="rmr" class="package_detail">
            <label>RMR:</label>
            <input class="validate" required type="text" value="<?php echo $deal["RMR"] ?>"/>
        </div>
        <div id="install_charges" class="package_detail">
            <label>Install Charges:</label>
            <input class="validate" required type="text" value="<?php echo $deal["Amount"] ?>"/>
        </div>
        <div id="activation_charge" class="package_detail">
            <label>Activation Charge:</label>
            <input class="validate" required type="text" value="<?php echo $deal["Activation Fee"] ?>"/>
        </div>

        <div class="divider"></div>

        <h2 class="package_details_heading">Installation</h2>

        <div id="first_install_date" class="package_detail half">
            <label>1st Install Date:</label>
            <input class="validate" required type="date" value="<?php echo $deal["1st Choice Install Date"] ?>"/>
        </div>

        <div id="first_install_time" class="package_detail half">
            <label>1st Install Time:</label>
            <select class="validate" required>
                <option><?php echo $deal["1st Choice Install Time"] ?></option>
                <option>AM</option>
                <option>PM</option>
                <option>LATE PM</option>
            </select>
        </div>

        <div id="second_install_date" class="package_detail half">
            <label>2nd Install Date:</label>
            <input class="validate" required type="date" value="<?php echo $deal["2nd Choice Install Date"] ?>"/>
        </div>

        <div id="second_install_time" class="package_detail half">
            <label>2nd Install Time:</label>
            <select class="validate" required>
                <option><?php echo $deal["2nd Choice Install Time"] ?></option>
                <option>AM</option>
                <option>PM</option>
                <option>LATE PM</option>
            </select>
        </div>
    </div>
</div>
