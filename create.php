<?php include 'includes/header.php'; ?>
<?php include 'includes/db.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $user_type = $conn->real_escape_string($_POST['user_type']);

    $stmt = $conn->prepare("INSERT INTO users (name, email, user_type) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $user_type);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Novo registro criado com sucesso</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro: " . $stmt->error . "</div>";
    }

    $stmt->close();
}
?>

<h2>Adicionar Usuário</h2>
<form method="post" action="create.php">
    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="user_type" class="form-label">Tipo de Usuário</label>
        <select class="form-control" id="user_type" name="user_type" required>
            <option value="Professor">Professor</option>
            <option value="Aluno">Aluno</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Adicionar</button>
</form>

<a href="index.php" class="btn btn-secondary mt-3">Voltar ao Menu</a>

<?php include 'includes/footer.php'; ?>
