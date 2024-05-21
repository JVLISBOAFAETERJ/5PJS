<?php include 'includes/header.php'; ?>
<?php include 'includes/db.php'; ?>

<?php
$id = $conn->real_escape_string($_GET['id']);
$sql = "SELECT * FROM users WHERE id=$id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $user_type = $conn->real_escape_string($_POST['user_type']);

    $stmt = $conn->prepare("UPDATE users SET name=?, email=?, user_type=? WHERE id=?");
    $stmt->bind_param("sssi", $name, $email, $user_type, $id);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Registro atualizado com sucesso</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro: " . $stmt->error . "</div>";
    }

    $stmt->close();
}
?>

<h2>Editar Usuário</h2>
<form method="post" action="update.php?id=<?php echo $id; ?>">
    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
    </div>
    <div class="mb-3">
        <label for="user_type" class="form-label">Tipo de Usuário</label>
        <select class="form-control" id="user_type" name="user_type" required>
            <option value="Professor" <?php echo ($user['user_type'] == 'Professor') ? 'selected' : ''; ?>>Professor</option>
            <option value="Aluno" <?php echo ($user['user_type'] == 'Aluno') ? 'selected' : ''; ?>>Aluno</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
</form>

<a href="index.php" class="btn btn-secondary mt-3">Voltar ao Menu</a>

<?php include 'includes/footer.php'; ?>
