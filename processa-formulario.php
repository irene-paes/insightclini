<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  function limpar($campo) {
    return htmlspecialchars(trim($campo));
  }

  $dataHoje = date("d/m/Y");

  // Coletar campos
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
  $mensagem = "
  <html>
  <head>
    <style>
      body { font-family: Arial, sans-serif; color: #333; }
      h2 { color: #640264; }
      .campo { margin-bottom: 12px; }
      .label { font-weight: bold; color: #444; }
      .valor { color: #555; }
    </style>
  </head>
  <body>
    <h2>📝 Ficha de cadastro – $nome</h2>
    <p><strong>Data de envio:</strong> $dataHoje</p>

    <div class='campo'><span class='label'>Email:</span> <span class='valor'>$email</span></div>
    <div class='campo'><span class='label'>Nascimento:</span> <span class='valor'>$nascimento</span></div>
    <div class='campo'><span class='label'>Telefone:</span> <span class='valor'>$telefone</span></div>
    <div class='campo'><span class='label'>Contato de emergência:</span> <span class='valor'>$emergencia</span></div>
    <div class='campo'><span class='label'>Endereço:</span> <span class='valor'>$endereco</span></div>
    <div class='campo'><span class='label'>Profissão e formação:</span> <span class='valor'>$profissao</span></div>
    <div class='campo'><span class='label'>Trabalho atual:</span> <span class='valor'>$trabalho</span></div>
    <div class='campo'><span class='label'>Estado civil:</span> <span class='valor'>$estadoCivil</span></div>
    <div class='campo'><span class='label'>Filhos:</span> <span class='valor'>$filhos</span></div>
    <div class='campo'><span class='label'>Irmãos:</span> <span class='valor'>$irmaos</span></div>
    <div class='campo'><span class='label'>Terapia anterior:</span> <span class='valor'>$terapia</span></div>
    <div class='campo'><span class='label'>Motivo da busca:</span> <span class='valor'>$motivo</span></div>
    <div class='campo'><span class='label'>Rotina atual:</span> <span class='valor'>$rotina</span></div>
    <div class='campo'><span class='label'>Sentimentos predominantes:</span> <span class='valor'>$sentimentos</span></div>
    <div class='campo'><span class='label'>Alegria e angústia:</span> <span class='valor'>$alegria</span></div>
    <div class='campo'><span class='label'>Autoconhecimento:</span> <span class='valor'>$autoconhecimento</span></div>

    <p style='margin-top: 20px;'>💙 InsightClíni</p>
  </body>
  </html>
  ";

  // Envio por e-mail
  $destino = "insightclini@gmail.com";
  $assunto = "Ficha de cadastro em $dataHoje – $nome";
  $headers  = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $headers .= "From: $email\r\nReply-To: $email\r\n";

  if (mail($destino, $assunto, $mensagem, $headers)) {
    header("Location: obrigado.html");
    exit;
  } else {
    echo "Erro ao enviar. Tente novamente mais tarde.";
  }
}
?>