<div class="container">
<h2>Modtaget bedskeder:</h2>
<section id="messagesView">
    <?php
        foreach(View::CallModel()->GetAllMessages() as $message)
        {
    ?>
            <article>
                <h4>Fra: <?=$message->contactName?></h4>
                <p>Email: <?=$message->contactEmail?></p>
                <p>Telefonnummer: <?=$message->contactMobile ?? '(ikke angivet)'?></p>
                <p>Besked: </p>
                <p>
                    <?=$message->contactMessage?>
                </p>
                <a href="<?=Router::Link('/Admin/Besked/Slet/'.$message->contactId)?>" class="btn-error">Slet</a>
            </article>
    <?php
        }
    ?>
</section>
</div>