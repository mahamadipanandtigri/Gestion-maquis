<?php
require '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Supprimer la dépense de la base de données
        $sql = "DELETE FROM Depenses WHERE id_depense = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);

        // Renvoyer une réponse JSON
        echo json_encode(["success" => true, "message" => "Dépense supprimée avec succès !"]);
    } catch (PDOException $e) {
        // En cas d'erreur, renvoyer un message d'erreur
        echo json_encode(["success" => false, "message" => "Erreur lors de la suppression : " . $e->getMessage()]);
    }
} else {
    // Si l'ID n'est pas spécifié, renvoyer une erreur
    echo json_encode(["success" => false, "message" => "ID non spécifié."]);
}
?>