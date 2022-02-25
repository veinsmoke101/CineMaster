<main>
    <div class="login-container">
        <form action="register"  method = "post">
            <legend>Create your account</legend>
            <span>You already have an account ? <a href="#">Log in</a></span>
            <div class="name">
                <div class="firstname">
                    <label for="firstname">firstname</label>
                    <input class="selector" type="text" name="firstname" id="">

                </div>
                <div class="lastname">
                    <label for="lastname">lastname</label>
                    <input class="selector" type="text" name="lastname" id="">
                </div>
            </div>
            <div class="birthdate">
                <label for="birthdate">birthdate</label>
                <input type="date" name="birthdate" id="">
            </div>
            <div class="email">
                <label for="email">email</label>
                <input type="email" name="email">
            </div>

            <div class="password">
                <label for="password">password</label>
                <input type="password" name="password">
            </div>
            <span id="error" style=" 5px; color: red; margin-top: 5px;" >
            </span>
            <input class="submit" type="submit" name="submit" value="register">


        </form>
    </div>

</main>
<script>
    const form = document.querySelector('form');


    form.addEventListener('submit', (e) => {
        const inputs = document.querySelectorAll('input');
        let error = '';
        inputs.forEach(input =>{
            if(input.value === ''){
                error = 'Fill all the fileds before submitting';
            }
        });
        if(error !== ''){
            e.preventDefault();
            let errorContainer = document.getElementById('error');
            errorContainer.innerText = error;
            // error = '';
        }
    })



</script>