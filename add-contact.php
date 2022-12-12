<?php
    session_start();
    include('includes/header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>
                        PHP Crud com Firebase - CREATE
                        <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                        if(isset($_SESSION['status'])){
                            echo "<h4>".$_SESSION['status']."</h4>";
                            unset($_SESSION['status']);
                        }
                    ?>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form action="actions.php" method="post">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" name="nome" class="form-control mb-3">
                                </div>
                                <div class="form-group">
                                    <label for="sobrenome">Sobrenome</label>
                                    <input type="text" name="sobrenome" class="form-control mb-3">
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="text" name="email" class="form-control mb-3">
                                </div>
                                <div class="form-group">
                                    <label for="telefone">Telefone</label>
                                    <input type="text" name="telefone" class="form-control mb-3">
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="save_data" class="btn btn-primary"> Cadastrar </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include('includes/footer.php');
?>