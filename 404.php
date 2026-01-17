<?php

require_once __DIR__ . '/getTranslations.php';

$getTranslation = 'getTranslation';
$getParsedTranslation = 'getParsedTranslation';

header( 'Content-Type: text/html; charset=utf-8' );
header( 'Cache-Control: s-maxage=2678400, max-age=2678400' );

echo <<<EOF
	<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<meta name="description" content="{$getTranslation( 'page-not-found' )}" />
			<title>{$getTranslation( 'page-not-found' )}</title>
			<link rel="icon" type="image/x-icon" href="https://meta.wikivy.com/favicon.ico" />
			<link rel="apple-touch-icon" href="https://meta.wikivy.com/apple-touch-icon.png" />
			<!-- Bootstrap core CSS -->
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
			<!-- Outfit font from Google Fonts -->
			<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit">
			<link href="/ErrorPages/assets/main.css" rel="stylesheet">
		</head>
		<div class="container">
			<!-- Jumbotron -->
			<div class="jumbotron" style="padding: 70px 0; text-align: center;">
				<p>
					<a href="https://wikivy.com">
						<p style="text-align: center;">
							<img src="/ErrorPages/assets/wikivy-logo.png" alt="Wikivy" height="350" />
						</p>
					</a>
				</p>
				<h1><b>{$getParsedTranslation( 'page-not-found' )}</b></h1>
				<p>{$getParsedTranslation( 'page-not-found-more' )}</p>
			</div>
		</div>
		<div class="bottom-links">
			<a href="#" onClick="history.go(-1); return false;">&larr; {$getParsedTranslation( 'wiki-not-found-goback' )}</a>
			<a href="/">{$getParsedTranslation( 'page-not-found-mainpage' )}</a>
		</div>
	</html>
EOF;
