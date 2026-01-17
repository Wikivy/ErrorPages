<?php

require_once __DIR__ . '/getTranslations.php';

$getLanguageCode = 'getLanguageCode';
$getTranslation = 'getTranslation';
$getParsedTranslation = 'getParsedTranslation';

header( 'Cache-control: no-cache' );

http_response_code( 410 );

$output = <<<EOF

	<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<meta name="description" content="{$getTranslation( 'unknownwiki-body' )}" />
			<title>{$getTranslation( 'unknownwiki' )}</title>
			<link rel="icon" type="image/x-icon" href="https://meta.wikivy.com/favicon.ico" />
			<link rel="apple-touch-icon" href="https://meta.wikivy.com/apple-touch-icon.png" />
			<!-- Bootstrap core CSS -->
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
			<!-- Outfit font from Google Fonts -->
			<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit">
			<link href="/ErrorPages/assets/main.css" rel="stylesheet">
		</head>
		<div class="container" style="padding: 70px 0; text-align: center;">
			<!-- Jumbotron -->
			<div class="jumbotron">
				<p style="text-align: center; animation: fadein 1s;">
					<img src="/ErrorPages/assets/wikivy-logo.png" alt="Wikivy" height="350" />
				</p>
				<h1><b>{$getParsedTranslation( 'unknownwiki' )}</b></h1>
				<p class="lead">{$getParsedTranslation( 'unknownwiki-body' )}</p>
				<p>
					<a href="https://meta.wikivy.com/wiki/Special:MyLanguage/Help_center" class="btn btn-lg btn-outline-primary" role="button">{$getParsedTranslation( 'get-help' )}</a>
					<a href="https://meta.wikivy.com/wiki/Special:MyLanguage/Custom_domains" class="btn btn-lg btn-outline-info" role="button">{$getParsedTranslation( 'custom-domain-instructions' )}</a>
				</p>
			</div>
		</div>
		<div class="bottom-links">
			<a href="#" onClick="history.go(-1); return false;">&larr; {$getParsedTranslation( 'wiki-not-found-goback' )}</a>
			<a href="https://wikivy.com">Wikivy</a>
			<a href="https://meta.wikivy.com/wiki/Special:WikiDiscover">{$getParsedTranslation( 'wiki-directory' )} &rarr;</a>
		</div>
	</html>
EOF;
header( 'Content-length: ' . strlen( $output ) );
echo $output;


die( 1 );
