<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Carrega PHPMailer
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

function limpar($campo) {
  return htmlspecialchars(trim($campo));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $dataHoje = date("d/m/Y");

  // Coletar dados
  $nome         = limpar($_POST['nome']);
  $email        = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $nascimento   = limpar($_POST['nascimento']);
  $telefone     = limpar($_POST['telefone']);
  $emergencia   = limpar($_POST['emergencia']);
  $endereco     = limpar($_POST['endereco']);
  $profissao    = limpar($_POST['profissao']);
  $trabalho     = limpar($_POST['trabalho']);
  $estadoCivil  = limpar($_POST['estadoCivil']);
  $filhos       = limpar($_POST['filhos']);
  $irmaos       = limpar($_POST['irmaos']);
  $terapia      = limpar($_POST['terapia']);
  $motivo       = limpar($_POST['motivo']);
  $rotina       = limpar($_POST['rotina']);
  $sentimentos  = limpar($_POST['sentimentos']);
  $alegria      = limpar($_POST['alegria']);
  $autoconhecimento = limpar($_POST['autoconhecimento']);

  // Corpo do e-mail em HTML
  $mensagem = "<html><body>";
  $mensagem .= "<h2>📝 Ficha de cadastro – $nome</h2>";
  $mensagem .= "<p><strong>Data de envio:</strong> $dataHoje</p>";
  $mensagem .= "<p><strong>Email:</strong> $email</p>";
  $mensagem .= "<p><strong>Nascimento:</strong> $nascimento</p>";
  $mensagem .= "<p><strong>Telefone:</strong> $telefone</p>";
  $mensagem .= "<p><strong>Contato de emergência:</strong> $emergencia</p>";
  $mensagem .= "<p><strong>Endereço:</strong> $endereco</p>";
  $mensagem .= "<p><strong>Profissão:</strong> $profissao</p>";
  $mensagem .= "<p><strong>Trabalho atual:</strong> $trabalho</p>";
  $mensagem .= "<p><strong>Estado civil:</strong> $estadoCivil</p>";
  $mensagem .= "<p><strong>Filhos:</strong> $filhos</p>";
  $mensagem .= "<p><strong>Irmãos:</strong> $irmaos</p>";
  $mensagem .= "<p><strong>Terapia anterior:</strong> $terapia</p>";
  $mensagem .= "<p><strong>Motivo da busca:</strong> $motivo</p>";
  $mensagem .= "<p><strong>Rotina:</strong> $rotina</p>";
  $mensagem .= "<p><strong>Sentimentos:</strong> $sentimentos</p>";
  $mensagem .= "<p><strong>Alegria e angústia:</strong> $alegria</p>";
  $mensagem .= "<p><strong>Autoconhecimento:</strong> $autoconhecimento</p>";
  $mensagem .= "<p style='margin-top:20px;'>💙 InsightClíni</p>";
  $mensagem .= "</body></html>";

  // Configura PHPMailer
  $mail = new PHPMailer(true);
  try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'insightclini@gmail.com';      // ✅ seu Gmail
    $mail->Password   = 'SENHA_DO_APP';                // ✅ senha de app gerada
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('insightclini@gmail.com', 'InsightClíni');
    $mail->addAddress('insightclini@gmail.com');       // pode ser o mesmo destino
    $mail->addReplyTo($email, $nome);

    $mail->isHTML(true);
    $mail->Subject = "Ficha de cadastro em $dataHoje – $nome";
    $mail->Body    = $mensagem;

    $mail->send();
    header("Location: obrigado.html");
    exit;
  } catch (Exception $e) {
    echo "Erro ao enviar: {$mail->ErrorInfo}";
  }
}
?>