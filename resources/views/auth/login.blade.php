
<x-layout title="Accedi">
    
    <div class="col-lg-6 my-5 mx-auto card-login rounded shadow p-5">
        <h1 class="text-titlegreen">Accedi</h1>

        <div class="mt-5">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="row gap-3">

                    <div class="col-12">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                        @error('email') <span class="text-danger small">{{$message}}</span>@enderror
                    </div>

                    <div class="col-12">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                        @error('password') <span class="text-danger small">{{$message}}</span>@enderror
                    </div>

                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-orange btn-orange-accedi">Accedi</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-layout>