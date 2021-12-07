<?php
require __DIR__ . '/config.php';
ini_set('SHORT_OPEN_TAG', true);
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?= $title ?></title>
		<base href = "/david/" />
		<meta name="description" content="<?= htmlentities($description) ?>" />
		<meta name="keywords" content="<?= htmlentities($keywords) ?>" />
		<meta name="author" content="<?= $author ?>" />
		<link rel="shortcut icon" href="favicon.ico">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/normalize.css?<?= time() ?>" />
		<link rel="stylesheet" type="text/css" href="css/demo.css?<?= time() ?>" />
		<script>document.documentElement.className = 'js';</script>
		<?php require 'youtube_player.php'; ?>
	</head>
	<body>
		<svg class="hidden">
			<symbol id="icon-arrow" viewBox="0 0 24 24">
				<title>arrow</title>
				<polygon points="6.3,12.8 20.9,12.8 20.9,11.2 6.3,11.2 10.2,7.2 9,6 3.1,12 9,18 10.2,16.8 "/>
			</symbol>
			<symbol id="icon-drop" viewBox="0 0 24 24">
				<title>drop</title>
				<path d="M12,21c-3.6,0-6.6-3-6.6-6.6C5.4,11,10.8,4,11.4,3.2C11.6,3.1,11.8,3,12,3s0.4,0.1,0.6,0.3c0.6,0.8,6.1,7.8,6.1,11.2C18.6,18.1,15.6,21,12,21zM12,4.8c-1.8,2.4-5.2,7.4-5.2,9.6c0,2.9,2.3,5.2,5.2,5.2s5.2-2.3,5.2-5.2C17.2,12.2,13.8,7.3,12,4.8z"/><path d="M12,18.2c-0.4,0-0.7-0.3-0.7-0.7s0.3-0.7,0.7-0.7c1.3,0,2.4-1.1,2.4-2.4c0-0.4,0.3-0.7,0.7-0.7c0.4,0,0.7,0.3,0.7,0.7C15.8,16.5,14.1,18.2,12,18.2z"/>
			</symbol>
			<symbol id="icon-menu" viewBox="0 0 24 24">
				<title>menu</title>
				<path d="M24,5.8H0v-2h24V5.8z M19.8,11H4.2v2h15.6V11z M24,18.2H0v2h24V18.2z"/>
			</symbol>
			<symbol id="icon-cross" viewBox="0 0 24 24">
				<title>cross</title>
				<path d="M13.4,12l7.8,7.8l-1.4,1.4l-7.8-7.8l-7.8,7.8l-1.4-1.4l7.8-7.8L2.7,4.2l1.4-1.4l7.8,7.8l7.8-7.8l1.4,1.4L13.4,12z"/>
			</symbol>
			<symbol id="icon-info" viewBox="0 0 20 20">
				<title>info</title>
				<circle style="fill:#fff" cx="10" cy="10" r="9.1"/>
				<path d="M10,0C4.5,0,0,4.5,0,10s4.5,10,10,10s10-4.5,10-10S15.5,0,10,0z M10,18.6c-4.7,0-8.6-3.9-8.6-8.6S5.3,1.4,10,1.4s8.6,3.9,8.6,8.6S14.7,18.6,10,18.6z M10.7,5C10.9,5.2,11,5.5,11,5.7s-0.1,0.5-0.3,0.7c-0.2,0.2-0.4,0.3-0.7,0.3c-0.3,0-0.5-0.1-0.7-0.3C9.1,6.2,9,6,9,5.7S9.1,5.2,9.3,5C9.5,4.8,9.7,4.7,10,4.7C10.3,4.7,10.5,4.8,10.7,5z M9.3,8.3h1.4v7.2H9.3V8.3z"/>
			</symbol>
		</svg>
		<div id="container" class="container">
			<div class="scroller">
				<?php
				foreach(glob('rooms/room*') as $i => $path):
				?>
				<div class="room <?=$i === 0 ? 'room--current' : ''?>">
					<?php include("{$path}/index.php") ?>
				</div><!-- /room -->
				<?php
				endforeach;
				?>
			</div>
		</div><!-- /container -->
		<div class="content">
			<header class="codrops-header">
				<div class="codrops-links" style="visibility:hidden;">
					<a class="codrops-icon codrops-icon--prev" href="<?= $exit ?>" title="Salir"><svg class="icon icon--arrow"><use xlink:href="#icon-arrow"></use></svg></a>
					<a class="codrops-icon codrops-icon--drop" href="<?= $gota ?>" title="Gota"><svg class="icon icon--drop"><use xlink:href="#icon-drop"></use></svg></a>
				</div>
				<h1 class="codrops-header__title"><?= $leftTitle ?></h1>
				<div class="subject"><?= $title ?></div>
				<button class="btn btn--info btn--toggle">
					<svg class="icon icon--info"><use xlink:href="#icon-info"></use></svg>
					<svg class="icon icon--cross"><use xlink:href="#icon-cross"></use></svg>	
				</button>
				<button class="btn btn--menu btn--toggle">
					<svg class="icon icon--menu"><use xlink:href="#icon-menu"></use></svg>
					<svg class="icon icon--cross"><use xlink:href="#icon-cross"></use></svg>
				</button>
				<div class="overlay overlay--menu">
					<ul class="menu">
						<li class="menu__item"><a class="menu__link" href="#"><span class="dia">miércoles 11</span><span class="hora"> 19:00&nbsp;</span><span class="evento">ProcessMaker @ ProcessMaker Inc</span></a></li>
						<li class="menu__item"><a class="menu__link" href="#"><span class="dia">miércoles 11</span><span class="hora"> 20:00&nbsp;</span><span class="evento">Digital Government System @ Plurinational State of Bolivia.</span></a></li>
						<li class="menu__item"><a class="menu__link" href="#"><span class="dia">jueves 12</span><span class="hora"> 19:00&nbsp;</span><span class="evento">Comprehensive planning system @ Ministry of Development Planning</span></a></li>
						<li class="menu__item"><a class="menu__link" href="#"><span class="dia">viernes 13</span><span class="hora"> 19:00&nbsp;</span><span class="evento">Internal Audit System Emprender @ Development Financial Institution</span></a></li>
						<li class="menu__item"><a class="menu__link" href="#"><span class="dia">sábado 14</span><span class="hora"> 19:00&nbsp;</span><span class="evento">SugarCRM integration @ Banco Economico</span></a></li>
					</ul>
				</div>
				<div class="overlay overlay--info">
					<p class="info">
						David Callizaya es un programador, diseñador y artista que se dedica a la creación de sistemas de información y comunicación.
					</p>
				</div>
			</header>
			<h4 class="location"></h4>
			<div class="slides">
				<?php
				foreach(glob('rooms/room*') as $i => $path):
				?>
				<div class="slide">
					<?php include("{$path}/slide.php") ?>
				</div>
				<?php
				endforeach;
				?>
			</div>
			<nav class="nav">
				<button class="btn btn--nav btn--nav-left">
					<svg class="nav-icon nav-icon--left" width="42px" height="12px" viewBox="0 0 70 20">
						<path class="nav__triangle" d="M52.5,10L70,0v20L52.5,10z"/>
						<path class="nav__line" d="M55.1,11.4H0V8.6h55.1V11.4z"/>
					</svg>
				</button>
				<button class="btn btn--nav btn--nav-right">
					<svg class="nav-icon nav-icon--right" width="42px" height="12px" viewBox="0 0 70 20">
						<path class="nav__triangle" d="M52.5,10L70,0v20L52.5,10z"/>
						<path class="nav__line" d="M55.1,11.4H0V8.6h55.1V11.4z"/>
					</svg>
				</button>
			</nav>
		</div><!-- /content -->
		<div class="overlay overlay--loader overlay--active">
			<div class="loader">
				<div></div>
				<div></div>
				<div></div>
			</div>
		</div>
		<script src="js/anime.min.js"></script>
		<script src="js/imagesloaded.pkgd.min.js"></script>
		<script src="js/main.js?<?= time() ?>"></script>
	</body>
</html>