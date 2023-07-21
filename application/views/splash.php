<html>
	<head>
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<style>
		html,body{
			width: 100%;
			height: 100%;
			background: rgb(5, 0, 23);
		}
		.fade-in {
			opacity: 1;
			animation-name: fadeInOpacity;
			animation-iteration-count: 1;
			animation-timing-function: ease-in;
			animation-duration: 2s;
		}
		
		@keyframes fadeInOpacity {
			0% {
				opacity: 0;
			}
			100% {
				opacity: 1;
			}
		}
	</style>
	<body>
		<img id="logotipo" class="fade-in" src="<?=base_url('site-img/logo_head.svg');?>" style="width: 70%;position: absolute;margin: auto;top: 0;left: 0;right: 0;bottom: 0;">
	</body>
</html>

<script>	
     setTimeout(function(){
        window.location.href = '<?=base_url('inicio');?>';
     }, 2000);
  </script>