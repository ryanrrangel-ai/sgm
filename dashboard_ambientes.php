<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <title>Ambientes</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-success mb-4">
        <div class="container">
            <a class="navbar-brand" href="gestor_dashboard.php">SGM ambientes <i class="bi bi-geo-alt"></i></a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link active" href="gestor_chamados.php">Chamados</a>
                <a class="nav-link" href="dashboard_ambientes.php">Locais</a>
                <a class="nav-link btn btn-outline-danger" href="api/logout.php">Sair</a>
            </div>
        </div>
    </nav>

     <div class="container">
        <h2 class="mb-4"  >Todos os Ambientes <i class="bi bi-file-richtext"></i></h2>

        <div class="mb-3 d-flex gap-2">
            <button class="btn btn-sm btn-outline-secondary" onclick="carregarAmbientes('')">Salas de aula</button>
            <button class="btn btn-sm btn-outline-primary" onclick="carregarAmbientes('aberto')">Refeitório</button>
            <button class="btn btn-sm btn-outline-warning" onclick="carregarAmbientes('em_execucao')">Laboratorio</button>
            <button class="btn btn-sm btn-outline-success" onclick="carregarAmbientes('concluido')">Coordenação</button>
            <button class="btn btn-sm btn-outline-secondary" onclick="carregarAmbientes('')">Quadra</button>
            <a href="ambientes_detalhes.php" class="btn btn-outline-secondary mb-3">+Criar ambientes</a>
        </div>

         <div class="card shadow">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Solicitante</th>
                            <th>Local / Ambiente</th>
                            <th>Técnico</th>
                            <th>Bloco</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody id="tabelaGeral">
                        </tbody>
                </table>
            </div>
        </div>
    </div>









</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>