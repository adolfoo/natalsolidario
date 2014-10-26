<?
$nome=$_POST['nomeremetente'];
$email=$_POST['emailremetente'];
$telefone=$_POST['telefone'];
$texto=$_POST['mensagem'];
$mensagem="
Uma mensagem vinda do site !
Algum vistante mandou essa mensagem pelo site.
Nome: $nome
Email: $email
Telefone:  $telefone
Nome da criança: $texto";

require('lib/swift_required.php');
$transport = Swift_SmtpTransport::newInstance('h4.hserv.com.br', 465, 'ssl')
    ->setUsername('natal@natalsolidario.profadolfo.com.br')
    ->setPassword('anah2608');
$mailer = Swift_Mailer::newInstance($transport);
$message = Swift_Message::newInstance('Natal Solidario')
    ->setFrom(array('natal@natalsolidario.profadolfo.com.br' => 'Natal Solidario'))
    ->setTo(array('natal@natalsolidario.profadolfo.com.br'))
    ->setReplyTo($email)
    ->setBody($mensagem);
 
if ($mailer->send($message)){
	header("Location: http://natalsolidario.profadolfo.com.br/sucesso.html");
}
else{
	header("Location: http://natalsolidario.profadolfo.com.br/falha.html");
}
