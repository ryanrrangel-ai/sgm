<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-success mb-4">
        <div class="container">
            <a class="navbar-brand" href="gestor_dashboard.php">SGM ambientes <i class="bi bi-geo-alt"></i></a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link active" href="gestor_chamados.php">Chamados</a>
                <a class="nav-link" href="gestor_locais.php">Locais</a>
                <a class="nav-link btn btn-outline-danger" href="api/logout.php">Sair</a>
            </div>
        </div>
    </nav>

<body>
   

 <div class="card-body">
                <form id="formChamado">
                    <div class="mb-3">
                        <label class="form-label">Bloco</label>
                        <select id="selectBloco" class="form-select" required onchange="carregarAmbientes(this.value)">
                            <option value="">Selecione o Bloco...</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ambiente / Sala</label>
                        <select id="selectAmbiente" class="form-select" required disabled>
                            <option value="">Selecione o Bloco primeiro...</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo de Serviço</label>
                        <select id="selectTipo" class="form-select" required>
                            <option value="">Selecione o tipo...</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descrição do Problema</label>
                        <textarea id="descricao" class="form-control" rows="4"
                         required placeholder="Ex: Lâmpada queimada ou vazamento..."></textarea>
                    </div>
                    <div class="mb-3">
            <label class="form-label">Foto da Ocorrência (Opcional)</label>
            <input type="file" id="foto" class="form-control" accept="image/*">
        </div>
                    <button type="submit" class="btn btn-primary w-100">Registrar Solicitação</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Carrega Blocos e Tipos ao iniciar
        async function iniciar() {
            // Blocos
            const resB = await fetch('api/localizacoes.php?acao=listar_blocos');
            const blocos = await resB.json();
            const selB = document.getElementById('selectBloco');
            blocos.forEach(b => selB.innerHTML += `<option value="${b.id_bloco}">${b.nome}</option>`);

            // Tipos
            const resT = await fetch('api/localizacoes.php?acao=listar_tipos');
            const tipos = await resT.json();
            const selT = document.getElementById('selectTipo');
            tipos.forEach(t => selT.innerHTML += `<option value="${t.id_tipo}">${t.nome}</option>`);
        }

        // Carrega Ambientes dinamicamente quando o Bloco muda
        async function carregarAmbientes(id_bloco) {
            const selA = document.getElementById('selectAmbiente');
            if (!id_bloco) { selA.disabled = true; return; }
            
            const res = await fetch(`api/localizacoes.php?acao=listar_ambientes&id_bloco=${id_bloco}`);
            const ambientes = await res.json();
            
            selA.innerHTML = '<option value="">Selecione a Sala...</option>';
            ambientes.forEach(a => selA.innerHTML += `<option value="${a.id_ambiente}">${a.nome}</option>`);
            selA.disabled = false;
        }

document.getElementById('formChamado').addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData();
    formData.append('id_ambiente', document.getElementById('selectAmbiente').value);
    formData.append('id_tipo', document.getElementById('selectTipo').value);
    formData.append('descricao', document.getElementById('descricao').value);
    const fotoFile = document.getElementById('foto').files[0];
    if (fotoFile) {
        formData.append('foto', fotoFile);
    }
    const response = await fetch('api/salvar_chamado.php', {
        method: 'POST',
        body: formData
    });
    const result = await response.json();
    if (result.success) {
        alert(result.message);
        window.location.href = 'dashboard_ambientes.php';
    } else {
        alert("Erro: " + result.message);
    }
});

        iniciar();

<div class="modal fade" id="modalFoto" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-0 text-center bg-dark">
                <img src="" id="imgModal" class="img-fluid">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script&gt;
<script>
    function verFoto(url) {
        document.getElementById('imgModal').src = url;
        new bootstrap.Modal(document.getElementById('modalFoto')).show();
    }
</script>
    <script>
        const coresPrioridade = { 'urgente': 'text-danger', 'alta': 'text-warning', 'media': 'text-primary', 'baixa': 'text-secondary' };
        const coresStatus = { 'aberto': 'bg-secondary', 'em_execucao': 'bg-warning', 'concluido': 'bg-success', 'fechado': 'bg-dark' };

        async function carregarChamados(status = '') {
            const res = await fetch(`api/dashboard_ambientes.php?status=${status}`);
            const chamados = await res.json();
            const body = document.getElementById('tabelaGeral');

            body.innerHTML = chamados.map(c => `
                <tr>
                    <td>#${c.id_chamado}</td>
                    <td>${c.solicitante_nome}</td>
                    <td>
                        <small class="text-muted">${c.bloco_nome}</small><br>
                        <strong>${c.ambiente_nome}</strong>
                    </td>
                    <td><i class="bi bi-circle-fill ${coresPrioridade[c.prioridade]} me-1"></i> ${c.prioridade.toUpperCase()}</td>
                    <td>${c.tecnico_nome || '<em class="text-muted">Não atribuído</em>'}</td>
                    <td><span class="badge ${coresStatus[c.status]}">${c.status.replace('_', ' ').toUpperCase()}</span></td>
                    <td>
                        <a href="gestor_detalhes.php?id=${c.id_chamado}" class="btn btn-sm btn-primary">
                            <i class="bi bi-eye"></i> Gerenciar
                        </a>
                    </td>
                </tr>
            `).join('');
        }

        carregarChamados();
</html>