<?php
    use google\appengine\api\users\User;
    use google\appengine\api\users\UserService;
    function initialize()
    {
        $user = UserService::getCurrentUser();
        if($user)
        {
            $greettingMessage = verifyGreetingMessage();
    
            echo 'Hello: ' . htmlspecialchars($user->getNickName());
            if($greettingMessage)
            {
                echo '<br/>Greetting: ' . $greettingMessage;
            }
        }
        else{
            header('Location: ' . UserService::createLoginURL($_SERVER[REQUEST_URI]));
        }
    }
    function verifyGreetingMessage()
    {
        if($_POST)
        {
            if(array_key_exists('content', $_POST))
            {
                return $_POST['content'];
            }
        }
    
        return NULL;
    }
    
?>
<html>
    <head>
        <?require_once 'baseHead.php';?>

    </head>
    <body>
        <?require_once 'header.php';?>
        <?initialize();?>

        <form src="" method="post">
            <input name="content" />
            <input type="submit" />
        </form>
    </body>
</html>
