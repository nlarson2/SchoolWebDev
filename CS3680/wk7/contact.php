<?php 
require_once('ContactFormLib.php');


$contactPage = new ContactPage();
$contactPage->title = "Contact Page";

$contactPage->links["Home"]="home.php";
$contactPage->links["Services"]="services.php";
$contactPage->links["Contact Form"]="contact.php";
$contactPage->content = "<h1>Contact page Content</h1>";



function clean_input($data)
{
    return (htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES));
}
$posted = false;
$err = '';
if($_SERVER['REQUEST_METHOD'] == "POST" ) {
    $fName = clean_input($_POST['fName']);
    $lName = clean_input($_POST['lName']);
    $Email = clean_input($_POST['Email']);
    $Phone = clean_input($_POST['Phone']);
    $Msg = clean_input($_POST['Msg']);

    $nameErr = false;
    $nameErr = false;
    $emailErr = false;
    $phoneErr = false;
    $msgErr = false;


    if(!isset($fName) || empty($fName)) {
        $err.="Please enter your first name<br>";
        $nameErr = true;
    }

    if(!isset($lName) || empty($lName)) {
        $err.="Please enter your last name<br>";
        $nameErr = true;
    }

    if(!isset($Email) || empty($Email)) {
        $err.="Please enter an Email<br>";
        $emailErr = true;
    }

    if(!isset($Phone) || empty($Phone)) {
        $err.="Please enter your Phone number<br>";
        $phoneErr = true;
    }
    if(!isset($Msg) || empty($Msg)) {
        $err.="Please input a message<br>";
        $msgErr = true;
    }

    $contactPage->content .= "<br><span class = 'err'>$err</span><br><br>";

    $posted = true;
}

if(!$posted || $err != '') {

    $contactPage->form->addLabel("First Name", "fName");
    $contactPage->form->addInput("text", "fName", "fName", "Last Name");
    $contactPage->form->addLabel("Last Name", "lName");
    $contactPage->form->addInput("text", "lName","lName", "First Name");
    $contactPage->form->addLabel("Email", "Email");
    $contactPage->form->addInput("text", "Email", "Email", "Email");
    $contactPage->form->addLabel("Phone", "Phone");
    $contactPage->form->addInput("text", "Phone", "Phone","Phone");
    $contactPage->form->addLabel("Msg", "Msg");
    $contactPage->form->addTextArea("Msg", "Msg", "Msg");
/*
$contactPage->form->add
*/
    $contactPage->form->addInput("submit", "subBtn", "subBtn","", "Submit");
} else {
    $contactPage->content .= "Thank you $fName $lName.";
    $contactPage->content .= "<br> Phone: $Phone<br>Email: $Email";
    $contactPage->content .= "<br> Msg:<br>$Msg<br>";
} 




$contactPage->displayPage();

?>