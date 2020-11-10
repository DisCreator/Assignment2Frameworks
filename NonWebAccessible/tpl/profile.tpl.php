<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title>Quwius</title>
		<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen">
		<meta charset="utf-8">
	</head>
	<body>
		<nav>
			<a href="#"><img src="images/logo.png" alt="UWI online"></a>
			<ul>
				<li><a href="index.php?controller=Courses">Courses</a></li>
				<li><a href="index.php?controller=Streams">Streams</a></li>
				<li><a href="index.php?controller=AboutUs">About Us</a></li>

				<?php if(isset($_SESSION)): ?>
					<li><a href="logout.php">Logout</a></li>
				<?php else: ?>
					<li><a href="index.php?controller=Login">Login</a></li>
				<?php endif ?>

				<li><a href="index.php?controller=SignUp">Sign Up</a></li>
			</ul>
		</nav>
		<main>
		<h1>Profile Page</h1>
		<h2>Enrolled Courses</h2>
		<ul class="course-list">
			<li><div>
				<a href="#"><img src="images/innovation.jpg" alt="course image"></a>
				</div>
				<div>
				<a href="#"><span class="faculty-department">Faculty or Department</span>	
					<span class="course-title">Course Title</span>
					<span class="instructor">Course Instructor</span></a>
				</div>
				<div>
					<a href="#" class="startnow-btn startnow-button">Go to Class!</a>
					<a href="#" class="startnow-btn unenroll-button">Unenroll</a>
				</div>
			</li>
			<li><div>
				<a href="#"><img src="images/innovation.jpg" alt="course image"></a>
				</div>
				<div>
				<a href="#"><span class="faculty-department">Faculty or Department</span>	
					<span class="course-title">Course Title</span>
					<span class="instructor">Course Instructor</span></a>
				</div>
				<div>
					<a href="#" class="startnow-button startnow-btn">Go to Class!</a>
					<a href="#" class="startnow-btn unenroll-button">Unenroll</a>
				</div>
			</li>
			<li><div>
				<a href="#"><img src="images/innovation.jpg" alt="course image"></a>
				</div>
				<div>
				<a href="#"><span class="faculty-department">Faculty or Department</span>	
					<span class="course-title">Course Title</span>
					<span class="instructor">Course Instructor</span></a>
				</div>
				<div>
					<a href="#" class="startnow-button startnow-btn">Go to Class!</a>
					<a href="#" class="startnow-btn unenroll-button">Unenroll</a>
				</div>
			</li>
			<li><div>
				<a href="#"><img src="images/innovation.jpg" alt="course image"></a>
				</div>
				<div>
				<a href="#"><span class="faculty-department">Faculty or Department</span>	
					<span class="course-title">Course Title</span>
					<span class="instructor">Course Instructor</span></a>
				</div>
				<div>
					<a href="#" class="startnow-button startnow-btn">Go to Class!</a>
					<a href="#" class="startnow-btn unenroll-button">Unenroll</a>
				</div>
			</li>
		</ul>
			<footer>
				<nav>
					<ul>
						<li>&copy;2015 Quwius Inc.</li>
						<li><a href="#">Company</a></li>
						<li><a href="#">Connect</a></li>
						<li><a href="#">Terms &amp; Conditions</a></li>
					</ul>
				</nav>
			</footer>
		</main>
	</body>
</html>