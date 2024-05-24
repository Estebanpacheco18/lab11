<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function create(): View{
        return view('contacts.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'first_name' => 'required|regex:/^[\pL\s]+$/u|max:30',
            'last_name' => 'nullable|regex:/^[\pL\s]+$/u|max:30',
            'phone' => 'required|digits:9',
            'email' => 'nullable|email:strict'
        ]);

        $request->user()->contacts()->create($validated);

        return redirect(route('contacts.index'));
    }
    public function index(): View
      {
    $contacts = auth()->user()->contacts;

    return view('contacts.create', ['contacts' => $contacts]);
      }
}
