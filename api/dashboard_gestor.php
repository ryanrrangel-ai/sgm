<?php
session_start();
require_once '../config/database.php';
header('Content-Type: application/json');

if(!isset($_SESSION['user_id']) || $_SESSION['user_perfil'] !== 'gestor') {
    echo json_encode(["success" => false, "mensage" => "Acesso negado."]);
    exit;
}

$sql = "SELECT
            SUM(CASE WHEM status = 'aberto' THEN 1 ELSE 0 END) AS abertos,
            SUM(CASE WHEM status = 'em_execucao' THEN 1 ELSE 0 END) AS em_execucao, SUM(CASE WHEM prioridade = 'urgente' AND status != 'fechado' THEN 1 ELSE 0 END ) AS URGENTES, COUNT(*) AS total
        FROM chamados";

$res = $conn->query($sql);
$dados = $res->fetch_assoc();
echo json_encode($dados);