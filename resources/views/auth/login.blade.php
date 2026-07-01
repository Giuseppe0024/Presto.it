<x-layouts.app title="Accedi">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 my-5 mx-auto card-login rounded shadow p-5">
                <h1 class="text-secondary">Accedi</h1>

                <form action="{{ route('login') }}" method="POST" class="mt-5">
                    @csrf
                    <div class="d-flex flex-column gap-3">

                        <x-form-field name="email" label="Email" type="email"/>

                        <x-form-field name="password" label="Password" type="password"/>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary btn-orange-accedi">Accedi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
