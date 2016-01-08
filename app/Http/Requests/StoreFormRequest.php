<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;


class StoreFormRequest extends Request
{

   protected $fields;


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      if($this->ajax()) {
        if($this->request->has('campaign_id') && $this->request->has('form_id')) {
          $campaign_id = $this->request->get('campaign_id');
          $form_id = $this->request->get('form_id');

          $campaign = \App\CampaignMaster::findOrFail($campaign_id);
          $form = $campaign->forms()->where('form_id', $form_id)->firstOrFail();
          $fields = $form->fields()->get(['field_key', 'datatype']);

          $db_fields = array_pluck($fields, 'datatype', 'field_key');
          $form_fields = $this->request->get('field_key');

          $field_datatype = $this->request->get('field_datatype');


          //Check if keys are tampered
          if(!$this->keys_are_equal($db_fields, $form_fields) || $db_fields !== $field_datatype) {
            return false;
          }

          return true;

        } else {
          return false;
        }

      } else {
        return false;
      }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules = [

        ];

        $field_key = $this->request->get('field_key');
        $field_datatype = $this->request->get('field_datatype');


        foreach($field_key as $key => $val)
        {
          // dd($field_datatype, $key);
          switch ( $field_datatype[$key] )
          {
            case 'text':
              $rules['field_key.'.$key] = 'required';
              break;
            case 'int':
              $rules['field_key.'.$key] = 'required|integer';
              break;
            case 'date':
              $rules['field_key.'.$key] = 'required|date_format:d/m/y';
              break;
          }
        }

        return $rules;
    }

    protected function keys_are_equal($array1, $array2) {
      return !array_diff_key($array1, $array2) && !array_diff_key($array2, $array1);
    }
}
