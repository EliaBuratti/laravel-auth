<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProjectRequest extends FormRequest
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
        return [

            /*             $table->id();
            $table->timestamps();
            $table->string('title', 100);
            $table->string('slug', 100)->default('');
            $table->text('description');
            $table->text('cover_image');
            $table->text('skills');
            $table->string('project_link', 255)->default(''); */

            'title' => ['required', 'min:3', Rule::unique('projects')->ignore($this->project),  'max:100'],
            'description' => 'required|min:3|max:5000',
            'cover_image' => 'required|image|max:600',
            'skills' => 'required|min:3|max:5000',
            'project_link' => 'required|url|max:255',
        ];
    }
}
