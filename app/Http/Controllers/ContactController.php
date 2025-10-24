<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;

class ContactController extends Controller
{
	public function store(ContactFormRequest $request)
	{
		$validated = $request->validated();

		$contact = Contact::create($validated);

		\Mail::to('admin@example.com')->send(new ContactMail($contact));

		return response()->json(['message' => 'Форма успешно отправлена']);
	}

	public function showForm()
    {
        return view('contact');
    }
}
