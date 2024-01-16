<?php

// Obtém o caminho do diretório do script atual a partir do URL
$caminhoRelativo = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$diretorio = $_SERVER['DOCUMENT_ROOT'] . urldecode($caminhoRelativo);

// Verifica se o diretório existe
if (is_dir($diretorio)) {
    echo "<title>".urldecode($caminhoRelativo)."</title>\n";
    echo "<h1>".urldecode($caminhoRelativo)."</h1>\n";
    
    // Obtém todos os itens do diretório
    $itens = scandir($diretorio);
    foreach ($itens as $item) {
        // Ignora os diretórios especiais "." e ".."
        if ($item != '.') {
            $itemCaminho = $caminhoRelativo . '/' . $item;
            // Se o item for "..", exibe um link para voltar
            if ($item == '..') {
                echo "<a href=\"..\">&lt; Voltar</a>\n<br>\n";
            } else {
                echo "<a href=\"$itemCaminho\">$item</a>\n<br>\n";
            }
        }
    }
} else {
    echo "O diretório não existe: $diretorio";
}

?>
