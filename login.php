<?php
session_start();
include('includes/header.php');
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>
                        Login
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                        if(isset($_SESSION['status'])){
                            echo "<h4>".$_SESSION['status']."</h4>";
                            unset($_SESSION['status']);
                        }
                    ?>
                    <form action="loginAction.php" method="POST">
                        <div class="form-group mb-3">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary" name="login_now"> Entrar agora</button>
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