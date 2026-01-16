<?php

use MediaWiki\MediaWikiServices;

global $wgDBname, $wgServer;

if ( MW_ENTRY_POINT !== 'cli' ) {
	if (
		isset( $wgServer ) &&
		substr( $wgServer, -10 ) !== 'wikivy.com'
	) {
    	require_once __DIR__ . '/UnknownWiki.php';
    	exit;
	} else {
		require_once __DIR__ . '/getTranslations.php';

		$escapedRequestWikiUrl = htmlspecialchars(
			'https://meta.wikivy.com/wiki/Special:RequestWiki?wpsubdomain=' . substr($wgDBname, 0, -4)
		);

		$getLanguageCode = 'getLanguageCode';
		$getTranslation = 'getTranslation';
		$getParsedTranslation = 'getParsedTranslation';

		http_response_code( 404 );

		$output = <<<EOF

			<!DOCTYPE html>
			<html lang="en">
				<head>
					<meta charset="utf-8" />
					<meta name="viewport" content="width=device-width, initial-scale=1.0" />
					<meta name="description" content="{$getTranslation( 'missingwiki' )}" />
					<title>{$getTranslation( 'missingwiki' )}</title>
					<link rel="icon" type="image/x-icon" href="https://meta.miraheze.org/favicon.ico" />
					<link rel="apple-touch-icon" href="https://meta.miraheze.org/apple-touch-icon.png" />
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
							<img src="/ErrorPages/assets/wikivy-logo.png" alt="Wikivy" />
						</p>
						<h1><b>{$getParsedTranslation( 'missingwiki' )}</b></h1>
						<p class="lead">{$getParsedTranslation( 'wiki-not-found' )}</p>
						<p>
							<a href="{$escapedRequestWikiUrl}" class="btn btn-lg btn-outline-primary" role="button">{$getParsedTranslation( 'wiki-not-found-startwiki' )}</a>
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

		try {
			MediaWikiServices::allowGlobalInstance();
			$dataStore = MediaWikiServices::getInstance()->get( 'CreateWikiDataStore' );
			$dataStore->syncCache();
		} catch ( Throwable $ex ) {
			// Do nothing
		}

		die( 1 );
	}
} else {
	// $wgDBname will always be set to a string, even if the --wiki parameter was not passed to a script.
	echo "The wiki database '{$wgDBname}' was not found." . PHP_EOL;
}
