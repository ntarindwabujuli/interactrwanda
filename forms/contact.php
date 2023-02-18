<?php

  
  $receiving_email_address = 'info@interactrwanda.rw';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Something Went Wrong');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];
//smtp
  $contact->smtp = array(
    'host' => 'ssl://smtp.titan.email',
    'username' => 'info@interactrwanda.rw',
    'password' => 'MugaboJ@2023!',
    'port' => '465'
  );
  

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
