
<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "yusufexpert001@gmail.com"; // Change this email to your email address
$subject = "$m_subject: $name";
$body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email\n\nSubject: $m_subject\n\nMessage: $message";
$header = "From: $email\r\n"; // Added \r\n for header line break
$header .= "Reply-To: $email\r\n"; // Added \r\n for header line break
$header .= "Content-Type: text/plain; charset=UTF-8\r\n"; // Added content type

if(!mail($to, $subject, $body, $header)) {
  http_response_code(500);
  exit();
}
?>
