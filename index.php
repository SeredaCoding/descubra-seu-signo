<?php include('layouts/header.php'); ?>

<h1 class="text-center mb-4">Descubra seu Signo</h1>

<form id="signo-form" method="POST" action="show_zodiac_sign.php" class="card p-4 shadow-sm">
    <div class="mb-3">
        <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
        <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Consultar</button>
</form>

<p class="text-center mt-3">
    <a href="https://github.com/SeredaCoding" target="_blank" class="text-muted text-decoration-none">
        Desenvolvido por SeredaCoding
    </a>
</p>

</div> <!-- Fecha container -->
</body>
</html>