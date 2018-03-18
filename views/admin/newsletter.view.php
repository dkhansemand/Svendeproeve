<div class="container">
<section id="news">
    <h2>Nyhedsbrev tilmeldte</h2>
    <table class="view-table">
        <thead>
            <tr>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $subscribers = View::CallModel()->GetSubscribers();
            if(sizeof($subscribers) > 0)
            {
                foreach($subscribers as $subscriber)
                {    
            ?>
                <tr>
                    <td><?=$subscriber->subscriberEmail?></td>
                </tr>
            <?php
                } 
            }else{
                ?>
                <tr>
                    <td>Der er ingen tilmeldte</td>
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