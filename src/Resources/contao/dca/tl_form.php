<?php

$GLOBALS['TL_DCA']['tl_form']['palettes']['default'] = str_replace
(
	'storeValues',
	'storeValues,csvExport',
	$GLOBALS['TL_DCA']['tl_form']['palettes']['default']
);

$GLOBALS['TL_DCA']['tl_form']['fields']['csvExport'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form']['csvExport'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_form']['list']['operations']['export'] = array
(
	'href'                => 'key=export_csv',
	'icon'                => 'theme_export.svg',
	'button_callback'     => array('NK\FormDatabase\Controller\CSVExportController', 'checkVisibility')
);


?>