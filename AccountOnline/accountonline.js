$('#add_contact input').click(AddContact);

$('#save').click(SaveContact);

$('#cancel').click(CancelSaveContact);

$('#test-category select').change(SetTestTime);

$(document).ready(SetTestTime());

$('#add-zone input').click(AddZone);

$('#js_zone_module').click(ZoneModuleEventHandler);
//$("#js_zone_module").on("click", ".zone", ZoneModuleEventHandler);

$('#contact-form').css('display', 'none');

let collapse_toggle = document.querySelectorAll('.collapse-toggle');

collapse_toggle.forEach(function (item) {
    item.addEventListener('click', collapse);
});

let agencies = document.querySelectorAll('.agency');
agencies.forEach(function (item) {
    item.addEventListener('click', AgencySelected);
});


function collapse(e)
{
    let module = e.target.parentNode.parentNode;
    let view = module.querySelectorAll('.module-body, .column-headings, #add_contact, #contact-form, #add-zone, #zone-list-footer, #filters');

    if (module.dataset.hidden == 'false' || module.dataset.hidden == undefined)
    {
        e.target.src = 'images\\up-arrow.png';
        ShowHideView(view, 'none');
        module.dataset.hidden = 'true';
    }
    else
    {
        e.target.src = 'images\\down-arrow.png';
        ShowHideView(view, 'flex');
        module.dataset.hidden = 'false';
    }
}

function ShowHideView(view, display)
{
    for (let i = 0; i < view.length; i++)
    {
        if (view[i].id == 'contact-form' && display == 'flex')
        {
            continue;
        }
        view[i].style.display = display;
    }
}

function AddContact() {
	$('#contact-order input').val($('#js_contacts_module').prop('children').length + 1);

    $('#contact-form').slideDown();
}

function EditContact(e) {
    let contact_input = document.querySelectorAll('.contact-input input:checked, .contact-input input, .contact-input select');
    ClearEditMode();
    e.src = 'images\\edit-icon-gold.png';
    //noinspection JSAnnotator
    e.parentNode.parentNode.classList += ' is-being-edited';
    let selected_contact = e.parentNode.parentNode.dataset;
    contact_input[0].value = selected_contact.fname;
    contact_input[1].value = selected_contact.lname;
    SearchDropdown(contact_input[2], selected_contact.contype);
    SearchDropdown(contact_input[3], selected_contact.relation);
    SearchDropdown(contact_input[4], selected_contact.authority);
    contact_input[5].value = selected_contact.passcode;
    contact_input[6].value = selected_contact.phone;
    SearchDropdown(contact_input[7], selected_contact.phonetype);
    contact_input[9].checked = JSON.parse(selected_contact.enhanced);
    contact_input[10].checked = JSON.parse(selected_contact.has_key);
    contact_input[11].checked = JSON.parse(selected_contact.signer);
    $('#contact-order input').val(selected_contact.order);

    $('#contact-form').slideDown();
}

function ClearEditMode()
{
    let contacts = document.querySelector('#js_contacts_module').children;
    for (let i = 0; i < contacts.length; i++)
    {
        contacts[i].children[0].children[0].src = 'images\\edit-icon.png';
        contacts[i].classList.remove('is-being-edited');
    }
}

function SearchDropdown(dropdown, search) {
    for (let i = 0; i < dropdown.children.length; i++) {
        if (dropdown.children[i].value === search) {
            dropdown.children[i].selected = true;
        } else {
            dropdown.children[i].selected = false;
        }
    }
}

function DeleteContact(e)
{
    $(e.parentNode.parentNode).slideUp(400, function()
    {
        $(this).remove();
    })
}

function SaveContact(contacts, external = false) //need to assign edit and delete functionality by using addEventListener() function instead of writing them inline.
{
    let contact_input = document.querySelectorAll('.contact-input input:checked, .contact-input input, .contact-input select');

    let contact_form = $('#js_contacts_module');

    if(external)
    {
        contact_input[0].value = contacts.first_name;
        contact_input[1].value = contacts.last_name;
        contact_input[2].value = contacts.ctactype_id;
        contact_input[3].value = (contacts.relation_id) ? contacts.relation_id : 'UNWN';
        contact_input[4].value = contacts.auth_id;
        contact_input[5].value = (contacts.pin) ? contacts.pin : '';
        contact_input[6].value = contacts.phone1;
        contact_input[7].value = contacts.phonetype_id1;
        contact_input[9].checked = (contacts.contltype_no) ? true : false;
        contact_input[10].checked = (contacts.has_key_flag == 'Y') ? true : false;
        contact_input[11].checked = (contacts.contract_signer_flag == 'Y') ? true : false;
        $('#contact-order input').val(contacts.ctaclink_no);
    }

    let contact = '<div class="contact"' +
            'data-fname="' + contact_input[0].value +
            '" data-lname="' + contact_input[1].value +
            '" data-contype="' + $('option:selected', contact_input[2]).val() +
            '" data-relation="' + $('option:selected', contact_input[3]).val() +
            '" data-authority="' + $('option:selected', contact_input[4]).val() +
            '" data-passcode="' + contact_input[5].value +
            '" data-phone="' + contact_input[6].value +
            '" data-phonetype="' + $('option:selected', contact_input[7]).val() +
            '" data-enhanced="' + contact_input[9].checked +
            '" data-has_key="' + contact_input[10].checked +
            '" data-signer="' + contact_input[11].checked +
            '" data-order="' + $('#contact-order input').val() +
            '"><div class="contact-edit"><img src="images\\edit-icon.png" onclick="EditContact(this)"/></div><div class="contact-name">' +
            contact_input[0].value +
            ' ' + contact_input[1].value +
            '</div><div class="contact-relation">' +
            $('option:selected', contact_input[3]).val() +
            '</div><div class="contact-number">' +
            contact_input[6].value +
            '</div><div class="contact-phone-type">' +
            $('option:selected', contact_input[7]).val() +
            ' <img src="images\\phone-type-cell-icon.png"/></div><div class="contact-passcode">' +
            contact_input[5].value + '</div><div class="contact-delete"><img src="images\\delete-icon.png" onclick="DeleteContact(this)"/></div></div>';

    contact = GetHtmlFromString(contact, '.contact');

    if (contact_input[5].value)
    {
        $(contact).addClass('pin');
    }

    if ($('.contact', contact_form).hasClass('is-being-edited'))
    {
        $('.is-being-edited', contact_form).replaceWith(contact);
    }

    else
    {
        $(contact_form).append(contact);
    }

    $('#contact-form-passcode input').val('');

    /**
     * @todo need to construct statement so it removes validation when 1 codeword is added and adds validation
     * when no codeword exists or multiple contacts have codeword.
     */
    if($('.pin', contact_form).length > 0)
    {
        $('#contact-form-passcode input').prop('required', false);
    }

    $('#contact-form').slideUp();
}




function CancelSaveContact(e)
{
    ClearEditMode();

    $('#contact-form').slideUp();
}

function AgencySelected(e) {
    let agency_module = document.querySelector('#js_agency_module');
    if (e.target.type === 'checkbox') {
        if (e.target.parentNode.parentNode.classList.contains('is-selected')) {
            e.target.parentNode.parentNode.classList.remove('is-selected');
            agency_module.insertBefore(e.target.parentNode.parentNode, agency_module.lastChild);
        } else {
            //noinspection JSAnnotator
            e.target.parentNode.parentNode.classList += ' is-selected';
            agency_module.insertBefore(e.target.parentNode.parentNode, agency_module.firstChild);
        }
    } else {
        if (e.target.parentNode.classList.contains('is-selected')) {
            e.target.parentNode.classList.remove('is-selected');
            agency_module.insertBefore(e.target.parentNode, agency_module.lastChild);
        } else {
            e.target.parentNode.classList += ' is-selected';
            agency_module.insertBefore(e.target.parentNode, agency_module.firstChild);
        }
        e.target.parentNode.querySelector('div input[type=checkbox]').checked = (e.target.parentNode.classList.contains('is-selected')) ? true : false;
    }
}

function GetAgencies() {
    let agency = '';
    let agencies = js_agency_module.querySelectorAll('#js_agency_module .is-selected');
    for (let i = 0; i < agencies.length; i++) {
        agency +=
        '<SiteAgencyPermit agencytype_id="' + agencies[i].dataset.agencytype_id +
        '" phone1="' + agencies[i].dataset.phone1 +
        '" agency_no="' + agencies[i].dataset.agency_no + '" />';
    }

    return agency;
}

function GetZones() {
    let zone = '';
    $('#js_zone_module .zone').each(function () {
        zone +=
                '<Zone zone_id="' + $(this).find('.zone-number').html() +
                '" zonestate_id="A" event_id="' + $(this).find('.zone-type select option:selected').val() +
                '" equiploc_id="OTHR" equiptype_id="' + $(this).find('.zone-hardware select option:selected').val() +
                '" zone_comment="' + $(this).find('.zone-name').html() +
                '" />';
    });

    return zone;
}

function GetContacts() {
    // <Contact last_name="Contact"
    // first_name="First"
    // ctactype_id="MON"
    // relation_id="OWN"
    // auth_id="FULL"
    // pin="12345"
    // contract_signer_flag="Y"
    // has_key_flag="Y"
    // phone1="9722223333"
    // phonetype_id1="CL"
    // email_address="fcontact@contact.com" />

    let contact = '';
    let contltype = '';
    let pin = '';
    var _homePhone = $('#contact-form-landline input').prop('checked');
    let contacts = js_contacts_module.querySelectorAll('#js_contacts_module .contact');
    for (let i = 0; i < contacts.length; i++) {
    	if(_homePhone == false)
    	{
    		if (contacts[i].dataset.enhanced == 'true' && contacts[i].dataset.order == 1)
            {
                contltype = 'contltype_no="5001"';
            }

            else if (contacts[i].dataset.enhanced && contacts[i].dataset.order == 2)
            {
                contltype = 'contltype_no="5000"';
            }

            else
            {
                contltype = '';
            }
    	}

    	else if(_homePhone == true)
    	{
    		if (contacts[i].dataset.enhanced == 'true' && contacts[i].dataset.order == 1)
            {
                contltype = 'contltype_no="5000"';
            }

            else
            {
                contltype = '';
            }
    	}

        if ($('.pin').length > 1)
        {
            pin = 'pin="' + contacts[i].dataset.passcode + '"';
        }

        contact +=
                '<Contact last_name="' + contacts[i].dataset.lname +
                '" first_name="' + contacts[i].dataset.fname +
                '" ctactype_id="' + contacts[i].dataset.contype +
                '" relation_id="' + contacts[i].dataset.relation +
                '" auth_id="' + contacts[i].dataset.authority +
                '" contract_signer_flag="' + ((JSON.parse(contacts[i].dataset.signer)) ? 'Y' : 'N') +
                '" has_key_flag="' + ((JSON.parse(contacts[i].dataset.has_key)) ? 'Y' : 'N') +
                '" phone1="' + contacts[i].dataset.phone +
                '" phonetype_id1="' + contacts[i].dataset.phonetype +
                '" ' + contltype + ' ' + pin + ' />';
    }

    return contact;
}

function SetTestTime() {
    let test_hours = document.querySelector('#test-hours select').children;
    let default_hours = document.querySelector('#test-category select');

    default_hours = '0' + default_hours.selectedOptions[0].dataset.default_hours;

    for (let i = 0; i < test_hours.length; i++) {
        if (test_hours[i].value === default_hours) {
            test_hours[i].selected = true;
        } else {
            test_hours[i].selected = false;
        }
    }
}

function AddZone(external, zone_id, zone_name, event_id, equiptype_id, existing) {
    let zone_module = '';

    $('#js_zone_module').each(function () {
        zone_module = this;
    });

    let zone = '<div class="zone">' +
            '<div class="zone-edit"><img src="images\\save-icon.png"/></div>' +
            //'<div class="zone-save"><img src="images\\save-icon.png"/></div>' +
            '<div class="zone-tested"><img src="images\\red-x-icon.png"/></div>' +
            '<div class="zone-tested"><input type="checkbox"></div>' +
            '<div class="zone-number"><input placeholder="#" type="text" maxlength="3"></div>' +
            '<div class="zone-name"><input placeholder="ZONE NAME" type="text"></div>' +
            '<div class="zone-type">' +
            '<select>' + ZoneDropdowns('event', zone_module) + '</select>' +
            '</div>' +
            '<div class="zone-hardware">' +
            '<select>' + ZoneDropdowns('equiptype', zone_module) + '</select>' +
            '</div>' +
            '<div class="zone-delete"><img src="images\\delete-icon.png"/></div>' +
            '</div>';

    zone = GetHtmlFromString(zone, '.zone');

    // if (external === true) {
    //     $(zone.children[0].children[0].src = 'images\\edit-icon.png');
    //     //$(zone.children[0]).removeClass('zone-edit');
    //     $(zone.children[2]).html(zone_id);
    //     $(zone.children[3]).html(zone_name);
    //
    //     $(zone).find('.zone-type select option').each(function () {
    //         if (this.value === event_id) {
    //             this.selected = true;
    //         } else {
    //             this.selected = false;
    //         }
    //     });
    //
    //     $(zone).find('.zone-hardware select option').each(function () {
    //         if (this.value === equiptype_id) {
    //             this.selected = true;
    //         } else {
    //             this.selected = false;
    //         }
    //     });
    // }

    if (external === true) {
        $(zone.children[0].children[0].src = 'images\\edit-icon.png');
        //$(zone.children[0]).removeClass('zone-edit');
        if(existing == "true"){
            existing = "checked";
        }
        else{
            existing = "";
        }
        //$(".zone-tested input").attr("checked", Boolean(existing))
        $(zone.children[2]).html('<input type="checkbox" ' + existing + ' disabled>');
        $(zone.children[3]).html(zone_id);
        $(zone.children[4]).html(zone_name);

        $(zone).find('.zone-type select option').each(function () {
            if (this.value === event_id) {
                this.selected = true;
            } else {
                this.selected = false;
            }
        });

        $(zone).find('.zone-hardware select option').each(function () {
            if (this.value === equiptype_id) {
                this.selected = true;
            } else {
                this.selected = false;
            }
        });
    }

    zone_module.appendChild(zone);
}

function ZoneDropdowns(dropdown, zone_module) {
    let option = '';

    try {
        let module = JSON.parse(zone_module.dataset[dropdown]);
        for (let i = 0; i < module.length; i++) {
            option += '<option value="' + module[i][dropdown + '_id'].trim() + '">' + module[i].descr.trim() + '</option>';
        }
    } catch (ex) {
        console.log(ex);
    }

    return option;
}

function ZoneModuleEventHandler(e) {
    //console.log(e);

    if (e.target.parentNode.classList.contains('zone-delete')) {
        e.target.parentNode.parentNode.remove();
    } else if (e.target.parentNode.classList.contains('zone-edit')) {
        e.target.src = 'images\\edit-icon.png';
        let zone_input = e.target.parentNode.parentNode.querySelectorAll('.zone-number input, .zone-name input');
        e.target.parentNode.parentNode.dataset.zone_id = zone_input[0].value;
        e.target.parentNode.parentNode.dataset.zone_comment = zone_input[1].value;
        e.target.parentNode.parentNode.dataset.event_id = e.target.parentNode.parentNode.querySelector('.zone-type select').selectedOptions[0].value;
        e.target.parentNode.parentNode.dataset.equiptype_id = e.target.parentNode.parentNode.querySelector('.zone-hardware select').selectedOptions[0].value;
        for (let i = 0; i < zone_input.length; i++) {
            zone_input[i].parentNode.innerHTML = zone_input[i].value;
            zone_input[i].remove();
        }
        e.target.parentNode.classList.remove('zone-edit');
        e.target.parentNode.classList += 'zone-save';
    } else if (e.target.parentNode.classList.contains('zone-save')) {
        e.target.src = 'images\\save-icon.png';
        let zone_input = e.target.parentNode.parentNode.querySelectorAll('.zone-number, .zone-name');
        for (let i = 0; i < zone_input.length; i++) {
            let input = document.createElement('input');
            if (i === 0) {
                input.setAttribute('placeholder', '#');
                input.setAttribute('maxlength', '3');
            } else {
                input.setAttribute('placeholder', 'ZONE NAME');
            }
            input.setAttribute('value', zone_input[i].innerHTML);
            zone_input[i].innerHTML = '';
            zone_input[i].appendChild(input);
        }
        e.target.parentNode.classList.remove('zone-save');
        e.target.parentNode.classList += 'zone-edit';
    }
}