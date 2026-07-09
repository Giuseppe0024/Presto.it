<x-layouts.app title="Registrazione">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 my-5 mx-auto card-login rounded shadow p-5">
                <h1 class="text-secondary">Registrati</h1>
                <p class="lead">Inserisci i tuoi dati</p>

                <form action="{{ route('register') }}" method="POST" class="mt-5">
                    @csrf
                    <div class="d-flex flex-column gap-3">

                        <x-ui.form-field name="name" label="Nome"/>

                        <x-ui.form-field name="email" label="Email" type="email"/>

                        <x-ui.form-field name="password" label="Password" type="password"/>

                        <x-ui.form-field name="password_confirmation" label="Conferma Password" type="password" :show-error="false"/>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary btn-orange-accedi">Registrati</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
