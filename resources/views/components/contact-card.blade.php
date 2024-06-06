<div class="p-4 bg-white shadow rounded-lg">
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-xl font-semibold text-gray-800">{{ $contact->first_name }} {{ $contact->last_name }}</h2>
            <p class="text-gray-600">{{ $contact->phone }}</p>
            <p class="text-gray-600">{{ $contact->address }}</p>
            <p class="text-gray-600">{{ $contact->phone_number }}</p>
            <p class="text-gray-600">{{ $contact->birthday }}</p>
            <p class="text-gray-600">{{ $contact->company }}</p>
            <p class="text-gray-600">{{ $contact->position }}</p>
        </div>
        <div>
        <img src="{{ asset('storage/' . $contact->profile_photo) }}" alt="Foto de perfil">
        </div>
    </div>
</div>