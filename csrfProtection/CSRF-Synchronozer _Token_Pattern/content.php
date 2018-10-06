<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="./css/styles.css">
        <script src="./public/jquery-3.3.1.min.js"></script>
        <title>Comment</title>
    </head>
    <body style="background: #D6EAF8">

    <form style="margin: auto; width:500px;" action="csrfvalidate.php" method="POST">
        <div class="container">
            <input type='hidden' name='csrfToken' id='csrfToken' value=''>                                         
            <div style="text-align: center;">
                <input type="text" name="comment" placeholder="Write your comment here..">
                <button style="width:100px; background-color: #117A65; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer;" type="submit" id="submit" name="submit">POST</button>
            </div>              
        </div>    
    </form>
    <div style="text-align: center;">
        <a href="logout.php">
        <button style="width:100px; background-color: #7D3C98; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer;" id="logout" name="logout" >Logout</button></a>
    </div> 
    
    <script type="text/javascript">    
        var request = "true";
        $.ajax({
            url:'token.php',
            method:'POST',
            data:{request:"request"},
            dataType:'json',
            success:function(data)
            {
               document.getElementById("csrfToken").value = data.token;
            }
        })
    </script>

</body>
</html>
