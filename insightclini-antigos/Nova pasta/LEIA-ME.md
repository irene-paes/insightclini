# InsightClíni – Resumo das Correções

## Arquivos entregues

| Arquivo | O que foi corrigido |
|---|---|
| `index.html` | Meta SEO completas (description, keywords, Open Graph, Twitter Card), título melhorado, `<h2>` no subtítulo (hierarquia correta), `title` no iframe da Luna |
| `sobre.html` | Meta SEO completas, **bloco de foto da Irene adicionado** com fallback, inline styles removidos, hierarquia de títulos corrigida |
| `sessoes.html` | **Bug crítico corrigido** (estrutura HTML quebrada: `<div>` solto, `</body>` sem `<body>`, `</html>` faltando), meta SEO completas, inline styles removidos, h1 correto |
| `desafios.html` | Meta SEO completas, título da aba corrigido (era genérico), **descrições reais** nos cards (eram todos "Saiba mais sobre X"), h2 nos títulos dos cards |
| `faq.html` | Meta SEO completas, título correto, inline styles removidos, botões do caroussel com `visually-hidden` para acessibilidade, accordions com `collapsed` correto |
| `css/adicionar-ao-style.css` | Classes CSS centralizadas que substituem os inline styles: `.titulo-destaque`, `.conteudo-max`, `.depoimentos-moldura`, hover nos cards, foco de acessibilidade |

---

## Como aplicar

### 1. Substitua os arquivos HTML
Copie cada arquivo `.html` para a raiz do seu repositório, substituindo os originais.

### 2. Atualize o CSS
Abra `css/style.css` e **cole o conteúdo** de `css/adicionar-ao-style.css` no final do arquivo.

### 3. Adicione a foto da Irene
Em `sobre.html`, a imagem espera o caminho `img/irene-paes.jpg`.
Basta salvar a foto com esse nome na pasta `img/`. Tamanho recomendado: 400×400px.

### 4. Crie uma imagem de Open Graph (opcional mas recomendado)
Crie uma imagem `img/og-preview.png` (1200×630px) com o logo e o slogan da clínica.
Ela aparece quando o site é compartilhado no WhatsApp, Instagram e outras redes.

---

## Outros pontos para o futuro

- **`contato.html`** e **`formulario.html`**: vale revisar se o fluxo está claro — qual é o caminho principal para novos pacientes?
- **Nomes de arquivo com acentos** (`depressão.html`, `angústia.html`): idealmente renomear sem acentos para evitar problemas em alguns servidores. Ex: `depressao.html`, `angustia.html`.
- **Google Search Console**: cadastrar o site para acompanhar indexação e erros de SEO.
