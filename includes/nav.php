<nav>
    <ul>
        <li><a href="/">Accueil</a></li>
        <li>
        <?php
        
        if($logged_in == true){
            echo '<a href="/admin.php">Administration</a>';
        }
        else{
            echo '<a href="/?page=login">Login</a>';
        }
        ?>
        </li>
    </ul>
</nav>