<?php include('layouts/header.php'); ?>

<?php
$data_nascimento = $_POST['data_nascimento'] ?? '';
$signos = simplexml_load_file("signos.xml");
$encontrado = null;

if ($data_nascimento) {
    // Extrai dia e mês da data informada (ignora o ano)
    $dia_mes = substr($data_nascimento, 5); // "MM-DD"
    
    foreach ($signos->signo as $signo) {
        $inicio = (string)$signo->dataInicio;
        $fim = (string)$signo->dataFim;
        
        $inicio_num = substr($inicio, 3, 2) . substr($inicio, 0, 2);
        $fim_num = substr($fim, 3, 2) . substr($fim, 0, 2);
        $entrada_num = substr($dia_mes, 0, 2) . substr($dia_mes, 3, 2);
        
        // Trata caso de signo que atravessa o ano (ex: Capricórnio)
        if ($inicio_num > $fim_num) {
            if ($entrada_num >= $inicio_num || $entrada_num <= $fim_num) {
                $encontrado = $signo;
                break;
            }
        } else {
            if ($entrada_num >= $inicio_num && $entrada_num <= $fim_num) {
                $encontrado = $signo;
                break;
            }
        }
    }
}
?>

<div class="card shadow-sm">
    <div class="card-body text-center">
        <?php if ($encontrado): ?>
            <h2 class="card-title"><?= htmlspecialchars($encontrado->signoNome) ?></h2>
            <p class="card-text"><?= htmlspecialchars($encontrado->descricao) ?></p>
            <p class="text-muted">Período: <?= $encontrado->dataInicio ?> a <?= $encontrado->dataFim ?></p>
        <?php else: ?>
            <p class="text-danger">Não foi possível identificar o signo. Verifique a data informada.</p>
        <?php endif; ?>
        <a href="index.php" class="btn btn-outline-secondary mt-3">Voltar</a>
    </div>
</div>

</div> <!-- Fecha container -->
</body>
</html>