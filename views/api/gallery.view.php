<?php
sleep(1);
echo json_encode([$POST, 'filename' => $_FILES['gallery']['name'], 'ID' => 0]);

