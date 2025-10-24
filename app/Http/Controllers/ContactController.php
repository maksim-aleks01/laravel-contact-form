<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
	public function store(Request $request)
	{
		$validated = $request->validate([
			'name' => 'required|string|max:255',
			'phone' => 'required|regex:/^\+7 \d{3} \d{3} \d{2} \d{2}$/',
			'email' => 'required|email',

		]);

		$contact = Contact::create($validated);

		return response()->json(['message' => 'Форма успешно отправлена']);
	}

	public function showForm()
    {
        return view('contact');  // Верните ваш шаблон с формой
    }
}
