<?php 
session_start();


if (!isset($_SESSION["login_session_role"]) ){
	$login_session_role="";

}else{
	$login_session_role = $_SESSION["login_session_role"];
	
}



if (!isset($_SESSION["login_session"]) ){
	$login_session="";

}else{
	$login_session = $_SESSION["login_session"];
	
}




function logout()
{
	if (session_destroy()) {
		?>
		<script type="text/javascript">
			location.replace("login");
			
		</script>
		<?php
	}else{
		session_write_close();
		?>
		<script type="text/javascript">
			location.replace("login");
			
		</script>
		<?php
	}
}

?>




