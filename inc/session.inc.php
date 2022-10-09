<!-- Transferred the session start over so works on all pages (makes header work) Code by Jack Turner - Comment by Az -->

<?php
@session_start();

$session_value = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : ''; ?>