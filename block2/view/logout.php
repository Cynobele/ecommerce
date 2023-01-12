<?php
    session_start();
    session_destroy();
?>

<p>Logged out successfully, redirecting to login page...</p>

<?php
    header("Location: login.php");
?>