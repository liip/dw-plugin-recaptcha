<?php
/**
 * Options for the recaptcha plugin
 *
 * @author Adrian Schlegel <adrian.schlegel@liip.ch>
 * @author Robert Bronsdon <reashlin@gmail.com>
 */

$meta['publickey']  = array('string');
$meta['privatekey'] = array('string');
$meta['theme'] = array('multichoice', '_choices'=>array('red', 'white', 'blackglass', 'custom'));
$meta['lang'] = array('multichoice', '_choices'=>array('en', 'nl', 'fr', 'de', 'pt', 'ru', 'es', 'tr'));
$meta['regprotect'] = array('onoff');
$meta['editprotect'] = array('onoff');
$meta['forusers'] = array('onoff');
