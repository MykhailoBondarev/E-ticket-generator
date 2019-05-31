<?php

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Generate E-ticket to PDF</title>
</head>
<body>
	<style type="text/css" media="all">
		div {
			text-align: center;
			padding: 20% 0;			
		}

		a {
			color: green;
			font-size: 25px;
			text-decoration-line: none;
			font-family: sans-serif;
			display: inline-block;
			position: relative;	
		}

		a:hover {
/*			color: red;
			font-size: 30px; 
			-moz-transform: rotate(180deg); 
    		-ms-transform: rotate(180deg); 
    		-webkit-transform: rotate(180deg);
    		-o-transform: rotate(180deg); 
    		transform: rotate(180deg);*/
    		animation-name: pulse;
    		-webkit-animation-name: pulse;
    		animation-duration: 2s;
    		-webkit-animation-duration: 2s;	    		
		}

		a:hover + .arrow-up {
			animation-name: movein;
    		-webkit-animation-name: movein;
    		animation-duration: 2s;
    		-webkit-animation-duration: 2s;	
    		bottom: 75px; 

		}

		.arrow-up {
			position: absolute;
			bottom: -1000px;
			left: 47%;
			max-width: 100px;
			width: 100%; 
		}

		@keyframes pulse {
			0% { font-size: 25px; color: green; }
			50% { font-size: 30px; color: red; }
			100% { font-size: 25px; color: green; }
		}

		@keyframes movein {
			0% { opacity: 0; bottom: -1000px; }
			25% { opacity: 1; bottom: 75px; }
			50% { opacity: 1; bottom: 50px; }
			100% { opacity: 1; bottom: 75px; }
		}		
	</style>
	<div>
		<a href="create_invitation">Генератор Е-квитків</a>
		<img class="arrow-up" src="/pic/arrow-up.png">
	</div>	
</body>
</html>

