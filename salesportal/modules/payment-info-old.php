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
                <input id="routing_number" placeholder="Routing Number" class="validate" required type="text"/>
                <input id="account_number" placeholder="Account Number" class="validate" required type="text"/>
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
                <input id="credit_card_number" class="validate" required type="text" placeholder="Credit Card Number"/>
                <input id="credit_card_exp" class="validate" required type="text" placeholder="EXP (mm/yyyy)"/>
                <input id="credit_card_cvv" class="validate" required type="text" placeholder="CVV"/>
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
</div>

<script>

$(document).ready(function() {

    $('#credit_card_select').click(function() {
        $('#modal_container, #credit_card_warning').css('display', 'flex').hide().fadeIn();
    });

    $('.modal_button').click(function() {
        $('#modal_container, .modal').fadeOut();
    });

});

</script>
