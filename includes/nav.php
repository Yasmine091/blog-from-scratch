<nav>
    <ul>
        <li><a href="/">Accueil</a></li>
    
        <?php
        if($_SESSION['logged'] = true){
        echo'
        <li><a href="/admin.php">Administration</a></li>
        <li><form method="POST"><input type="submit" name="logout" value="Déconnection"></form></li>
        ';
        if(isset($_POST['logout'])){
            session_destroy();
            $_SESSION['logged'] = false;
        }
        }
        else{
            echo '<li><a href="/?page=login">Login</a></li>';
        }
        ?>
    </ul>
</nav>