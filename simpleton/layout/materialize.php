<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $this->pageTitle; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link type="text/css" rel="stylesheet" href="/materialize/css/materialize.min.css" media="screen, projection"/>
	<link type="text/css" rel="stylesheet" href="/materialize/css/font-awesome.min.css" media="screen, projection"/>

	<link href="/prismjs/prism.css" rel="stylesheet" type="text/css">
    <link href="/prismjs/prism-ghcolors.css" rel="stylesheet" type="text/css">

	<link type="text/css" rel="stylesheet" href="/css/style.css" media="screen, projection"/>
</head>

<body>
	<div class="navbar-fixed">
		<nav>
			<div class="nav-wrapper container">
				<a href="/" class="brand-logo">PHP Test</a>
			</div>
		</nav>
	</div>

	<div class="container-fluid">
		<div class="row">
			<?php echo $content; ?>
		</div>
	</div>

	<footer class="page-footer">
		<div class="container">
			<div class="row">
				<div class="col l6 s12">
					<h5 class="white-text">PHP Test</h5>
					<p class="grey-text text-lighten-4">PHP Test is a playground for PHP and related technologies/languages namely HTML, CSS, JavaScript</p>
				</div>
				<div class="col l4 offset-l2 s12">
					<h5 class="white-text">Links</h5>
					<ul>
						<li><a class="grey-text text-lighten-3" href="https://github.com/ehsanx64/php-examples/tree/main/simple-framework" target="_blank">simple-framework on GitHub</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
				© 2023 Ehsan Mohammadi
			</div>
		</div>
	</footer>

	<script type="text/javascript" src="/materialize/js/jquery.min.js"></script>
	<script type="text/javascript" src="/materialize/js/materialize.min.js"></script>
	<script type="text/javascript" src="/prismjs/clipboard.min.js"></script>
    <script type="text/javascript" src="/prismjs/prism.js"></script>
	<script type="text/javascript" src="/js/script.js"></script>
</body>
</html>
