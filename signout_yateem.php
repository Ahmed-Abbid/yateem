<?php session_start();
//unset($_SESSION['idadmin']);    //way to pause session
session_destroy();       //another way to pause session
?>
<script type="text/javascript">                 //script to transmit to form of rigister
location.href="signin_form_yateem.php#modal";
</script>


