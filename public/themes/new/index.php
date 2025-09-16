<?php function_exists('theme') or exit;?>

{layout name="layout" /}

<div id="app">
    welcome {{message}}
</div>

<script src="{:theme('js/index.js')}"></script>
