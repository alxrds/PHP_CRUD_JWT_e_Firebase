<?php
session_start();
include('includes/header.php');
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 mt-5">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Registro
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                        if(isset($_SESSION['status'])){
                            echo "<h4>".$_SESSION['status']."</h4>";
                            unset($_SESSION['status']);
                        }
                    ?>
                    <form action="actions.php" method="post">
                        <div class="form-group mb-3">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="sobrenome">Sobrenome</label>
                            <input type="text" name="sobrenome" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="telefone">Telefone</label>
                            <input type="text" name="telefone" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" name="register_new" class="btn btn-primary">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>