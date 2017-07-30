<div id="personal_info" class="module">
    <div class="module-header">
        <div class="module-name">Personal Information</div>
        <img class="collapse-toggle" src="../images\down-arrow.png"/>
    </div>
    <div class="module-body">
        <div id="first_name">
            <label>First Name:</label>
            <input type="text" value="<?php echo $_SESSION['user']->USER_FIRST_NAME ?>"/>
        </div>
        <div id="last_name">
            <label>Last Name:</label>
            <input type="text" value="<?php echo $_SESSION['user']->USER_LAST_NAME ?>"/>
        </div>
        <div id="email_address">
            <label>Email Address:</label>
            <input type="text" value="<?php echo $_SESSION['user']->USER_EMAIL ?>"/>
        </div>
        <div id="company_name">
            <label>Company Name:</label>
            <input type="text" value="<?php echo $_SESSION['user']->COMPANY_NAME ?>" disabled/>
        </div>
        <div id="mobile_number">
            <label>Mobile Number:</label>
            <input type="text" value="<?php echo $_SESSION['user']->USER_MOBILE ?>"/>
        </div>
        <div id="work_number">
            <label>Work Number:</label>
            <input type="text" value="<?php echo $_SESSION['user']->USER_PHONE ?>"/>
        </div>
    </div>
    <div id="update_personal">
        <input type="button" class="button" value="Update"/>
    </div>
</div>
