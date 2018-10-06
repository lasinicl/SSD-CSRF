<?php
    if(isset($_COOKIE['sessionCookie']))
    {
        $file = fopen("token.txt", "r") or die("Unable to open file!");
        list($csrfToken, $sessionId) = explode(",",chop(fgets($file)),2); 
        fclose($file);
        if($_POST['csrfToken'] == $csrfToken)
        {
            if($_COOKIE['sessionCookie'] == $sessionId)
            {
    			echo '<script language="javascript">';
                echo 'alert("Protected from CSRF!")';
                echo '</script>';
            }
            else 
            {
    			echo '<script language="javascript">';
                echo 'alert("Affected by CSRF")';
                echo '</script>';
            }
        }
        else 
        {		
            echo '<script language="javascript">';
            echo 'alert("Affected by CSRF")';
            echo '</script>';
        }
    }
    else 
    {
    	echo '<script language="javascript">';
        echo 'alert("Failed")';
        echo '</script>';
    }
?>



