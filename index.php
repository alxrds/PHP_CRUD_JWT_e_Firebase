<?php
    include('authentication.php');
    include('includes/header.php');
?>
<div class="container">
    <div class="row">

        <div class="col-md-3">
            <div class="card md-3">
                <div class="card-body">
                    <h5>
                        Total de Registros:
                        <?php
                            include('dbcon.php');
                            $ref_table = "contatos";
                            $totalNum = $database->getReference($ref_table)->getSnapshot()->numChildren();
                            echo $totalNum;
                        ?>
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>
                        PHP Crud com Firebase - READ
                        <a href="add-contact.php" class="btn btn-primary float-end">Adicionar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                        if(isset($_SESSION['status'])){
                            echo "<h4>".$_SESSION['status']."</h4>";
                            unset($_SESSION['status']);
                        }
                    ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Sobrenome</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th colspan="2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                include('dbcon.php'); 
                                $ref_table = "contatos";
                                $fetchdata = $database->getReference($ref_table)->getValue();
                                if($fetchdata > 0){

                                    foreach($fetchdata as $key => $row){
                                        echo '
                                            <tr>
                                                <td>'.$row['nome'].'</td>
                                                <td>'.$row['sobrenome'].'</td>
                                                <td>'.$row['email'].'</td>
                                                <td>'.$row['telefone'].'</td>
                                                <td>
                                                    <a href="edit.php?id='.$key.'" class="btn btn-primary"><i class="bi bi-pencil"></i></a>
                                                </td>
                                                <td>
                                                    <form action="actions.php" method="POST">
                                                        <input type="hidden" name="id" value="'.$key.'">
                                                        <button type="submit" name="delete_data" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        ';
                                    }

                                }else{

                                    echo '
                                        <tr>
                                            <td colspan="6">Nenhum dado encontrado</td>
                                        </tr>
                                    ';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include('includes/footer.php');
?>
