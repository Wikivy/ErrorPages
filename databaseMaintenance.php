<?php

require_once __DIR__ . '/getTranslations.php';

$getLanguageCode = 'getLanguageCode';
$getTranslation = 'getTranslation';
$getParsedTranslation = 'getParsedTranslation';

http_response_code( 503 );

echo <<<EOF
	<!DOCTYPE html>
	<html lang="{$getLanguageCode()}">
		<head>
			<meta charset="utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<meta name="description" content="{$getTranslation( 'database-maintenance' )}" />
			<title>{$getTranslation( 'database-maintenance' )}</title>
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
			<div class="jumbotron">
					<img src="/ErrorPages/assets/wikivy-logo.png" alt="Wikivy" height="350" />
				<h1><b>{$getParsedTranslation( 'database-maintenance' )}</b></h1>
				<p class="lead">{$getParsedTranslation( 'wiki-unscheduled-database-maintenance' )}</p>
				<p>
					<a href="https://wikivy.com/discord" class="btn btn-lg btn-outline-primary" role="button">{$getParsedTranslation( 'database-maintenance-join-discord' )}</a>
				</p>
				<!--<small>Maintenance has been extended for this database cluster to 12:00 UTC, Monday, 19 December, 2022. Please check back soon.</small>-->
			</div>
		</div>
		<div class="bottom-links">
			<a href="#" onClick="history.go(-1); return false;">&larr; {$getParsedTranslation( 'wiki-not-found-goback' )}</a>
			<!--<a href="https://meta.miraheze.org/wiki/Special:MyLanguage/Miraheze">{$getParsedTranslation( 'wiki-not-found-meta' )}</a>-->
		</div>
	</html>
EOF;

die( 1 );
