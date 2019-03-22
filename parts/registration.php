<?php
include 'db.php';

$email = $_POST['email'];
$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$password = $_POS['password'];

$erros = [];

// Check if required fields are filled
if (!$email)
{
    $erros[] = 'Email adress is not provided';
}
if (!$firstName)
{
    $firstName[] = 'first name is not provided';
}
if (!$lastName)
{
    $lastName[] = 'Last name is not provided';
}
if (!$password)
{
    $password[] = 'Password adress is not provided';
}

// injekcija Check if email is no taken
// injekcija SELECT id FROM users WHERE email = ''
// asdasg\' or id = 123

$query = "SELECT id FROM users WHERE email = ?"; // ja būtu trīs ???, tad pie  būtu jāprasa sss
$sql = $db->prepare($query);
$sql->bind_param('s', $email); // s - string, i-integer, d-float ?
$emailForQuery = $email;
$sql->execute(); // izpildīt uz servera
$sql->bind_result($id); // šeit padodam tik mainīgos, cik ir $selectquery
$sql->fetch();

if ($id)
{
    $erros[] = 'Email is already in use';
}

if(count($erros) > 0)
{
    // forms is not valid
    header('Location: /lesson6/?page=register&errors=true')
}else
{
    // register user
    $sqlInsert = $db->prepare("INSERT INTO users SET email = ?, first_name = ?, last_name = ?, password = ?");
    $sqlInsert->bind_param('ssss', $email, $firstName, $lastName, $encryptedPassword);
    $encryptedPassword = md5($password);
    $sqlInsert->execute(); // Šis izpildīs query un ievietos lietotāju datu bāzē

    header('Location: /lesson6/page=login');
}


// var_dump($id);