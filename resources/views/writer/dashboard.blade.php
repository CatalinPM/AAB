<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <h1>Benternato {{ Auth::user()->name }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                {{-- <x-revisor-table :article="$articles" /> --}}
            </div>
        </div>
    </div>
</x-layout>
