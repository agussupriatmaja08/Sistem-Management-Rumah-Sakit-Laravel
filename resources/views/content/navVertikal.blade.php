<!DOCTYPE html>
<html>
<head>
	
	<style>
		body {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
          
		}
		nav {
			background-color: #333;
			height: 100vh;
			position: fixed;
			top: 0;
			left: 0;
            width: 15%;
			padding: 5px;
			display: flex;
			flex-direction: column;
            color: white;
			overflow: auto;
            
		
		}
		nav ul {
			list-style: none;
			margin: 0;
			padding: 0;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
		
		}
		nav ul li {
			padding: 2px 0;
			text-align: center;
		}
		nav ul li a {
			color:#c1bdbd;
			text-decoration: none;
			font-size: 14px;
		
			text-transform: uppercase;
			display: block;
			padding: 10px 20px;
			transition: all 0.3s ease;
		}
		nav ul li a:hover {
			color: white;
            
		}
        img{
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin: auto;
            margin-top: 0px;
            margin-bottom: 0px;
        }
        .aktif{
            color: red;
        }
		.aktif:hover{
			color: red;
		}
	</style>
</head>
<body>
	
	<nav>
        <br> <br>
        <img src="img/tumblr_9495561a105be7cd3294c83842f48ad1_f488648c_400.jpg" alt="">
        <center>
            <br>
        <h4> <b>Admin</b></h4>
        <br> 
    </center>
		<ul>
			<li><a href="/home"  class="{{ ($title === "Home")? 'aktif' : '' }}"> Home</a></li>
			<li><a href="/pasien" class="{{ ($title === "Pasien" || $title === "Form Add Pasien")? 'aktif' : '' }}">Data Pasien</a></li>
			<li><a href="/medis" class="{{ ($title === "Medis")? 'aktif' : '' }}">Data Tenaga Medis</a></li>
			<li><a href="/ruangan " class="{{ ($title === "Ruangan")? 'aktif' : '' }}" onclick="refreshPage()">Data Ruangan</a></li>
			<li><a href="/inap" class="{{ ($title === "Pengelolaan Pasien Inap" || $title == 'Data Pasien Inap')? 'aktif' : '' }}">Pengelolaan Inap</a></li>
			<li><a href="/rujukan " class="{{ ($title === "Rujukan")? 'aktif' : '' }}">Pengelolaan Rujukan</a></li>
			<li><a href="/about" class="{{ ($title === "About")? 'aktif' : '' }}">About</a></li>
			<li> <a href="/logout" onclick="return confirm('Yakin logout?')">Log Out</a></li>

		</ul>
	</nav>

	<script>
		function refreshPage() {
			location.reload();
		}
	</script>
</body>
</html>
