<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<!-- Place favicon.ico in the root directory -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/custom.css">
	<link href="css/animate.css" rel="stylesheet">
	<script src="js/vendor/modernizr-2.8.3.min.js"></script>

			<script>
		function showUser(str) {
			var e = document.getElementById("catselect");
			var cat = e.options[e.selectedIndex].value;
			
			console.log(cat);
		    if (str == "") {
		        document.getElementById("txtHint").innerHTML = "";
		        return;
		    } else { 
		        if (window.XMLHttpRequest) {
		            // code for IE7+, Firefox, Chrome, Opera, Safari
		            xmlhttp = new XMLHttpRequest();
		        } else {
		            // code for IE6, IE5
		            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		        }
		        xmlhttp.onreadystatechange = function() {
		            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
		            }
		        };
		        console.log(str);
		        xmlhttp.open("GET","getbooks.php?q="+str,true);
		        xmlhttp.send();
		    }
		}
		</script>
</head>
<body>

	<!--Logo on Navigation Bar-->
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.html">
					<p id="logo">txtbkr.</p>
				</a>

			</div>
			<div>
				<form class="navbar-form navbar-left" role="search">
					<div class="form-group">
						<input type="text" size="30" onkeyup="showUser(this.value)">
					</div>
					<button type="submit" class="btn btn-default" ></img></button>
				</form>
			</div>

		</div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-md-6"><br>
			<div id="txtHint"><b>Person info will be listed here...</b></div>
			</div>
				<br />
				<div id="custom-search-input">
					<div class="input-group col-md-12">
						<input type="text" class="form-control input-lg" placeholder="Search" />
						<span class="input-group-btn">
							<div class="combobox">
								<select class="form-control-default btn-lg" id="catselect">
									<option value="1">Textbook Name</option>
									<option value="2">Author</option>
									<option value="3">Professor</option>
									<option value="4">Class</option>
									<option value="5">Subject</option>	
								</select>
							</div>
						</span>
					</div>
				</div>
			</div>
		</div>


	<!-- -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>
