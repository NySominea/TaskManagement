<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        $rules['project_title'] = 'required';
        $rules['project_desc'] = 'required';
        $rules['project_startdate'] = 'required|date';
        $rules['project_enddate'] = 'required|date';
        $rules['project_member'] = 'required';

        $rules['module.*.name'] = 'required';
        $rules['module.*.priority'] = 'required';
        $rules['module.*.startdate'] = 'required';
        $rules['module.*.enddate'] = 'required';

        $rules['task.*.*.name'] = 'required';
        $rules['task.*.*.developer'] = 'required';

        return $rules;
    }
}
