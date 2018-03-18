<?php
    if(isset($POST))
    {
        //var_dump(View::UseController()->VerifyLogin($POST));
        if(View::UseController()->VerifyLogin($POST, $POST['_once_default'])){
            Router::Redirect(Session::get('referer'));
            exit;
        }else{
            $errorMessage = 'Forkert brugernavn eller password!';
        }
    }
?>
<div class="container">
    <section id="loginView">
        <form action="" method="post">    
            <?=Token::createTokenInput();?>
                <div class="">
                    <h2>Login</h2>
                </div>
                <div class="">
                <h3><?= $errorMessage ?? '' ?></h3>
                </div>
                <div class="">
                    <label class="" for="username">Brugernavn/Email</label>
                    <input class="" type="text" id="username" name="username" placeholder="Brugernavn eller email" value="<?=$POST['username'] ?? ''?>" required>
                </div>
                <div class="">
                    <label class="" for="password">Adgangskode</label>
                    <input class="" type="password" id="password" name="password" placeholder="Adgangskode" required>
                </div>  
                <div>&nbsp;</div>              
                <button class="btn-accent" style="border:0;" name="btnLogin">
                    Login
                </button>
        </form>
    </section>
</div>