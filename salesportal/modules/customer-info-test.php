<div id="customer_info" class="module">
    <div class="module-header">
        <div class="module-name">Customer Premise Information</div>
        <img class="collapse-toggle" src="../images/module-arrow.png"/>
    </div>
    <div class="module-body">
        <div id="first_name" class="customer_info quarter">
            <label>First Name:</label>
            <input class="validate" required type="text"/>
        </div>
        <div id="last_name" class="customer_info quarter">
            <label>Last Name:</label>
            <input class="validate" required type="text"/>
        </div>
        <div id="address_1" class="customer_info half">
            <label>Address 1:</label>
            <input class="validate" required type="text"/>
        </div>
        <div id="address_2" class="customer_info">
            <label>Address 2:</label>
            <input class="validate" type="text"/>
        </div>
        <div id="city" class="customer_info quarter">
            <label>City:</label>
            <input class="validate" required type="text"/>
        </div>
        <div id="state" class="customer_info eighth">
            <label>State:</label>
            <input class="validate" required type="text">
        </div>
        <div id="zip" class="customer_info eighth">
            <label>Zip:</label>
            <input class="validate" required type="text"/>
        </div>
        <div id="county" class="customer_info quarter">
            <label>County:</label>
            <input class="validate" required type="text"/>
        </div>
        <div id="country" class="customer_info quarter">
            <label>Country:</label>
            <input class="validate" required type="text"/>
        </div>
        <div class="divider"></div>
        <div id="email_address" class="customer_info half">
            <label>Email Address:</label>
            <input class="validate" required type="text"/>
        </div>
        <div id="main_phone_number" class="customer_info half">
            <label>Main Phone #:</label>
            <input class="validate" required type="text"/>
        </div>
        <div id="social_security_number" class="customer_info half">
            <label>Social Security #:</label>
            <input class="validate" required type="text" placeholder="###-##-####"/>
        </div>
        <div id="property_type" class="customer_info half">
            <label>Property Type:</label>
            <select class="validate" required>
                <option>Residential</option>
                <option>Commercial</option>
            </select>
        </div>
        <div id="commercial">
            <div id="company_name" class="customer_info half">
                <label>Company Name:</label>
                <input class="validate" type="text" />
            </div>
            <div id="company_type" class="customer_info half">
                <label>Company Type:</label>
                <select class="validate">
                    <option>Corporation</option>
                    <option>LLC</option>
                </select>
            </div>

            <div id="personal_guarantee">
                <h2>Personal Guarantee</h2>
                <div id="com_address_toggle">
                    <input type="checkbox"/>
                    <span>Address same as above</span>
                </div>
            </div>
            <div id="com_first_name" class="customer_info quarter com_address">
                <label>First Name:</label>
                <input class="validate" type="text"/>
            </div>
            <div id="com_last_name" class="customer_info quarter com_address">
                <label>Last Name:</label>
                <input class="validate" type="text"/>
            </div>
            <div id="com_address_1" class="customer_info half com_address">
                <label>Address 1:</label>
                <input class="validate" type="text"/>
            </div>
            <div id="com_address_2" class="customer_info com_address">
                <label>Address 2:</label>
                <input class="validate" type="text"/>
            </div>
            <div id="com_city" class="customer_info quarter com_address">
                <label>City:</label>
                <input class="validate" type="text"/>
            </div>
            <div id="com_state" class="customer_info eighth com_address">
                <label>State:</label>
                <input class="validate" type="text">
            </div>
            <div id="com_zip" class="customer_info eighth com_address">
                <label>Zip:</label>
                <input class="validate" type="text"/>
            </div>
            <div id="com_county" class="customer_info quarter com_address">
                <label>County:</label>
                <input class="validate" type="text"/>
            </div>
            <div id="com_country" class="customer_info quarter com_address">
                <label>Country:</label>
                <input class="validate" type="text"/>
            </div>
        </div>
    </div>
</div>
