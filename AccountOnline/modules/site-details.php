<div id="site-details" class="module">
    <div class="module-header">
        <div class="module-name">Site Details</div>
        <img class="collapse-toggle" src="images\down-arrow.png"/>
    </div>
    <div class="module-body">
        <div id="account-type" class="site-detail">
            <label>Account type:</label>
            <select name="Account Type" class="validate" required>
                <option><?php echo($_SESSION[Deal]['Account Type']) ?></option>
                <option>Digital</option>
                <option>Digital w/2Way</option>
                <option>Digital w/Cell</option>
				<option>Cell Primary</option>
                <option>Cell w/2Way</option>
				<!--<option>Test</option>-->
    		</select>
        </div>
        <div id="monitoring-level" class="site-detail">
            <label>Monitoring Level:</label>
            <select name="Monitoring Level" class="validate" required>
                <option><?php echo($_SESSION[Deal]['Monitoring Level']) ?></option>
                <option>Wireless Signal Forwarding</option>
                <option>Interactive Security</option>
                <option>Interactive Security and Automation</option>
                <option>Basic Interactive</option>
                <option>Interactive Gold</option>
                <option>Landline</option>
    		</select>
        </div>
        <div id="central-station" class="site-detail">
            <label>Central Station:</label>
            <select name="Monitoring Center" class="validate" required>
                <option><?php echo($_SESSION[Deal]['Monitoring Center']) ?></option>
                <option>Moni PUR</option>
                <option>Moni CM</option>
                <option>Rapid</option>
    		</select>
        </div>
        <div id="panel-phone-number" class="site-detail">
            <label>Panel Phone Number:</label>
            <input name="Panel Phone" class="validate" optional type="text" value="<?php echo($_SESSION[Deal]['Panel Phone']) ?>"/>
        </div>
        <div id="panel-location" class="site-detail">
            <label>Panel Location:</label>
            <input name="Panel Location" class="validate" required type="text" value="<?php echo($_SESSION[Deal]['Panel Location']) ?>"/>
        </div>
        <div id="panel-type" class="site-detail">
            <label>Panel Type:</label>
                <select name="Panel Type" class="validate" required>
                    <option><?php echo($_SESSION[Deal]['Panel Type']) ?></option>
                    <option>Go Control</option>
                    <option>Go Control 3</option>
                    <option>GE Simon XTi-5</option>
                    <option>GE Simon XTi</option>
                    <option>GE Simon XT</option>
                    <option>GE Concord 4</option>
                    <option>DSC NEOS</option>
                    <option>DSC PC1616</option>
                    <option>DSC PC1832</option>
                    <option>DSC Maxsys</option>
                    <option>Qolsys IQ 1</option>
                    <option>Honeywell Vista32FBPT</option>
                    <option>Honeywell L7000</option>
                </select>
        </div>
        <div id="home-phone" class="site-detail">
            <label>Contact - Home Phone:</label>
            <input name="Contact Phone" class="validate" optional type="text" value="<?php echo($_SESSION[Deal]['Contact Phone']) ?>"/>
        </div>
        <div id="transformer-location" class="site-detail">
            <label>Transformer Location:</label>
            <input name="Transformer Location" class="validate" required type="text" value="<?php echo($_SESSION[Deal]['Transformer Location']) ?>"/>
        </div>
        <div id="cross-street" class="site-detail">
            <label>Cross Street:</label>
            <input name="Cross Street" class="validate" optional type="text" value="<?php echo($_SESSION[Deal]['Cross Street']) ?>"/>
        </div>
    </div>
</div>