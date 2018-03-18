<?php
    $userID = (new Guard)->decoding($_SESSION['global'])->data->userId;
    $userData = View::CallModel()->GetUserInfo($userID);
?>
<div class="container">
    <section id="profileView">
        <h2>Min Side</h2>
        <div class="profile">
            <div class="profile-img">
                <img src="<?=Router::$BASE?>assets/media/profile_placeholder.jpg" alt="Profil billede">
            </div>
            <span></span>
            <div class="profile-info">
                <p>Navn:</p>
                <p>Email:</p>
                <p>Mobil:</p>
                <p>Færdighedsniveau:</p>
                <p>Roede kilometre:</p>
            </div>
            <div class="profile-data">
                <p><?=$userData->fullname?></p>
                <p><?=$userData->userEmail?></p>
                <p><?=$userData->userPhone ?? '(ikke angivet)'?></p>
                <p><?=$userData->userLevelName?></p>
                <p><?=$userData->userKm?></p>
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