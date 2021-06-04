<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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

        // Store Rules

        if ($this->getMethod() == 'POST') {
            $rules += [
                'tmbd_id' => 'required',
                'tmbd_vote_average' => 'required',
                'language' => 'required',
                'title' => 'required',
                'image_url' => 'required',
                'release_date' => 'required',
                'status' => 'required|in:is_watched,in_wishlist',
            ];
        }

        // Update Rules

        if ($this->getMethod() == 'PUT') {
            $rules += [
                'id' => 'required',
                'rating' => 'required|in:yay,nay',
                'review' => 'max:128',
            ];
        }

        return $rules;
    }
}
