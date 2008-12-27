<?php

/** Extension: SemanticHTMLParser.
  * Simple extension to take an element name, render its attributes and return
  * the complete HTML element to MediaWiki.
  * 
  *
  * Notes: I'm new to MediaWiki hacking. Pretty sure there should be an
  * easier way to say ‘don't drop these elements’, rather than having to
  * re-render them. Oh well.
  *
  * Add new element names and method hooks to SemanticHTML.class.php
  * 
  * @author Ben Ward 
  */

if( !defined( 'MEDIAWIKI' ) )
	die();

$wgExtensionCredits['parserhook']['SemanticHTML'] = array(
	'name'           => 'Semantic HTML',
	'svn-date' => '$LastChangedDate: 2008-07-06 16:49:00 +0100 (Sun, 6 July 2008) $',
	'svn-revision' => '$LastChangedRevision: $',
	'author'         => array( 'Ben Ward' ),
	'description'    => 'Enables use of HTML4 phrase elements in MediaWiki',
	'descriptionmsg' => 'semantichtml-desc',
	'url'            => 'http://www.mediawiki.org/wiki/Extension:SemanticHTML',
);

$dir = dirname(__FILE__) . '/';
$wgExtensionMessagesFiles['SemanticHTML'] = $dir . 'SemanticHTML.i18n.php';
$wgAutoloadClasses['SemanticHTMLParser'] = $dir . 'SemanticHTML.class.php';
$wgHooks['ParserFirstCallInit'][] = 'initSemanticHTML';

/**
 * Register parser hook
 */  
function initSemanticHTML() {
    require_once('SemanticHTML.class.php');
    SemanticHTMLParser::registerHooks();
	return true;
}

?>