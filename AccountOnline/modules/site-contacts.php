<?php

    $em_contact_vars = array('contype_id' => 'contypes', 'auth_id' => 'authorities', 'relation_id' => 'relations', 'phonetype_id' => 'phonetypes');

    foreach($em_contact_vars as $key => $value)
    {
        $em_contacts = $_SESSION[GetData]->Get($value);

        $$key = $_SESSION[Post]->Post('GetData', $em_contacts, 'array');
    }

?>

<div id="site-contacts" class="module">
    <div class="module-header">
        <div class="module-name">Site Contacts</div>
        <img class="collapse-toggle" src="images\down-arrow.png"/>
    </div>
    <div class="column-headings">
        <div class="contact-edit"></div>
        <div class="contact-name">Contact Full Name</div>
        <div class="contact-relation">Relation</div>
        <div class="contact-number">Phone Number</div>
        <div class="contact-phone-type">Type</div>
        <div class="contact-passcode">Passcode</div>
        <div class="contact-delete"></div>
    </div>
    <div id="js_contacts_module" class="module-body">
        <!-- DYNAMICALLY GENERATED CONTENT -->
    </div>
    <div id="add_contact">
        <input type="button" class="button" value="+ Add Contact"/>
    </div>
    <div id="contact-form">
        <div id="contact-form-heading">New Contact</div>
        <div id="contact-form-body">
            <div id="contact-form-first" class="contact-input">
                <label>First Name:</label>
                <input type="text" class="validate" required/>
            </div>
            <div id="contact-form-last" class="contact-input">
                <label>Last Name:</label>
                <input type="text" class="validate" required/>
            </div>
            <div id="contact-form-type" class="contact-input">
                <label>Contact type:</label>
                <select>
                    <?php
                        foreach($contype_id as $contype)
                        {
                            $selected = (strtolower(trim($contype->descr)) == 'asaper contact') ? 'selected' : '';

                            echo'
                                <option value="'.trim($contype->ctactype_id).'" '.$selected.'>'.trim($contype->descr).'</option>
                            ';
                        }
                    ?>
                </select>
            </div>
            <div id="contact-form-relationship" class="contact-input">
                <label>Relationship:</label>
                <select>
                    <?php
                        foreach($relation_id as $relation)
                        {
                            $selected = (strtolower(trim($relation->descr)) == 'owner') ? 'selected' : '';

                            echo'
                                <option value="'.trim($relation->relation_id).'" '.$selected.'>'.trim($relation->descr).'</option>
                            ';
                        }
                    ?>
                </select>
            </div>
            <div id="contact-form-authority" class="contact-input">
                <label>Authority Level:</label>
                <select>
                    <?php
                        foreach($auth_id as $authority)
                        {
                            $selected = (strtolower(trim($authority->descr)) == 'full authority') ? 'selected' : '';

                            echo'
                                <option value="'.trim($authority->auth_id).'" '.$selected.'>'.trim($authority->descr).'</option>
                            ';
                        }
                    ?>
                </select>
            </div>
            <div id="contact-form-passcode" class="contact-input">
                <label>Passcode:</label>
                <input type="text" class="validate" required/>
            </div>

            <div class="divider"></div>

            <div id="contact-form-number" class="contact-input">
                <label>Phone Number:</label>
                <input type="text" class="validate" required/>
            </div>
            <div id="contact-form-phone-type" class="contact-input">
                <label>Phone Type:</label>
                <select>
                    <?php
                        foreach($phonetype_id as $phonetype)
                        {
                            $selected = (strtolower(trim($phonetype->descr)) == 'cellular phone') ? 'selected' : '';

                            echo'
                                <option value="'.trim($phonetype->phonetype_id).'" '.$selected.'>'.trim($phonetype->descr).'</option>
                            ';
                        }
                    ?>
                </select>
            </div>
            <div id="contact-form-landline" class="contact-input checkbox">
                <input type="checkbox"/><label>Call Landline First</label>
            </div>
            <div id="contact-form-enhanced" class="contact-input checkbox">
                <input type="checkbox"/><label>Enhanced (ECV)</label>
            </div>
            <div id="contact-form-key" class="contact-input checkbox">
                <input type="checkbox"/><label>Has Key</label>
            </div>
            <div id="contact-form-signer" class="contact-input checkbox">
                <input type="checkbox"/><label>Contract Signer</label>
            </div>
        </div>
        <div id="contact-form-buttons">
            <div id="contact-order">
                <label>Contact Order:</label>
                <input type="number"/>
            </div>
            <input id="cancel" type="button" class="button" value="Cancel"/>
            <input id="save" type="button" class="button green-button" value="Save"/>
        </div>
    </div>
</div>