<?php declare(strict_types=1);

namespace App\Http\Requests\Orders;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() : mixed
    {
        return [
            'user_name' => ['required', 'string', 'min: 3', 'max: 50'],
            'phone' => ['required', 'integer'],
            'email' => ['required', 'email:rfc,dns'],
            'news_id' => ['required', 'integer'],
        ];
    }
}
