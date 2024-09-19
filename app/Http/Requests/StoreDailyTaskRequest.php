<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDailyTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $tasks = range(0, 6); // Assuming you have 7 task sets in your form

    $rules = [];

    foreach ($tasks as $task) {

        $rules["project.$task"] = ['nullable', 'string'];
        $rules["feature.$task"] = ['nullable', 'string'];
        $rules["time_taken.$task"] = ['nullable', 'string'];
        $rules["day.$task"] = ['nullable', 'date'];
        $rules["description.$task"] = ['nullable', 'string'];

        // At least one of the fields should be required if any one of them is filled
        $rules["project.$task"][] = 'required_with:feature.' . $task . ',time_taken.' . $task . ',description.' . $task .',day.' ;
        $rules["feature.$task"][] = 'required_with:project.' . $task . ',time_taken.' . $task . ',description.' . $task .',day.';
        $rules["date.$task"][]       = 'required_with:project.' . $task . ',time_taken.' . $task . ',description.' . $task .',day.';
        $rules["time_taken.$task"][] = 'required_with:project.' . $task . ',feature.' . $task . ',description.' . $task .',day.';
        $rules["description.$task"][] = 'required_with:project.' . $task . ',feature.' . $task . ',time_taken.' . $task .',day.';
    }

    return $rules;
    }
}
