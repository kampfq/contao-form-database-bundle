<?php

namespace Doublespark\FormDatabase\Hooks;

use Doublespark\FormDatabase\Models\FormDbModel;

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
        if(is_array($arrPost))
        {
            $objFormSubmission                 = new FormDbModel();
            $objFormSubmission->tstamp         = time();
            $objFormSubmission->submitted_date = time();
            $objFormSubmission->form_data      = json_encode($arrPost);
            $objFormSubmission->form_name      = $arrForm['title'];
            $objFormSubmission->save();
        }
    }
}