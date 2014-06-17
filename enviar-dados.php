<?php
require_once("header.php");

function anti_injection($sql)
{
    // remove palavras que contenham sintaxe sql
    $sql = preg_replace(sql_regcase("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/"),"",$sql);
    $sql = trim($sql);//limpa espaços vazio
    $sql = strip_tags($sql);//tira tags html e php
    $sql = addslashes($sql);//Adiciona barras invertidas a uma string
    return $sql;
}

if ($_GET) {
    $nome = strip_tags(trim($_GET['nome']));
    $email = strip_tags(trim($_GET['email']));
    $telefone = strip_tags(trim($_GET['telefone']));
    $assunto = strip_tags(trim($_GET['assunto']));
    $mensagem = strip_tags(trim($_GET['mensagem']));
    
    $nome = anti_injection($nome);
    $email = anti_injection($email);
    $telefone = anti_injection($telefone);
    $assunto = anti_injection($assunto);
    $mensagem = anti_injection($mensagem);

    if (empty($nome)) {
        echo "<script>alert('O campo Nome não pode estar vazio');</script>";
        echo "<script>history.back();</script>";
        exit();
    } else
    if (empty($email)) {
        echo "<script>alert('O campo E-mail não pode estar vazio');</script>";
        echo "<script>history.back();</script>";
        exit();
    } else
    if (empty($telefone)) {
        echo "<script>alert('O campo Telefone não pode estar vazio');</script>";
        echo "<script>history.back();</script>";
        exit();
    } else
    if (empty($assunto)) {
        echo "<script>alert('O campo Assunto não pode estar vazio');</script>";
        echo "<script>history.back();</script>";
        exit();
    } else
    if (empty($mensagem)) {
        echo "<script>alert('O campo Mensagem não pode ficar em branco');</script>";
        echo "<script>history.back();</script>";
        exit();
    } else {
         require("phpMailer/class.phpmailer.php");
        // Inicia a classe PHPMailer
            $mail = new PHPMailer();

            // Define os dados do servidor e tipo de conexão
            // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
            $mail->IsSMTP(); // Define que a mensagem será SMTP
            //$mail->Host = "localhost"; // Endereço do servidor SMTP (caso queira utilizar a autenticação, utilize o host smtp.seudomínio.com.br)
            $mail->SMTPAuth = true; // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
            $mail->Username = 'contato@clubealiancapu.com.br'; // Usuário do servidor SMTP (endereço de email)
            $mail->Password = 'CLUB*/Ai89azI'; // Senha do servidor SMTP (senha do email usado)
            // Define o remetente
            // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
            $mail->From = $email; // Seu e-mail
            $mail->Sender = $email; // Seu e-mail
            $mail->FromName = "Fale Conosco. Web-Site Stylus Graf Marketing e Propaganda"; // Seu nome
            // Define os destinatário(s)
            // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
            $mail->AddAddress('contato@stylusgrafy.com.br', 'Stylus Grafy');
            $mail->AddAddress('contato@stylusgrafy.com.br');
            //$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
            //$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta
            // Define os dados técnicos da Mensagem
            // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
            $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
            //$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
            // Define a mensagem (Texto e Assunto)
            // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
            $mail->Subject = $assunto; // Assunto da mensagem
            $mail->Body = $mensagem;

            // Define os anexos (opcional)
            // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
            //$mail->AddAttachment("/home/login/documento.pdf", "novo_nome.pdf");  // Insere um anexo
            // Envia o e-mail
            $enviado = $mail->Send();

            // Limpa os destinatários e os anexos
            $mail->ClearAllRecipients();
            $mail->ClearAttachments();

            // Exibe uma mensagem de resultado
            if ($enviado) {
                echo "<script>alert('E-mail enviado com sucesso. Em Breve entraremos em contato para melhores informações.');</script>";
                echo "<script>history.back();</script>";
            } else {
                echo "<script>alert('Não foi possível enviar. Tente novamente mais tarde.');</script>";
                echo "<script>history.back();</script>";
                echo "Informações do erro: 
" . $mail->ErrorInfo;
            }
        }
    }
    
?>
