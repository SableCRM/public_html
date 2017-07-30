<?php

    require_once "../../../Integration/ZOHO-API/zoho.php";
    require_once "../../../Integration/Connection.php";

    $dbconn = new Connection();

    $error = [];

    // connect to database and get zoho auth token...
    $sql = $dbconn->prepare("SELECT * FROM sablrcrm_test.ZOHO_USER WHERE ZOHO_USER.COMPANY_ID = ?");

    try{
        $sql->execute([

                $_GET["company"]
        ]);

    } catch(Exception $e) {

        $error[] = $e->getMessage();
    }

    $authToken = false;
    if($sql->rowCount() > 0){

        $rows = $sql->fetchAll(PDO::FETCH_OBJ);

        $authToken = $rows[0]->ZOHO_AUTH_ID;

    } else {

        $error[] = "Sable was unable to Authenticate with Zoho CRM.";
    }

    // get user from zoho crm using user id...
    $zohoApi = new Zoho($authToken);

    $user = $zohoApi->Get("CustomModule2", $_GET["user"], "array");

    $name = explode(" ", $user["Contact Name"]);

    echo "<pre>";print_r($user);echo "</pre>";

    if(count($user) < 1){

        $error[] = "Sable was unable to find user in Zoho CRM.";
    }

    if(count($error) > 0){

        print_r($error);exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sable | User</title>

<!--	<link rel="stylesheet" href="css/style.css">-->

	<!--[if IE]>
	<!--<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>-->
	<![endif]-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
        #address{
            display: flex;
            flex-flow: column wrap;
        }
        #address label{
            display: flex;
            justify-content: space-between;
            margin: 0 1px;
        }
    </style>
</head>

<body>

<h1>SableCRM+ User Update Form</h1>

<div id="user">

    <label for="firstname">Firstname</label>
    <input type="text" id="firstname" placeholder="Firstname" value="<?php echo $name[0] ?>">

    <label for="lastname">Lastname</label>
    <input type="text" id="lastname" placeholder="Lastname" value="<?php echo $name[1] ?>">

    <label for="lastname">Email</label>
    <input type="text" id="email" placeholder="Email" value="<?php echo $user["Email"] ?>">

    <label for="phone">Phone</label>
    <input type="text" id="phone" placeholder="Phone" value="<?php echo $user["Phone"] ?>">

</div>

<div id="address">

    <label for="address1">Address1</label>
    <input type="text" id="address1" placeholder="Address1" value="<?php echo $user["Address"] ?>">

    <label for="address2">Address2</label>
    <input type="text" id="address2" placeholder="Address2" value="<?php ?>">

    <label for="city">City</label>
    <input type="text" id="city" placeholder="City" value="<?php echo $user["City"] ?>">

    <label for="state">State</label>
    <input type="text" id="state" placeholder="State" value="<?php echo $user["State"] ?>">

    <label for="zip">Zipcode</label>
    <input type="text" id="zip" placeholder="Zipcode" value="<?php echo $user["Zip Code"] ?>">

    <label for="county">County</label>
    <input type="text" id="county" placeholder="County" value="<?php ?>">

    <label for="country">Country</label>
    <select id="country">
        <option value="USA">US</option>
        <option value="CA">CA</option>
    </select>

</div>

<input type="button" id="add_user" value="Add User">
<input type="button" id="update_user" value="Update User">

<div id="modal">
    <div id="status"></div>
</div>

<div id="details">


</div>

<script>
    $(document).ready(function(){

        $(country).on("change", function(){

            let address = $("#address");

            if($(this).val().toLowerCase() === "ca"){

                address.find("label[for=state]").html("Province");
                address.find("#state").attr("placeholder", "Province");

                address.find("label[for=zip]").html("Postal Code");
                address.find("#zip").attr("placeholder", "Postal Code");

                address.find("label[for=county]").hide();
                address.find("#county").hide();

            } else if($(this).val().toLowerCase() === "usa") {

                address.find("label[for=state]").html("State");
                address.find("#state").attr("placeholder", "State");

                address.find("label[for=zip]").html("Zipcode");
                address.find("#zip").attr("placeholder", "Zipcode");

                address.find("label[for=county]").show();
                address.find("#county").show();
            }
        });

        $("#add_user").on("click", function(){

        });

        $("#update_user").on("click", function(){

        });
    });
</script>

</body>
</html>