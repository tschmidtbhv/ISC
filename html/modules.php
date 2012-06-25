<?php

// No direct access.
defined('_JEXEC') or die;

// function used to modify module displaying
// usage: <jdoc:include type="modules" name="....." style="custom"/>

function modChrome_custom($module, &$params, &$attribs)
{
    echo '<div class="moduletable'.htmlspecialchars($params->get('moduleclass_sfx')).'">';
    if ($module->showtitle) {
        //my custom module title
        echo '### <strong>'.$module->title.'</strong>';
    }
    echo $module->content;
    echo '</div>';
    
}

