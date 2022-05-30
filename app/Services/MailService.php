<?php
namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\Repositories\AuthUserRepository;

class MailService
{
    protected $authUserRepo;
    public function __construct(AuthUserRepository $authUserRepo)
    {
        $this->authUserRepo = $authUserRepo;
    }

    public function sendEmail($body)
    {
        $user = $this->authUserRepo->getById(auth()->id());

        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
            $mail->do_debug = 0;

            $mail->isSMTP();                            
            $mail->Host       = config('mail.host');                
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = config('mail.username');    
            $mail->Password   = config('mail.password') ;

           $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;                    
            $mail->Port       = 465;  

            $mail->setFrom(config('mail.username'), 'No Reply');
            $mail->addAddress(trim($user->email, '"'), 'App User'); ;

            $mail->isHTML(true); 
      
            $mail->Subject = config('message.mailSubject');
            $mail->Body    = $body;

            $mail->send();

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
