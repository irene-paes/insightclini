// Função para verificar se o paciente é associado ao InsightCard
function validarCarteirinha() {
    let idAssociado = document.getElementById("numero-carteirinha").value;
    let carteirinhasValidas = ["IC1000001", "IC1000002", "IC1000003"]; // IDs válidos

    if (carteirinhasValidas.includes(idAssociado)) {
        document.getElementById("status-carteirinha").innerText = "✅ InsightCard ativo! Desconto aplicado.";
    } else {
        document.getElementById("status-carteirinha").innerText = "❌ InsightCard inválido ou inativo. Associe-se antes de prosseguir.";
    }
}

// Função para redirecionar após cadastro no InsightCard
function redirecionarPagamento(event) {
    event.preventDefault(); // Impede envio padrão para controlar o redirecionamento

    let form = document.getElementById("cadastroForm");
    
    fetch(form.action, {
        method: "POST",
        body: new FormData(form),
    })
    .then(response => {
        if (response.ok) {
            alert("Cadastro realizado com sucesso! Você será direcionado para o pagamento.");
            window.location.href = "pagamento.html"; // Redirecionamento para página de pagamento
        } else {
            alert("Erro ao cadastrar. Tente novamente.");
        }
    })
    .catch(() => {
        alert("Erro na conexão. Verifique sua internet e tente novamente.");
    });
}

// blog 
//document.addEventListener("DOMContentLoaded", function() {
//    alert("Bem-vindo ao nosso blog! Aproveite a leitura.");
//});