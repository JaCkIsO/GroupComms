<!DOCTYPE html>
<html>
	<head>

	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="">
	    <meta name="author" content="">

	    <title>Current Projects</title>

	    <!-- Bootstrap core CSS -->
	    <link href="css/bootstrap.css" rel="stylesheet">

	    <!-- Add custom CSS here -->
	    <link href="css/sb-admin.css" rel="stylesheet">
	    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

    </head>
	<body>
		<div id="wrapper">

			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="navbar-header"><!-- Brand and toggle get grouped for better mobile display -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html">Group Comms</a>
				</div>
				<div class="collapse navbar-collapse navbar-ex1-collapse"><!-- Collect the nav links, forms, and other content for toggling -->
					<ul class="nav navbar-nav side-nav">
						<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
						<li><a href="Projects.php"><i class="fa fa-tasks"></i> Projects</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</nav>

			<div id="page-wrapper">

				<div class="row">
					<div class="col-lg-12">
						<h1>Current Projects <small>A Blank Slate</small></h1>
						<ol class="breadcrumb">
							<li><a href="#"><i class="icon-dashboard"></i> Dashboard</a></li>
							<li class="active"><i class="icon-file-alt"></i> Current Projects</li>
						</ol>
					</div>
				</div><!-- /.row -->
				<div class="row">
					<div class="col-lg-9">
						<?php

							$db_connection = mysqli_connect("localhost","sam","sam","groupcomms_projects_db");

							if(mysqli_connect_errno()){

							throw new exception("Error : ".mysqli_connect_errno()." - ".mysqli_connect_error());
							}
							else{

								if($db_query = $db_connection->query("SELECT * FROM current_projects")){

									echo "<h3>Current Projects List</h3></br>";
									echo "<table class=\"table table-hover\">";

									echo "<thead><tr><th>Project Name</th><th>Project Manager</th><th>Project Start Date</th><th>Project Stage</th></tr></thead>";
									echo "<tbody>";
									while($db_data = $db_query->fetch_array()){

										echo "<tr><td>".$db_data['project_name']."</td><td>".$db_data['project_manager']."</td><td>".$db_data['project_start_date']."</td><td>".$db_data['project_stage']."</td></tr>";
									}
									echo "</tbody>";
									echo "</table>";
									$db_query->close();
								} //if end
								else{

									echo $db_connection->errno." - ".$db_connection->error;
								} //else end
							} //else end
						?>
					</div>
				</div><!-- /.row -->
			</div><!-- /#page-wrapper -->

		</div><!-- /#wrapper -->

		<!-- JavaScript -->
	    <script src="js/jquery-1.10.2.js"></script>
	    <script src="js/bootstrap.js"></script>

	</body>
</html>