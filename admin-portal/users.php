<!doctype html>
<html>
<head>
<meta charset="UTF-8">

<title>Users | SableCRM+ Admin Portal</title>

<?php require_once('partials/head.php'); ?>

</head>

<body>

<?php require_once('partials/header.php'); ?>

<section id="users" class="page">

    <div id="page-heading-container" class="container">
        <div id="page-heading">
            <i class="icon-users"></i>
            <div id="page-heading-text">
                <h1>Users</h1>
                <p>Admin Portal</p>
            </div>
        </div>
    </div>

    <div class="container">

        <div id="users-header">
            <div class="left">
                <input id="user-search" placeholder="Filter users"/>
            </div>
            <div class="right">
                <a href="edit-user.php"><i id="create-new-user" class="icon-plus"></i></a>
            </div>
        </div>

        <div id="users-table" class="table">

            <div class="table-headings">
                <div>User</div>
                <div>Type</div>
                <div>Email</div>
                <div>Phone</div>
            </div>

            <div class="table-row">
                <div class="table-cell">
                    <a href="edit-user.php?userId=12345" class="user-name">Paul Moore</a>
                </div>
                <div class="table-cell">Tech</div>
                <div class="table-cell">
                    <a href="mailto:info@sablecrm.com">info@sablecrm.com</a>
                </div>
                <div class="table-cell">
                    <a href="tel:5555555555">(555) 555-5555</a>
                </div>
            </div>

            <div class="table-row">
                <div class="table-cell">
                    <a href="edit-user.php?userId=12345" class="user-name">Keanu Reeves</a>
                </div>
                <div class="table-cell">Admin</div>
                <div class="table-cell">
                    <a href="mailto:info@sablecrm.com">info@sablecrm.com</a>
                </div>
                <div class="table-cell">
                    <a href="tel:5555555555">(555) 555-5555</a>
                </div>
            </div>

            <div class="table-row">
                <div class="table-cell">
                    <a href="edit-user.php?userId=12345" class="user-name">Carrie-Anne Moss</a>
                </div>
                <div class="table-cell">Sales</div>
                <div class="table-cell">
                    <a href="mailto:info@sablecrm.com">info@sablecrm.com</a>
                </div>
                <div class="table-cell">
                    <a href="tel:5555555555">(555) 555-5555</a>
                </div>
            </div>

        </div>

    </div>

</section>

<?php require_once('partials/footer.php'); ?>

<div id="modal-container">

</div>

<script>

    $('#user-search').bind("propertychange change click keyup input paste", function() {

        let search = $(this).val().trim();

        $('.table-row').each(function() {
            if ($(this).children('.table-cell').text().toLowerCase().indexOf(search.toLowerCase()) > -1) {
                $(this).css('display','flex');
            } else {
                $(this).css('display','none');
            }
        });

    });

</script>

</body>
</html>
