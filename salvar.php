<?php
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$imagem = $_FILES['imagem'];


if (!is_dir('imagens')) {
    mkdir('imagens', 0755, true);
}

if ($imagem['error'] === 0) {
    $ext = strtolower(pathinfo($imagem['name'], PATHINFO_EXTENSION));
    $tiposPermitidos = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($ext, $tiposPermitidos)) {
        $nomeImagem = uniqid() . '.' . $ext;
        $caminhoDestino = 'imagens/' . $nomeImagem;

        if (move_uploaded_file($imagem['tmp_name'], $caminhoDestino)) {
            $carros = [];

           
            if (file_exists('data/carros.json')) {
                $carros = json_decode(file_get_contents('data/carros.json'), true);
            }

            $novoCarro = [
                'id' => uniqid(),
                'nome' => $nome,
                'descricao' => $descricao,
                'imagem' => $nomeImagem
            ];
            $carros[] = $novoCarro;

            file_put_contents('data/carros.json', json_encode($carros, JSON_PRETTY_PRINT));
        } else {
            die('Erro ao mover a imagem para a pasta de destino.');
        }
    } else {
        die('Tipo de arquivo não permitido.');
    }
} else {
    die('Erro no upload da imagem.');
}

header('Location: index.php');
exit;