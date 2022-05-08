<html>
    <body>
        <form action="btnclick.php" method="get">
            <input type="submit" name="on" value="on">
            <input type="submit" name="off" value="off">
        </form>
    </body>
</html>
<?php
    if(isset($_GET['on'])) {
        onFunc();
    }
    if(isset($_GET['off'])) {
        offFunc();
    }

    function onFunc(){
        echo "Button on Clicked";
        







    }
    function offFunc(){
        echo "Button off clicked";

        
    }
?>