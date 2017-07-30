<div id="alarmcom-services" class="module">
    <div class="module-header">
        <div class="module-name">Cell Services</div>
        <img class="collapse-toggle" src="images\down-arrow.png"/>
    </div>
    <div class="module-body">
        <div id="adc-card">
            <div id="adc-card-heading">Enter ADC Serial #:</div>
            <p id="adc-card-message">Enter 10 or 15 Digit Serial # To Register Cell.&nbsp;
            Serial # <strong>Must</strong> Be 15 Digits To Place Account Online.</p>
            <div id="adc-card-form">
                <input name="ADC Serial Number" id="adc-serial" class="validate" required pattern="\d{15}" type="text" value="<?php echo($_SESSION[Deal]['ADC Serial Number']) ?>"/>
                <div>
                    <input id="activate-adc" type="button" class="button green-button" value="Activate" onclick=""/>
                    <input id="terminate-adc" type="button" class="button red-button" value="Terminate Cell"/>
                </div>
            </div>
        </div>
        <div id="adc-text">
            <div id="adc-heading"></div>
            <div id="adc-credentials">
                <div>
                    <span id="login_label">Username:</span>
                    <span id="adc-login" class="credential"></span>
                </div>
                <div>
                    <span id="password_label">Password:</span>
                    <span id="adc-password" class="credential"></span>
                </div>
                <div>
                    <span id="id_label">Customer Id:</span>
                    <span id="adc-id" class="credential"><?php echo($_SESSION[Deal]['ADC Customer Id']) ?></span>
                </div>
            </div>
        </div>
    </div>
</div>