<pre>
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
</pre>
<h1>Login side eller noget</h1>
<form action="" method="post">    
    <?=Token::createTokenInput();?>

        <div class="mdl-cell mdl-cell--12-col">
            <h1>Login</h1>
        </div>
        <div class="mdl-cell mdl-cell--12-col">
           <h3><?= $errorMessage ?? '' ?></h3>
        </div>
        <div class="mdl-cell mdl-cell--12-col">
            <div class="mdl-textfield mdl-js-textfield">
                <label class="mdl-textfield__label" for="username">Username</label>
              <input class="mdl-textfield__input" type="text" id="username" name="username" value="<?=$POST['username'] ?? ''?>" required>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--12-col">
            <div class="mdl-textfield mdl-js-textfield">
                <label class="mdl-textfield__label" for="password">Password</laPel>
                <input class="mdl-textfield__input" type="password" id="password" name="password" required>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--4-col mdl-cell--3-offset">
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" name="btnLogin">
                Login
            </button>
        </div>
    
</form>