<?php

namespace Service;

use Data\User;
use Exception;

/**
 * Description of UserService
 *
 * @author zoran
 */
class UserService {

    /**
     *
     * @var \Database\PDODatabase;
     */
    private $db;

    /**
     *
     * @param type $db
     */
    public function __construct($db) {
        $this->db = $db;
    }

    /**
     *
     * @param string $name
     * @param string $email
     * @param string $password
     * @param string $confirmPassword
     * @param string $token
     * @param string $profilePic
     * @throws Exception
     */
    public function register(string $name, string $email, string $password, string $confirmPassword, string $profilePic = null) {
        if ($this->checkMailExists($email)) {
            throw new Exception('This email is already taken!');
        }
        if ($password != $confirmPassword) {
            throw new Exception('Passwords Mistmatch!');
        }
        $passwordHashed = $this->hashPassword($password);
        $confirmCode = $this->hashPassword(date('Y-m-d H:i:s') . $email);
        $query = "INSERT INTO users (`name`, email, password, confirm_code, profile_pic) VALUES (?,?,?,?,?);";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$name, $email, $passwordHashed, $confirmCode, $profilePic]);

        if ($this->sendConfMail($email)) {
            return true;
        }
    }

    /**
     * Checks if a User with the same email already exists in the Database
     * @param string $email
     * @return boolean
     */
    public function checkMailExists($email) {
        $query = "SELECT id FROM users WHERE email=? LIMIT 1;";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$email]);
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    

    public function changeEmail($email, $id) {
        $query = "UPDATE users SET email=? WHERE id=?;";
        $stmt = $this->db->prepare($query);
        if ($stmt->execute([$email, $id])) {
            return true;
        }
    }

    /**
     * 
     * @param type $id
     * @param type $profilePic
     * @return boolean
     */
    public function updateProfilePic($id, $profilePic = NULL) {
        $query = "UPDATE users SET profile_pic=? WHERE id=?";
        $stmt = $this->db->prepare($query);
        if ($stmt->execute([$profilePic, $id])) {
            return true;
        }
    }

    public function emailActivate() {
        $email = trim($_GET['email']);
        $code = trim($_GET['code']);
        if (!empty($email) && !empty($code)) {
            $stmt = $this->db->prepare("UPDATE users SET confirmed = '1' WHERE email = :email AND confirm_code = :code");
            $stmt->execute(array(
                ':email' => $email,
                ':code' => $code
            ));
            if ($stmt->rowCount() == 1) {
                return true;
            }
        }
    }

    private function sendConfMail($email) {
        // require_once './MailService/confTemplate.php';
        $query = "SELECT name, confirm_code FROM users WHERE email=?;";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$email]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);
        $subject = "Активиране на акаунт";

        //$message = "Hello " . $user['name'] .
        //"!<br/>Please press on the following link to activate your account:
        //  <br/><br/><a href=\"http://www.bestshot.ml/activate.php?email=" . $email . "&code=" . $user['confirm_code'] . "\">Activate!</a>";
        $message = file_get_contents('MailService/confTemplate.php', FILE_USE_INCLUDE_PATH);
        $message = str_replace('%name%', $user['name'], $message);
        $message = str_replace('%email%', $email, $message);
        $message = str_replace('%code%', $user['confirm_code'], $message);
        if ($this->send_mail($email, $subject, $message)) {
            return true;
        }
    }

    public function send_mail($email, $subject, $message) {
        $mail = new MailService\PHPMailer();
        $mail->CharSet = "UTF-8";
        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;
        $mail->AddAddress($email);
        $mail->Username = "bestshot.test@gmail.com";
        $mail->Password = "bestshot";
        $mail->SetFrom('bestshot.test@gmail.com', 'bestshot.vacao.com');
        $mail->AddReplyTo("bestshot.test@gmail.com", "bestshot.vacao.com");
        $mail->Subject = $subject;

        $mail->msgHTML($message);
        //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));


        if (!$mail->Send()) {
            echo "Message could not be sent. <p>";
            echo "Mailer Error: " . $mail->ErrorInfo;
            exit;
        }
        return true;
        // echo "Message has been sent";
    }

    /**
     *
     * @param type $password
     * @return hash hash a string
     */
    private function hashPassword($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     *
     * @param type $passwordHashed
     * @param type $password
     * @return bool
     */
    private function passVerify($passwordHashed, $password): bool {
        return password_verify($password, $passwordHashed);
    }

    /**
     *
     * @param type $email
     * @param type $password
     * @return boolean
     */
    public function login($email, $password) {
        $query = "SELECT id, role_id, name, email, profile_pic, password FROM users WHERE email=?;";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$email]);
        /* @var $user User */
        $user = $stmt->fetchObject(User::class);
        if (!$user) {
            return false;
        }
        $passwordHashed = $user->getPassword();
        if ($this->passVerify($passwordHashed, $password)) {
            $_SESSION['user_id'] = $user->getId();
            $_SESSION['user_name'] = $user->getName();
            $_SESSION['user_email'] = $user->getEmail();
            $_SESSION['role_id'] = $user->getRole_id();
            $_SESSION['profile_pic'] = $user->getProfile_pic();
            return true;
        }
// Same as ' }else{ return false; };
        return false;
    }

    public function loginAdmin($email, $password) {
        /* @var $user User */
        $query = "SELECT id, role_id, name, email, password FROM users WHERE email=?;";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$email]);
        $user = $stmt->fetchObject(User::class);
        if ($user->getRole_id() === "1") {
            $passwordHashed = $user->getPassword();
            if ($this->passVerify($passwordHashed, $password)) {
                $_SESSION['user_id'] = $user->getId();
                $_SESSION['user_name'] = $user->getName();
                $_SESSION['user_email'] = $user->getEmail();
                $_SESSION['role_id'] = $user->getRole_id();
                return true;
            }
        }
        return false;
    }

    /**
     *
     * @param type $oldPass
     * @param type $newPass
     * @throws Exception
     */
    public function changePass($oldPass, $newPass, $id) {
        //Check if the user correctly typed the old pass
        /* @var $user  User */
        $queryOldPass = "SELECT id, password FROM users WHERE id=?;";
        $stmt = $this->db->prepare($queryOldPass);
        $stmt->execute([$id]);
        $user = $stmt->fetchObject(User::class);
        $oldPassHash = $user->getPassword();
        if (!$this->passVerify($oldPassHash, $oldPass)) {
            throw new Exception('Wrong password');
        }

// Now, we can change it
        $newPassHash = $this->hashPassword($newPass);
        $queryUpdate = "UPDATE users SET password=? WHERE id=?";
        $stmtUpdate = $this->db->prepare($queryUpdate);
        $stmtUpdate->execute([$newPassHash, $user->getId()]);
//        header('Location: index.php');
//        exit();
        return true;
    }

    public function checkLogin() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: login.php");
            exit();
        }
    }

    public function getUsers() {
        $query = "SELECT * FROM users ORDER BY id DESC;";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        while ($user = $stmt->fetchObject(User::class)) {
            yield $user;
        }
    }

    /**
     *
     * @param type $user_id
     * @return object
     * @throws Exception
     */
    public function getCurrentUser($user_id) {
        $query = "SELECT id, role_id, `name`,email, password, password, confirmed, created_at, updated_at, profile_pic FROM users WHERE id=?;";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$user_id]);

        if (!$user = $stmt->fetchObject(User::class)) {
            throw new Exception('Could not fetch user-data from database');
        }
        return $user;
    }

    public function changeRole($userId, $roleId) {
        $query = "UPDATE users SET role_id=? WHERE id=?;";
        $stmt = $this->db->prepare($query);
        if ($stmt->execute([$roleId, $userId])) {
            return true;
        }
    }

    public function changeName($name, $id) {
        $query = "UPDATE users SET `name`=? WHERE id=?";
        $stmt = $this->db->prepare($query);

        if ($stmt->execute([$name, $id])) {
            return true;
        }
    }

    public function removeUser($userId) {
        $query = "DELETE FROM users WHERE id=?;";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$userId]);
        header('Location: ' . DIRADMINPANEL . 'users.php');
        exit();
    }


}
