<main>
    <div class="login-container">
        <form action="login" method="post">
            <legend>Sign in to your account</legend>
            <span>You don't have an account ? <a href="#">Sign up</a></span>
            <div class="email">
                <label for="email">email</label>
                <input type="email" name="email">
            </div>

            <div class="password">
                <label for="password">password</label>
                <input type="password" name="password">
            </div>
            <span style=" 5px; color: red; margin-top: 5px;" >
                <?= $error ?>
            </span>
            <input class="submit" type="submit" name="submit" value="Sign in">


        </form>
    </div>

</main>

