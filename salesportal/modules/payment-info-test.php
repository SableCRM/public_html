<div id="payment_info" class="module">
    <div class="module-header">
        <div class="module-name">Payment Information</div>
        <img class="collapse-toggle" src="../images/module-arrow.png"/>
    </div>
    <div class="module-body">
        <div id="checking_account">
            <div class="payment_description">
                <div class="payment_text">
                    <input id="checking_account_select" type="radio" name="payment_select" value="ACH"/>
                    AutoPay from Checking Account (ACH)
                </div>
                <div class="payment_images">
                    <img src="../images/check-routing-account.png"/>
                </div>
            </div>
            <div class="inputs">
                <input id="routing_number" placeholder="Routing Number" class="validate" required type="number"/>
                <input id="account_number" placeholder="Account Number" class="validate" required type="number"/>
            </div>
        </div>
        <div class="divider"></div>
        <div id="credit_card">
            <div class="payment_description">
                <div class="payment_text">
                    <input id="credit_card_select" type="radio" name="payment_select" value="CC"/>
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
                <input id="credit_card_number" class="validate" required type="number" placeholder="Credit Card Number"/>
                <input id="credit_card_exp" class="validate" required type="text" placeholder="EXP (mm/yyyy)"/>
                <input id="credit_card_cvv" class="validate" required type="text" placeholder="CVV"/>
            </div>
        </div>
        <div class="divider"></div>
        <div id="invoice">
            <div class="payment_description">
                <div class="payment_text">
                    <input id="invoice_select" type="radio" name="payment_select" value="INV"/>
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
                <input class="validate" required type="text" data-primary-address="<?php echo $_SESSION['customer-info']['fname'] ?>"/>
            </div>
            <div id="last_name" class="billing_address quarter">
                <label>Last Name:</label>
                <input class="validate" required type="text" data-primary-address="<?php echo $_SESSION['customer-info']['lname'] ?>"/>
            </div>
            <div id="address_1" class="billing_address half">
                <label>Address 1:</label>
                <input class="validate" required type="text" data-primary-address="<?php echo $_SESSION['customer-info']['address1'] ?>"/>
            </div>
            <div id="address_2" class="billing_address">
                <label>Address 2:</label>
                <input class="validate" type="text" data-primary-address=""/>
            </div>
            <div id="city" class="billing_address quarter">
                <label>City:</label>
                <input class="validate" required type="text" data-primary-address="<?php echo $_SESSION['customer-info']['city'] ?>"/>
            </div>
            <div id="state" class="billing_address eighth">
                <label>State:</label>
                <input class="validate" required type="text" data-primary-address="<?php echo $_SESSION['customer-info']['state'] ?>">
            </div>
            <div id="zip" class="billing_address eighth">
                <label>Zip:</label>
                <input class="validate" required type="text" data-primary-address="<?php echo $_SESSION['customer-info']['zip'] ?>"/>
            </div>
            <div id="county" class="billing_address quarter">
                <label>County:</label>
                <input class="validate" required type="text" data-primary-address="<?php echo $_SESSION['customer-info']['county'] ?>"/>
            </div>
            <div id="country" class="billing_address quarter">
                <label>Country:</label>
                <input class="validate" required type="text" data-primary-address="<?php echo $_SESSION['customer-info']['country'] ?>"/>
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
    <div id="form-errors" class="modal">
        <h2>You have <span id="num-errors"></span>.</h2>
        <p></p>
        <input type="button" class="button modal_button" value="Okay"/>
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

    $('#billing_address_heading input').click(function() {
        $('#billing_address .billing_address input').each(function() {
            let copiedVal = $(this).attr('data-primary-address');
            $(this).val(copiedVal);
        });
    });

});

</script>
