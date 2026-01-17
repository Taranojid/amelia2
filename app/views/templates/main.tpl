<!  doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]> <html class=""> <![endif]-->    
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<title>{$page_title|default:"Naturalne Mydła Jana - Sklep internetowy"}</title>

	<meta name="description" content="">
	<meta name="author" content="">

	<!--[if lt IE 9]> 
		<script src="http://html5shiv.googlecode. com/svn/trunk/html5.js"></script> 
	<![endif]-->

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{$conf->app_url}/css/whhg.css" />
	<link rel="stylesheet" href="{$conf->app_url}/css/grid.css">
	<link rel="stylesheet" href="{$conf->app_url}/css/styles.css">

	<!-- TODO: uncomment skin styles.  
	     Note, you can use another skin found in the "css" folder, or create your own one --> 
	<!-- <link rel="stylesheet" href="{$conf->app_url}/css/skin-dark.css"> -->

	<!--[if lt IE 9]>
		<link rel="stylesheet" href="{$conf->app_url}/css/ie.css">
	<![endif]-->

	<link rel="icon" type="image/png" href="{$conf->app_url}/images/favicon.png">
	<link rel="apple-touch-icon" href="{$conf->app_url}/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="{$conf->app_url}/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="{$conf->app_url}/images/apple-touch-icon-114x114.png">

</head>
<body>
	
	<!--  LOGOTYPE LINE  -->
	<!--  TODO: Change domain name and call to action message below -->
	<div id="Head" class="container">
		<div class="row">
			<div class="col span_24">
				<h1 id="Domain">🧼 Naturalne Mydła Jana<br>
					<span>Ręcznie robione, ekologiczne mydła naturalne</span></h1>
			</div>
		</div>
	</div>
	<!-- END OF LOGOTYPE LINE  -->

	<!-- CONTENT -->
	<!-- TODO: Change content in the rows/columns below 
	     Please note, 24-columns grid is used in the template, so you can reorder the blocks 
	     to make, for example, 2-columns layout (use a pair of col span_12) or 4-column one
	     (use 4 copies of col span_6) -->
	<div id="Content" class="container">
	
		{* Komunikaty systemowe Amelia Framework *}
		<div class="row">
			<div class="col span_24">
				{include file='messages.tpl'}
			</div>
		</div>

		{* GŁÓWNY BLOK TREŚCI - dziedziczony przez inne szablony (LoginView. tpl, ProductList.tpl, etc.) *}
		{block name=content}
		
		<div class="row special">
			<div class="col span_24">
				<h3 class="align-center">Witaj w sklepie z naturalnymi mydłami!</h3>
				<p class="align-center">Zapoznaj się z naszą ofertą ręcznie robionych, ekologicznych mydeł. </p>
			</div>
		</div>

		<h2 class="align-center margin">Dlaczego warto wybrać nasze mydła? </h2>
		<div class="row padding">
			<div class="col span_8">
				<div class="circle"><i class="icon icon-heart"></i></div>
				<h3 class="align-center">100% Naturalne składniki</h3>
				<p class="align-center">Nasze mydła wykonane są wyłącznie z naturalnych składników, bez chemicznych dodatków i konserwantów.</p>
			</div>

			<div class="col span_8">
				<div class="circle"><i class="icon icon-leaf"></i></div>
				<h3 class="align-center">Ekologiczne</h3>
				<p class="align-center">Dbamy o środowisko na każdym etapie produkcji - od pozyskiwania składników po opakowanie.</p>
			</div>

			<div class="col span_8">
				<div class="circle"><i class="icon icon-thumbup"></i></div>
				<h3 class="align-center">Ręczna robota</h3>
				<p class="align-center">Każda kostka mydła jest tworzona ręcznie z dbałością o najdrobniejsze detale.</p>
			</div>
		</div> <!-- end of row -->

		{/block}
		
	</div>
	<!-- END OF CONTENT -->

	<div id="Content-end" class="container"></div>

	{* FOOTER BLOCK - możliwy do nadpisania w innych szablonach *}
	{block name=footer}
	<div id="Footer" class="container">
		<div class="row top">
			<div class="col span_16">Naturalne Mydła Jana &copy; 2026. Wszelkie prawa zastrzeżone.</div>
			<div class="col span_8 align-right">Design: <a href="http://www.gettemplate.com/">GetTemplate</a></div>
		</div>
	</div>
	{/block}

<!-- TODO: In order to track visits, insert google analytics code here -->


<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="{$conf->app_url}/js/main.js"></script>

</body>
</html>