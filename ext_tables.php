<?php

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

if (TYPO3_MODE === 'BE') {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
		'txtkcropthumbsM1',
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'mod1/');
}

//crop to sys_file_reference
$sysFilereferenceTemp = array(
	'tx_tkcropthumbs_crop' => array(
		'label' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_db.xlf:tca.crop',
		'config' => array(
			'type' => 'passthrough'
		)
	)
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
	'sys_file_reference',
	$sysFilereferenceTemp
);

//Aspectratio tt_content
$extConf = unserialize($TYPO3_CONF_VARS['EXT']['extConf']['tkcropthumbs']);
$aspectvalues = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $extConf['aspectratio']);
$aspectratios = array();
$aspectratios[] = array('-:-', ' ');
foreach ($aspectvalues as $value) {
	$aspectratios[] = array($value, $value);
}

$tempColumns = array(
	'tx_tkcropthumbs_aspectratio' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_db.xlf:tca.aspectratio',
		'config' => array(
			'type' => 'select',
			'items' => $aspectratios,
			'minitems' => 1,
			'maxitems' => 1,
		)
	)
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
	'tt_content',
	$tempColumns
);

$GLOBALS['TCA']['tt_content']['palettes']['image_settings']['showitem'] .= ', tx_tkcropthumbs_aspectratio';