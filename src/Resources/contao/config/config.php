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

/**
 * Remove locale from URL
 */
$GLOBALS['TL_HOOKS']['processFormData'][] = ['Doublespark\FormDatabase\Hooks\FormDatabaseHooks', 'processFormData'];