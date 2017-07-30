<?php

    $testcats = $_SESSION[GetData]->Get('testcats');

    $testcats = $_SESSION[Post]->Post('GetData', $testcats, 'array');

    for($i = 0; $i < 60; $i++)
    {
        $x = $i < 10 ? '0': '';

        if($i < 25)
        {
            $hours .= '<option>'.$x.$i.'</option>';
        }

        $minutes .= '<option>'.$x.$i.'</option>';
    }

?>

<div id="site-test" class="module"> <!-- Add 'testing' class to site-test module to show alternate heading -->
    <div class="module-header">
        <div class="module-name">Site Test</div>
        <div id="test-heading" class="module-name">
            <img src="images\alert-icon.png"/>
            <div>Site - On Test Until <span id="test-end-date">December 23 @ 1:17 AM</span></div>
        </div>
        <img class="collapse-toggle" src="images\down-arrow.png"/>
    </div>
    <div class="module-body">
        <div id="test-hours" class="test-input">
            <label>Hours:</label>
            <select>
                <?php echo($hours) ?>
            </select>
        </div>
        <div id="test-minutes" class="test-input">
            <label>Minutes:</label>
            <select>
                <?php echo($minutes) ?>
            </select>
        </div>
        <div id="test-category" class="test-input">
            <label>Test Category:</label>
            <select>
                <?php
                    foreach($testcats as $testcat)
                    {
                        echo'
                            <option value="'.trim($testcat->testcat_id).'" data-default_hours="'.trim($testcat->default_hours).'">'.trim($testcat->descr).'</option>
                        ';
                    }
                ?>
    		</select>
        </div>
        <div id="test-buttons" class="test-input">
            <input id="apply-test" type="button" class="button" value="Apply Test"/>
            <div class="divider"></div>
            <input id="cancel-test" type="button" class="button red-button" value="Cancel Test"/>
        </div>
    </div>
</div>