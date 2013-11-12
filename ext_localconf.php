<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$TYPO3_CONF_VARS['BE']['AJAX']['TkcropthumbsAjaxController::init'] = 'ThomasKieslich\\Tkcropthumbs\\Controller\\AjaxController->init';

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects']['TYPO3\\CMS\\Frontend\\ContentObject\\ContentObjectRenderer'] = array(
	'className' => 'ThomasKieslich\\Tkcropthumbs\\Xclass\\ContentObjectRenderer',
);

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects']['TYPO3\\CMS\\Core\\Resource\\Processing\\LocalCropScaleMaskHelper'] = array(
	'className' => 'ThomasKieslich\\Tkcropthumbs\\Xclass\\LocalCropScaleMaskHelper',
);

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects']['TYPO3\\CMS\\Frontend\\Imaging\\GifBuilder'] = array(
	'className' => 'ThomasKieslich\\Tkcropthumbs\\Xclass\\GifBuilder',
);

?>