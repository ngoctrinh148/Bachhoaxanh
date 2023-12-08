<?php 
session_start();
unset($_SESSION['login']['dt']);
unset($_SESSION['ten']);

echo "
<script language='javascript'>
window.open('./index.php','_parent' ,1);
</script>
"
?>