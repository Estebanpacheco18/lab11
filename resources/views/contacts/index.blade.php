<x-app-layout>
    <div class="max-w-lg mx-auto p-4 sm:p-6 lg:p-8">
        <div class="flex justify-center mt-3">
            <div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
                <div @click="open = ! open">
                    <div class="rounded-md ring-1 ring-black ring-opacity-5">
                    </div>
                    <x-secondary-button class="px-3 inline-flex items-center" onclick="location.href='{{ route('contacts.create') }}'">
                        <svg viewBox="0 0 20 16" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8">
                            <path d="M8 1a3 3 0 1 0 .002 6.002A3 3 0 0 0 8 1zM6.5 8A4.491 4.491 0 0 0 2 12.5v.5c0 1.11.89 2 2 2h6v-1H7v-4h3V8.027A4.243 4.243 0 0 0 9.5 8zM11 8v3H8v2h3v3h2v-3h3v-2h-3V8zm0 0" fill="#2e3436"/>
                        </svg>
                        Agregar Nuevo Contacto
                    </x-secondary-button>
                </div>
            </div>
        </div>
        @foreach ($contacts as $contact)
            <x-contact-card :contact="$contact" />
            <x-dropdown>
                <x-slot name="trigger">
                    <x-dropdown-link :href="route('contacts.edit', $contact)">
                        Editar
                    </x-dropdown-link>
                    <form method="POST" action="{{ route('contacts.destroy', $contact) }}">
                        @csrf
                        @method('delete')
                        <x-dropdown-link :href="route('contacts.destroy', $contact)" onclick="event.preventDefault(); this.closest('form').submit();">
                            Eliminar
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        @endforeach
    </div>
</x-app-layout>