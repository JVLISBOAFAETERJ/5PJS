<?php include 'includes/db.php'; ?>

<?php
$id = $conn->real_escape_string($_GET['id']);
$stmt = $conn->prepare("DELETE FROM users WHERE id=?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "<div class='alert alert-success'>Usuário deletado com sucesso</div>";
} else {
    echo "<div class='alert alert-danger'>Erro ao deletar: " . $stmt->error . "</div>";
}

$stmt->close();
header("Location: index.php");
exit();
?>
