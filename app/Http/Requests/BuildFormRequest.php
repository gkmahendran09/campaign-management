<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Auth;

class BuildFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::check() && $this->ajax()) {
          if($this->request->has('field_name') && $this->request->has('field_datatype')) {
            $field_name = $this->request->get('field_name');
            $field_datatype = $this->request->get('field_datatype');

            if(!$this->keys_are_equal($field_name, $field_datatype)) {
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
            'form_name' => 'required|unique:campaign_forms,form_title,NULL,form_id,campaign_id,'. $this->segment(3)
        ];

        $field_name = $this->request->get('field_name');

        foreach($field_name as $key => $val)
        {
          $rules['field_name.'.$key] = 'required';
          $rules['field_datatype.'.$key] = 'required|in:text,int,date';
        }

        return $rules;
    }

    protected function keys_are_equal($array1, $array2) {
      return !array_diff_key($array1, $array2) && !array_diff_key($array2, $array1);
    }
}
