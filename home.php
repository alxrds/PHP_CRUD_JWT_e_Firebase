<?php
    include('authentication.php');
    include('includes/header.php');
?>

<h1>Home Page</h1>

<?php
    if(isset($_SESSION['status'])){
        echo "<h4>".$_SESSION['status']."</h4>";
        unset($_SESSION['status']);
    }
?>

<?php
include('includes/footer.php');
?>