<?php

require_once("header.php");

if (isset($_POST['acao']) == 'enviar') {

    function anti_injection($sql) {
        // remove palavras que contenham sintaxe sql
        $sql = preg_replace(sql_regcase("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/"), "", $sql);
        $sql = trim($sql); //limpa espaços vazio
        $sql = strip_tags($sql); //tira tags html e php
        $sql = addslashes($sql); //Adiciona barras invertidas a uma string
        return $sql;
    }

    $nome = strip_tags(trim($_POST['nome']));
    $email = strip_tags(trim($_POST['email']));
    $telefone = strip_tags(trim($_POST['telefone']));
    $assunto = strip_tags(trim($_POST['assunto']));
    $mensagem = strip_tags(trim($_POST['mensagem']));

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
        $mail->Username = 'contato@stylusgrafy.com.br'; // Usuário do servidor SMTP (endereço de email)
        $mail->Password = 'cont7890*/100ASA'; // Senha do servidor SMTP (senha do email usado)
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
<section id="content" class="no-index">
    <div class="fundo_dois">
        <ul>
            <li class="imagem">
                <a href="index.php" title="back">
                    <img alt="Stylus Grafy Marketing e Propaganda Back" src="images/img-Stylus-Grafy-Marketing-e-Propaganda-back.gif" title="Sair"/>
                </a>
            </li>
            <li class="imagem_dois">
                <a>
                    <img alt="Stylus Grafy Marketing e Propaganda Telefone" src="images/img-Stylus-Grafy-Marketing-e-Propaganda-Telefone.gif"/>
                </a>
            </li>
            <li class="imagem_tres">
                <a>
                    <img alt="Stylus Grafy Marketing e Propaganda Telefone com Fio" src="images/img-Stylus-Grafy-Marketing-e-Propaganda-Telefone-com-Fio.gif"/>
                </a>
            </li>
            </li>
        </ul>
    </div>
    <div class="texto">
        <h2 class="texto_h2">Fale Conosco:</h2>
        <form id="contact_form" method="post" action="">
            <input type="hidden" name="acao" value="enviar"/>
            <fieldset>
                <ul class="cont">
                    <li>
                        <label class="name texto_s">* Nome:</label>
                        <input class="name input-text" type="text" name="nome" id="nome" size="70" maxlength="60" placeholder="Nome"/>
                    </li>
                    <li>
                        <label class="name texto_s">* E-mail:</label>
                        <input class="name input-text" type="email" name="email" id="email" size="50" maxlength="60" placeholder="Seu E-mail"/>
                    </li>
                    <li>
                        <label class="name texto_s">* Telefone:</label>
                        <input class="name input-text" type="text" name="telefone" id="telefone" size="50" placeholder="Seu Telefone"/>

                    </li>
                    <li>
                        <label class="name texto_s">* Assunto:</label>
                        <select class="ass_um input-text" name="assunto" id="assunto">
                            <option value="0" selected>Selecione um assunto:</option>
                            <option value="1">Venda Web-Site</option>
                            <option value="2">Filipeto</option>
                        </select>
                    </li>
                    <li>
                        <label class="name input-text texto_s">* Mensagem:</label>
                        <textarea class="text" name="mensagem" id="mensagem" cols="35" rows="5"></textarea>
                    </li>
                </ul>
                <input class="botao-contato" type="submit" value="Enviar">
                <input class="botao-contato left-buton" type="reset" value="Limpar">
            </fieldset>
        </form>
        <div class="map">
            <h2 class="texto_h2">Nossa Localização</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3578.916021039978!2d-51.08296519999999!3d-26.231918099999998!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94e661e51bd08389%3A0x2967ecc745180eb0!2sRua+Prudente+de+Moraes%2C+300+-+Centro!5e0!3m2!1spt-BR!2sbr!4v1397651546504" width="600" height="230" frameborder="0" style="border:0"></iframe>
        </div>
    </div>
</section>
<?php require_once("footer.php"); ?> 