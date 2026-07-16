<x-layouts.app title="Accedi">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 my-5 mx-auto card-login rounded shadow p-5">
                <h1 class="text-secondary">{{ __('ui.Login') }}</h1>

                <form action="{{ route('login') }}" method="POST" class="mt-5">
                    @csrf
                    <div class="d-flex flex-column gap-3">

                        <x-ui.form-field name="email" label="{{ __('ui.Email') }}" type="email"/>

                        <x-ui.form-field name="password" label="{{ __('ui.Password') }}" type="password"/>

                        <div class="mt-3 d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary btn-orange-accedi">{{ __('ui.Login') }}</button>
                            <p class="m-0">{{ __('ui.DontHaveAccount') }} <a href="{{route('register')}}">{{ __('ui.Register') }}</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
