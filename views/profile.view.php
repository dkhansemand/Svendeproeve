<?php
    $userID = (new Guard)->decoding($_SESSION['global'])->data->userId;
    $userData = View::CallModel()->GetUserInfo($userID);
?>
<div class="container">
    <section id="profileView">
        <h2>Min Side</h2>
        <div class="profile">
            <div class="profile-img">
            <?php
                if(!is_null($userData->filename))
                {
               ?>
                    <img src="<?=Router::$BASE?>assets/media/<?=$userData->filename?>" alt="Profil billede">
               <?php
                }
                else
                {
            ?>
                <img src="<?=Router::$BASE?>assets/media/profile_placeholder.jpg" alt="Profil billede">
            <?php
                }
            ?>
            </div>
            <span></span>
            <div class="profile-info">
                <p>Navn:</p>
                <p>Email:</p>
                <p>Mobil:</p>
                <p>Færdighedsniveau:</p>
                <p>Roede kilometre:</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
            </div>
            <div class="profile-data">
                <p><?=$userData->fullname?></p>
                <p><?=$userData->userEmail?></p>
                <p><?=$userData->userPhone ?? '(ikke angivet)'?></p>
                <p><?=$userData->userLevelName?></p>
                <p><?=$userData->userKm?></p>
                <p><a href="<?=Router::Link('/Admin/Min-Side')?>">Gå til admin</a></p>
                <p><a href="<?=Router::Link('/Logud')?>">Log ud</a></p>    
            </div>
            <div class="profile-events">
                <p>Tilmeldt:</p>
            </div>
            <div class="profile-events">
                <p>Tilmeldt:</p>
                <p>Tilmeldt:</p>
                <p>Tilmeldt:</p>
            </div>
        </div>
    </section>
</div>