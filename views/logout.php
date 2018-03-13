<?php
session_start();
session_destroy();
ob_start();
Router::Redirect('/');
exit;