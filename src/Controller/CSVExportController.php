<?php

namespace NK\FormDatabase\Controller;


use NK\FormDatabase\Models\FormDbModel;
use League\Csv\Writer;


class CSVExportController extends \Backend
{


	public function exportCsvFunction(\Contao\DC_Table $dc)
	{

		$writer = Writer::createFromString();
		$formDataSets = FormDbModel::findBy('pid',$dc->id);

		$fileName = '';

		$csvBody=[];
		$csvHeader[];
		foreach($formDataSets as $dataSet){
			$data = json_decode($dataSet->form_data,true);
			$fileName = $dataSet -> form_name;
			$csvHeader=[];
			$outputSet = [];
			foreach ($data as $key => $value){
				if(!in_array($key, array $csvHeader){
					$csvHeader[] = $key;
				}
				if(is_array($value)){
					$cell = '';
					foreach($value as $v){
						$cell .= $v.' ';
					}
					$outputSet[$key] = $cell;
				} else {
					$outputSet[$key]=$value;
				}

			}
			$csvBody[]=$outputSet;
		}
		$writer->insertOne($csvHeader);
		$writer->insertAll($csvBody);
		$writer->output($fileName . '.csv');
		die;
	}


	public function checkVisibility($arrRow, $href, $label, $title, $icon, $attributes, $strTable, $arrRootIds, $arrChildRecordIds, $blnCircularReference, $strPrevious, $strNext)
	{
		$formDataSets = FormDbModel::findBy('pid',$arrRow["id"]);

		if($formDataSets){
			return '<a href="'.$this->addToUrl($href).'&amp;id='.$arrRow["id"].'" title="'.specialchars($title).'"'.$attributes.'>'.\Image::getHtml($icon, $label).'</a> ';

		} else {
			$icon = str_replace('.svg','_.gif',$icon);
			return \Image::getHtml($icon, $label);
		}

	}
}
