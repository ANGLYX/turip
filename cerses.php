<?php
session_start();
session_destroy();
echo "<script>alert('Has cerrado sesion'); window.location='index.php'</script>"
?>