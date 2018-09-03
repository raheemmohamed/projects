<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>404 Page Not Found</title>
<link rel="shortcut icon" href="http://www.londonteclms.tk/assets/frontend/img/londontec.gif">
<style type="text/css">
body{
	font-family:Arial, Helvetica, sans-serif;
}
.wrap{
	width:1000px;
	margin:0 auto;
	background:#fff;
}
.logo {
   width: 50%;
    margin: 0px auto;
    padding-top: 4em;
    text-align: center;
}
p{
	padding-top: 1em;
}
p a {
    color: #eee;
    font-size: 13px;
    /* margin-left: 30px; */
    padding: 5px;
    background: #000000;
    text-decoration: none;
    -webkit-border-radius: .3em;
    -moz-border-radius: .3em;
    border-radius: .3em;
}

p a:hover {
    color: rgb(249, 106, 106);
}

/*--responsive--*/

@media(max-width:991px){

	.wrap {
		margin: 0px auto;
		width: 897px;
	}

}
@media(max-width:900px){
	.wrap {
		margin: 0px auto;
		width: 820px;
	}

}	
@media(max-width:800px){
	.wrap {
		margin: 0px auto;
		width: 700px;
	}
}
@media (max-width:736px){
	.wrap {
		margin: 0px auto;
		width: 627px;
	}

}
@media(max-width:667px){
	.wrap {
		margin: 0px auto;
		width: 600px;
	}

}
@media(max-width:640px){
	.wrap {
		margin: 0px auto;
		width: 570px;
	}

}
@media(max-width:600px){
	.wrap {
		margin: 0px auto;
		width:458px;
	}
	.logo {
		width: 322px;
		margin: 0 auto;
		padding-top: 9em;
	}
	.logo img {
		width: 100%;
	}
	.footer {
		position: absolute;
		bottom: 147px;
		left: 69px;
		font-size: 12px;
	}
}

@media(max-width:480px){
	.wrap {
		margin: 0px auto;
		width:375px;
	}

}
@media(max-width:440px){
	.footer {
		position: absolute;
		bottom: 105px;
		left: 48px;
		font-size: 12px;
	}
}
@media(max-width:414px){

	.wrap {
		margin: 0px auto;
		width: 357px;
	}


}
@media(max-width:384px){
	.wrap {
		margin: 0px auto;
		width: 363px;
	}
	
}
@media(max-width:375px){
	.wrap {
		margin: 0px auto;
		width: 337px;
	}
	.logo {
		width:250px;
		margin: 0 auto;
		padding-top:8em;
	}
}
@media(max-width:320px){
	.wrap {
		margin: 0px auto;
		width: 285px;
	}
	.logo {
		width:181px;
		margin: 0 auto;
		padding-top:5em;
	}

}
</style>
</head>
<body>
<div class="wrap">
    <div class="logo">
        <img src="http://www.londonteclms.tk/assets/frontend/img/londontec.gif" alt="logo"  />
        <h1><?php echo $heading; ?></h1>
		<?php echo $message; ?>

    </div>

    	

</div>


</body>
</html>
