<div class="container">
<section id="news">
    <h2>Medlemmer</h2>
    <a href="<?=Router::Link('/Admin/Medlem/Opret')?>" class="btn-accent">Opret medlem</a>
    <table class="view-table">
        <thead>
            <tr>
                <th>Navn</th>
                <th>Email</th>
                <th>Færdighedsniveau</th>
                <th>Bruger rolle</th>
                <th>Handlinger</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $members = View::CallModel()->GetAllMembers();
            if(sizeof($members) > 0)
            {
                foreach($members as $member)
                {    
            ?>
                <tr>
                    <td><?=$member->fullname?></td>
                    <td><?=$member->userEmail?></td>
                    <td><?=$member->userLevelName?></td>
                    <td><?=$member->roleName?></td>
                    <td>
                        <a href="<?=Router::Link('/Admin/Medlem/Ret/'.$member->userId)?>" class="btn-success">Ret</a>
                    <?php
                        if((new Guard)->decoding($_SESSION['global'])->data->userId !== $member->userId)
                        {
                    ?>
                            <a href="<?=Router::Link('/Admin/Medlem/Slet/'.$member->userId)?>" class="btn-error">Slet</a>
                    <?php
                        }
                    ?>
                    </td>
                </tr>
            <?php
                } 
            }else{
                ?>
                <tr>
                    <td>Der er ingen medlemer at vise</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</section>
</div>