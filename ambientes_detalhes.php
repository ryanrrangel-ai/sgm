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
   

<div class="container mt-5">
        <div class="card shadow mx-auto" style="max-width: 600px;">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h4 class="mb-0">Registrar Ambiente</h4>
                <a href="dashboard_ambientes.php" class="btn btn-sm btn-outline-light">Voltar</a>
            </div>
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
                        <label class="form-label">Descrição do Local</label>
                        <textarea id="descricao" class="form-control" rows="4"
                         required placeholder="Ex: É aberto e com bastante paisagem..."></textarea>
                    </div>
                    <div class="mb-3">
            <label class="form-label">Foto da Ocorrencia(Opcional)</label>
            <input type="file" id="foto" class="form-control" accept="image/*">
        </div>
                    <button type="submit" class="btn btn-primary w-100">Registrar Local</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>