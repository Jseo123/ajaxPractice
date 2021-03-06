<?php

function objectRead()
{
    $userObject = file_get_contents("../data/users.json");

    $json = json_decode($userObject, true);
    $sUser = $json["users"]["0"]["user"];
    $sPass = $json["users"]["0"]["password"];
    $user = $_POST["log"];
    $pass = $_POST["pass"];

    $check = password_verify($pass, $sPass);


    if ($user === $sUser && $check === true) {
        session_start();
        $_SESSION["user"] = $user;
        $_SESSION["pass"] = $pass;

        header("Location: ../dashboard.php");
    } else {
        header("Location: ../index.php?error");
    }
}

function logout()
{
    session_start();

    $_SESSION = array();

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    session_destroy();

    header("Location: ../index.php");
}

function sessionCheck()
{
    session_start();
    if (!isset($_SESSION["user"])) {
        header("Location: ./index.php");
    }
}

function indexLogCheck()
{
    session_start();
    if (isset($_SESSION["user"])) {
        header("Location: ./dashboard.php");
    }
}
