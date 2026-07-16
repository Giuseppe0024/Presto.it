<x-layouts.app title="Registrazione">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 my-5 mx-auto card-login rounded shadow p-5">
                <h1 class="text-secondary">{{ __('ui.Register') }}</h1>
                <p class="lead">{{ __('ui.EnterYourDetails') }}</p>

                <form action="{{ route('register') }}" method="POST" class="mt-5">
                    @csrf
                    <div class="d-flex flex-column gap-3">

                        <x-ui.form-field name="name" label="{{ __('ui.Name') }}"/>

                        <x-ui.form-field name="email" label="{{ __('ui.Email') }}" type="email"/>

                        <x-ui.form-field name="password" label="{{ __('ui.Password') }}" type="password"/>

                        <x-ui.form-field name="password_confirmation" label="{{ __('ui.ConfirmPassword') }}" type="password" :show-error="false"/>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary btn-orange-accedi">{{ __('ui.Register') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
