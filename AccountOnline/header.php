<header>
    <img src="<?php echo Credentials::$sable[logo] ?>" alt="Company Logo"/>
    <img src="images\sablecrm-logo.png" alt="SableCRM Logo"/>
</header>

<section id="account">
    <div class="left">
        <img src="images\customer-icon.png" alt="Customer Icon"/>
        <div id="account-holder-info">
            <div><span id="account-holder-name"><?php echo($_SESSION[Deal]['Contact Name']) ?></span><span id="account-holder-id">(<?php echo($_SESSION[Deal]['CS Number']) ?>)</span></div>
            <div id="account-holder-address"><?php echo($_SESSION[Deal]['Address'].', '.$_SESSION[Deal]['City'].' '.$_SESSION[Deal]['State'].', '.$_SESSION[Deal]['Zip'].$_SESSION[Deal]['Postal Code']) ?></div>
        </div>
    </div>
    <div class="right">
        <div id="account-status-heading">Account Status:</div>
        <div id="account-status">On Test</div> <!-- Add 'testing' class to account-status to show alternate color -->
    </div>
</section>