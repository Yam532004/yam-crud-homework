<?php
function inp_name($name)
{
    // Name only include alphabet and number 
    if (ctype_alnum($name)) {
        return true;
    }
    return false;
}

function inp_age($age)
{
    if (is_numeric($age) && is_int($age)) {
        return true;
    }
    return false;
}

function inp_email($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}
$error_name = "";
$error_age = "";
$error_email = "";
$error_image = "";

$name = "";
$age = "";
$email = "";
$image = "";
// Condition để cho form chạy 
$form_valid = false;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $age = htmlspecialchars($_POST['age'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $image = htmlspecialchars($_POST['image_url'], ENT_QUOTES, 'UTF-8');

    $value = [
        'name'=> $name,
        'age' => $age,
        'email' => $email,
        'image' =>$image,
    ];

    // if (empty($name)) {
    //     $error_name = "Please enter your name";
    // } elseif (!inp_name($name)) {
    //     $error_name = "Username should contain only letters and numbers";
    // }

    // if (empty($age)) {
    //     $error_age = "Please enter your age";
    // } elseif (!inp_age($age)) {
    //     $error_age = "Your age should be integer";
    // }

    // if (empty($email)) {
    //     $error_email = "Please enter your email";
    // } elseif (!inp_name($email)) {
    //     $error_age = "Your email should contain @ ";
    // }

    // if (empty($error_name) && empty($error_age) && empty($error_email) && empty($error_image)) {
    //     $form_valid = true;
    // }
}
?>
<?php
include_once './database/database.php';
createStudent($value);
header('location: index.php');
?>
