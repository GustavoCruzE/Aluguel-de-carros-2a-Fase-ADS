<?php
session_start();

// Destruir todas as variáveis de sessão
session_unset();

// Destruir a sessão
session_destroy();

// Redirecionar de volta para o index.php
header("Location: index.php");
exit();
?>