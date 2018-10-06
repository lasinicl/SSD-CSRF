<?php
    if(isset($_POST['csrfToken']))
    {
     	if($_POST['csrfToken'] == $_COOKIE['csrfCookie'])
        {
            echo '<script language="javascript">';
            echo 'alert("Protected from CSRF!")';
            echo '</script>';
        }
        else 
        {	
            echo '<script language="javascript">';
            echo 'alert("Affected by CSRF!")';
            echo '</script>';
        }
    }
    else 
    {
    	echo '<script language="javascript">';
        echo 'alert("Failed!")';
        echo '</script>';
    }    
?>

