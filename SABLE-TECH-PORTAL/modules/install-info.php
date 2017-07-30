<div id="install_info" class="module">
    <div class="module-header start_collapsed">
        <div class="module-name">Install Information</div>
        <img class="collapse-toggle" src="../images\down-arrow.png"/>
    </div>
    <div class="module-body">
        <div id="panel_location" class="install_info">
            <label>Panel Location:</label>
            <input name="Panel Location" class="validate" required type="text" value="<?php echo $_SESSION['deal-info']['Panel Location'] ?>"/>
        </div>
        <div id="transformer_location" class="install_info">
            <label>Transformer Location:</label>
            <input name="Transformer Location" class="validate" required type="text" value="<?php echo $_SESSION['deal-info']['Transformer Location'] ?>"/>
        </div>
    </div>
</div>
