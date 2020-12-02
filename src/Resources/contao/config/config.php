<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Backend modules
 */
array_insert($GLOBALS['BE_MOD']['system'], 1, array
(
    'form_submissions' => array
    (
        'tables' => array('tl_form_db')
    )
));


$GLOBALS['TL_MODELS'] = array
(
	'tl_form_db'        => 'NK\FormDatabase\Models\FormDbModel',
);

/**
 * Remove locale from URL
 */
$GLOBALS['TL_HOOKS']['processFormData'][] = ['NK\FormDatabase\Hooks\FormDatabaseHooks', 'processFormData'];

$GLOBALS['BE_MOD']['content']['form']['export_csv'] = array('NK\FormDatabase\Controller\CSVExportController', 'exportCsvFunction');

$GLOBALS['TL_PERMISSIONS'][] = 'form-csv-export';
