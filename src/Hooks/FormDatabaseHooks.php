<?php

namespace NK\FormDatabase\Hooks;

use NK\FormDatabase\Models\FormDbModel;

class FormDatabaseHooks
{
    /**
     * When a form is submitted
     * @param $arrPost
     * @param $arrForm
     * @param $arrFiles
     */
    public function processFormData($arrPost, $arrForm, $arrFiles)
    {
		if(!$arrForm['csvExport']){
			return;
		}

        if(is_array($arrPost))
        {
            $objFormSubmission                 = new FormDbModel();
            $objFormSubmission->tstamp         = time();
            $objFormSubmission->submitted_date = time();
            $objFormSubmission->form_data      = json_encode($arrPost);
            $objFormSubmission->form_name      = $arrForm['title'];
			$objFormSubmission->pid        = $arrForm['id'];
			$objFormSubmission->save();
        }
    }
}