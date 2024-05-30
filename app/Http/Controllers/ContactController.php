<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

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
    public function index()
        {
        $contacts = Contact::all();
           return view('contacts.index', ['contacts' => $contacts]);
        }

      public function edit(Contact $contact): View
      {
        if (Auth::id() !== $contact->user_id) {
            abort(403, 'No tienes permiso para editar este contacto.');
        }
          return view('contacts.edit', [
              'contact' =>$contact,
          ]);
      }
      public function update(Request $request, Contact $contact): RedirectResponse
      {
        if (Auth::id() !== $contact->user_id) {
            abort(403, 'No tienes permiso para actualizar este contacto.');
        }
          $validated = $request->validate([
              'first_name' => 'required|regex:/^[\pL\s]+$/u|max:30',
              'last_name' => 'nullable|regex:/^[\pL\s]+$/u|max:30',
              'phone' => 'required|digits:9',
              'email' => 'nullable|email:strict'
          ]);
  
          $contact->update($validated);
  
          return redirect(route('contacts.index'));
      }
      public function destroy(Contact $contact): RedirectResponse
      {
        if (Auth::id() !== $contact->user_id) {
            abort(403, 'No tienes permiso para actualizar este contacto.');
        }
          $contact->delete();
  
          return redirect(route('contacts.index'));
      }
  
  
}
