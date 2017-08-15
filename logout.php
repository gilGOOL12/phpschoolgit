<link href="newcss.css" rel="stylesheet" type="text/css"/>

<?php
session_start();
session_destroy();
echo '<div class="incontainer">';
echo "thank you you logged out";
echo '</div>';
