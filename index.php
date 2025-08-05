<?php
require_once "config.php";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie volé</title>
    <?= getCommonCSS() ?>
</head>
<body>
    <div class="container">
        <table class="products-container">
            <thead>
                <tr>
                    <th>Valeur</th>
                    <th>Date et heure du cookie</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    try {
                        $stmt = $pdo->query("SELECT * FROM cookie ORDER BY date_steal DESC");
                        $cookies = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($cookies as $cookie): ?>
                            <tr>
                                <td><?= $cookie["value"]?></td>
                                <td><?= date('d/m/Y à H:i', strtotime($cookie['created_at'])) ?></td>
                            </tr>
                        <?php endforeach;
                    } catch(PDOException $e) {
                        echo "<div class='alert alert-error'>Erreur lors du chargement des produits.</div>";
                    }
                ?>
                <tr>

                </tr>
            </tbody>
        </table>
    </div>
</body>