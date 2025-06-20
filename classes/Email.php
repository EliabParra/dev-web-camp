<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {
    protected $email;
    protected $nombre;
    protected $token;
    protected $font;
    protected $styles;

    public function __construct($email, $nombre, $token) {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;

        $this->font = "
            <link rel='preconnect' href='https://fonts.googleapis.com'>
            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
            <link href='https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&family=Open+Sans&display=swap' rel='stylesheet'> 
        ";

        $this->styles = "
            <style>
                html {
                    font-size: 62.5%; 
                    box-sizing: border-box; 
                    height: 100%;
                }
                body {
                    font-family: 'Inter', sans-serif; 
                    display: flex; 
                    flex-direction: column;
                    align-items: center;
                }
                h1 {
                    font-size: 4rem; 
                    text-align: center;
                }
                p, a {
                    text-align: center; 
                    font-size: 2rem;
                }
                a {
                    text-decoration: none; 
                    padding: 1rem 2rem; 
                    color: #fff; 
                    background-color: #007df4; 
                    border-radius: 1rem; 
                    font-weight: bold; 
                    margin-bottom: 4rem; 
                    max-width: 30rem;
                    transition: all 0.3s ease-in-out;
                }
                a:hover {
                    background-color: #005e9f;
                }
                #texto-mini {
                    font-size: 1.5rem; 
                    font-weight: bold;
                }
            </style>
        ";
    }

    public function enviarConfirmacion() {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];

        $mail->setFrom('cuentas@devwebcamp.com');
        $mail->addAddress($this->email, $this->nombre);
        $mail->Subject = 'Confirma tu Cuenta';

        //set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $mail->Body = "
            <html>
                <head>
                    {$this->font}
                    {$this->styles}
                </head>
                <body>
                    <h1>Hola {$this->nombre}</h1>
                    <p>Has Registrado Correctamente tu cuenta en DevWebCamp; pero es necesario confirmarla</p>
                    <p><strong>Presiona aquí: </strong></p>
                    <a href='{$_ENV['HOST']}/confirmar-cuenta?token={$this->token}'>Confirmar Cuenta</a>
                    <p id='texto-mini'>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>
                </body>
            </html>
        ";

        //enviar el email
        $mail->send();
    }

    public function enviarInstrucciones() {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];

        $mail->setFrom('cuentas@uptask.com');
        $mail->addAddress('cuentas@uptask.com', 'UpTask.com');
        $mail->Subject = 'Reestablece tu Password';

        //set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $mail->Body = "
            <html>
                <head>
                    {$this->font}
                    {$this->styles}
                </head>
                <body>
                    <h1>Hola {$this->nombre}</h1>
                    <p>Has solicitado reestablecer tu password, sigue el siguiente enlace para hacerlo.</p>
                    <p><strong>Presiona aquí: </strong></p>
                    <a href='{$_ENV['HOST']}/reestablecer?token={$this->token}'>Reestablecer Password</a>
                    <p id='texto-mini'>Si tu no solicitaste este cambio, puedes ignorar el mensaje</p>
                </body>
            </html>
        ";

        //enviar el email
        $mail->send();
    }
}