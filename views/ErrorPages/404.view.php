

    <div class="cover">
        <h1>Siden blev ikke fundet i systemet <small>Fejl 40(4)</small></h1>
        <p class="lead">
            <?php $msg = $msg ?? new FlashMessages(); echo  @$msg->hasErrors() ? $msg->display() : null; ?>
        </p>
    </div>
