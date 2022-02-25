<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/{{style}}">
    <title>CineMaster</title>

</head>
<body>
<nav>
    <div class="nav-container">
        <p class="logo">
            CineMaster
        </p>
        <ul class="list">

            <?php if($post === true) : ?>
                <li class="item">
                    <form class="search-bar" action="" method="get">
                        <input type="text" name="search" placeholder="search">
                    </form>
                </li>
                <li class="item "> <a href="logout" class="login">Logout</a> </li>
            <?php else : ?>
                <li class="item"> <a href="#">View Posts</a>  </li>
                <li class="item "> <a href="login" class="login">Login/Signup</a> </li>
            <?php endif ?>

        </ul>
        <button class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</nav>

{{content}}
<footer>
    <div class="logo">
        CineMaster
    </div>
    <div class="socials">
        <img src="/images/facebook white.png" alt="facebook">
        <img src="/images/insta.png" alt="instagram">
        <img src="/images/linked.png" alt="linkedin">
    </div>
    <div class="policy">Terms of use . Privacy policy</div>
    <div class="copyright">&copy; 2022 All Rights Reserved
    </div>
</footer>

</body>
</html>






