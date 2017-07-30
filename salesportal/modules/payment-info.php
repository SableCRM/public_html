<div id="payment_info" class="module">
    <div class="module-header">
        <div class="module-name">Payment Information</div>
        <img class="collapse-toggle" src="../images/module-arrow.png"/>
    </div>
    <div class="module-body">
        <div id="checking_account">
            <div class="payment_description">
                <div class="payment_text">
                    <input id="checking_account_select" type="radio" name="payment_select" value="ACH" <?php echo ($deal["Easy Pay Method"] == "ACH") ? "checked" : "" ?>/>
                    AutoPay from Checking Account (ACH)
                </div>
                <div class="payment_images">
                    <img src="../images/check-routing-account.png"/>
                </div>
            </div>
            <div class="inputs">
                <input id="routing_number" placeholder="Routing Number" class="validate" required type="text" value="<?php echo $deal["ACH Routing Number"] ?>"/>
                <input id="account_number" placeholder="Account Number" class="validate" required type="text" value="<?php echo $deal["ACH Account"] ?>"/>
            </div>
        </div>
        <div class="divider"></div>
        <div id="credit_card">
            <div class="payment_description">
                <div class="payment_text">
                    <input id="credit_card_select" type="radio" name="payment_select" value="CC" <?php echo ($deal["Easy Pay Method"] == "CC") ? "checked" : "" ?>/>
                    Credit Card
                </div>
                <div class="payment_images">
                    <img src="../images/visa.png"/>
                    <img src="../images/mastercard.png"/>
                    <img src="../images/discover.png"/>
                    <img src="../images/american-express.png"/>
                </div>
            </div>
            <div class="inputs">
                <input id="credit_card_number" class="validate" required type="text" placeholder="Credit Card Number" value="<?php echo $deal["Card Number"] ?>"/>
                <input id="credit_card_exp" class="validate" required type="text" placeholder="EXP (mm/yyyy)" value="<?php echo $deal["Expiration Date"] ?>"/>
                <input id="credit_card_cvv" class="validate" required type="text" placeholder="CVV" value="<?php echo $deal["CID"] ?>"/>
            </div>
        </div>
        <div class="divider"></div>
        <div id="invoice">
            <div class="payment_description">
                <div class="payment_text">
                    <input id="invoice_select" type="radio" name="payment_select" value="INV" <?php echo ($deal["Easy Pay Method"] == "INV") ? "checked" : "" ?>/>
                    Invoice
                </div>
            </div>
        </div>
        <div class="divider"></div>
        <div id="billing_address">
            <div id="billing_address_heading">
                <h2>Billing Address</h2>
                <div>
                    <input type="checkbox"/>
                    <span>Use primary address for billing</span>
                </div>
            </div>
            <div id="first_name" class="billing_address quarter">
                <label>First Name:</label>
                <input class="validate" required type="text"/>
            </div>
            <div id="last_name" class="billing_address quarter">
                <label>Last Name:</label>
                <input class="validate" required type="text"/>
            </div>
            <div id="address_1" class="billing_address half">
                <label>Address 1:</label>
                <input class="validate" required type="text"/>
            </div>
            <div id="address_2" class="billing_address">
                <label>Address 2:</label>
                <input class="validate" type="text"/>
            </div>
            <div id="city" class="billing_address quarter">
                <label>City:</label>
                <input class="validate" required type="text"/>
            </div>
            <div id="state" class="billing_address eighth">
                <label>State:</label>
                <input class="validate" required type="text">
            </div>
            <div id="zip" class="billing_address eighth">
                <label>Zip:</label>
                <input class="validate" required type="text"/>
            </div>
            <div id="county" class="billing_address quarter">
                <label>County:</label>
                <input class="validate" required type="text"/>
            </div>
            <div id="country" class="billing_address quarter">
                <label>Country:</label>
                <select class="validate">
                    <option value="US">US</option>
                    <option value="CA">CA</option>
                </select>
            </div>
        </div>
    </div>
</div>

<div id="modal_container">
    <div id="credit_card_warning" class="modal">
        <h2>WARNING</h2>
        <p>Paying with credit card is not recommended due to the high frequency of credit
            card number updates and expiration dates.</p>
        <input type="button" class="button modal_button" value="I understand"/>
    </div>
    <div id="invoice_warning" class="modal">
        <h2>WARNING</h2>
        <p>Are you sure you want to pay via invoice?</p>
        <input type="button" class="button modal_button" value="Yes"/>
    </div>
</div>

<script>

$(document).ready(function() {

    $('#credit_card_select').click(function() {
        $('#modal_container, #credit_card_warning').css('display', 'flex').hide().fadeIn();
    });

    $('#invoice_select').click(function() {
        $('#modal_container, #invoice_warning').css('display', 'flex').hide().fadeIn();
    });

    $('.modal_button').click(function() {
        $('#modal_container, .modal').fadeOut();
    });

});

</script>
