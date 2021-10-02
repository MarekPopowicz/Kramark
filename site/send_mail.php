<?php


require_once 'php/db_connection.php';




 $returnHref = '/admin/index.php';

if((isset($_POST['contact_name']) && $_POST['contact_name'] !='') && 
    (isset($_POST['contact_message']) && $_POST['contact_message'] !=''))

{   

    $conn = OpenCon();
    $conn->query("SET NAMES 'utf8'");
    $contact_name = $conn->real_escape_string($_POST['contact_name']);
    $contact_message = $conn->real_escape_string($_POST['contact_message']);


    $to = 'srv34346@localhost';
    $subject = 'Oferta kupna z witryny kramark.wroclaw.pl';
    $from = 'info@kramark.wroclaw.pl';
 
    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
    // Create email headers
    $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
 
    // Compose a simple HTML email message
    $message = '<html><body>';
    $message .= '<h1 style="color:#f40;">Wiadomość od '.$contact_name.'</h1>';
    $message .= '<p style="color:#080;font-size:18px;">'.$contact_message.'</p>';
    $message .= '</body></html>';
 
    // Sending email
    if(mail($to, $subject, $message, $headers)){
        echo 'Your mail has been sent successfully.';
    } else{
        echo 'Unable to send email. Please try again.';
    }
}
else{
            $msg = "Nie wszystkie wymagane pola zostały wypełnione.";

    echo "<script type='text/javascript'>
            alert('$msg');
            
        </script>";
}

$conn -> close();
       // location.href = $returnHref; 
?>