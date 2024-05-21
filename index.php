<?php include 'includes/header.php'; ?>
<?php include 'includes/db.php'; ?>

<h2>Lista de Usuários</h2>
<a href="create.php" class="btn btn-primary mb-3">Adicionar Usuário</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Tipo de Usuário</th>
            <th>Criado em</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['user_type']}</td>
                        <td>{$row['created_at']}</td>
                        <td>
                            <a href='update.php?id={$row['id']}' class='btn btn-warning btn-sm'>Editar</a>
                            <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm'>Deletar</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Nenhum usuário encontrado</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php include 'includes/footer.php'; ?>
