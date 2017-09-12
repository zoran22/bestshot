<?php
namespace Core;

class Application
{

    const PUBLIC_FOLDER = 'public';

    public function loadTemplate($templateName, $data = null)
    {

        include self::PUBLIC_FOLDER . '/' . $templateName . '.php';
    }

    public function checkLogin()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: login.php');
            echo 'Your session has expired. Please sign in again.';
            exit();
//        } elseif ($_SESSION['role_id'] === '2') {
//            echo 'You are not authorised!';
//            // This was missing
//            header('Location: ' . DIR);
//            exit();
        }
    }
    
// Display custom length of the text
    public static function customLength($string, $length)
    {
        if (strlen($string) <= $length) {
            echo $string;
        } else {
            $strShorten = mb_substr($string, 0, $length) . '...';
            echo $strShorten;
        }
    }
}