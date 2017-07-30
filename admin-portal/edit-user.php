<!doctype html>
<html>
<head>
<meta charset="UTF-8">

<title>Edit User | SableCRM+ Admin Portal</title>

<?php require_once('partials/head.php'); ?>

</head>

<body>

<?php require_once('partials/header.php'); ?>

<section id="edit-user" class="page">

    <div id="page-heading-container" class="container">
        <div id="page-heading">
            <i class="icon-pencil"></i>
            <div id="page-heading-text">
                <h1>Edit User</h1>
                <p>Admin Portal</p>
            </div>
        </div>
    </div>

    <?php require_once('modules/user-info.php'); ?>
    <?php require_once('modules/tech-details.php'); ?>
    <?php require_once('modules/sales-details.php'); ?>

</section>

<?php require_once('partials/footer.php'); ?>

<div id="modal-container">

        <div id="delete-confirmation" class="modal" style="display: none;">
            <h2>Are you sure?</h2>
            <p>This action will permanently delete the user. Please confirm or cancel below.</p>
            <div class="modal-buttons">
                <div class="button cancel">Cancel</div>
                <div id="confirm-user-delete" class="button green-button">Confirm Delete</div>
            </div>
        </div>

</div>

</body>
</html>
