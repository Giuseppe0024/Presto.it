<x-layout title="Registrazione">
    <div class="col-lg-6 my-5 mx-auto card-login rounded shadow p-5">
        <h1 class="text-titlegreen">Diventa Revisore</h1>
        <p class="lead">Ti piacerebbe contribuire alla qualità degli annunci pubblicati su Presto.it?
        Invia la tua richiesta e un amministratore la valuterà.</p>
    

        <div class="mt-5">
            <form action="" method="POST">
                @csrf
                <div class="row gap-3">

                    <div class="col-12">
                        <label for="name">Nome</label>
                        <input type="text" name="name" id="name" class="form-control">
                        @error('name') <span class="text-danger small">{{$message}}</span>@enderror
                    </div>

                    <div class="col-12">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                        @error('email') <span class="text-danger small">{{$message}}</span>@enderror
                    </div>

                    <div class="col-12">
                        <label for="motivo">Perchè vuoi diventare revisore?</label>
                        <textarea name="motivo" id="motivo" class="form-control"></textarea>
                        @error('motivo') <span class="text-danger small">{{$message}}</span>@enderror
                    </div>

                    <div class="col-12">
                        <label for="esperienze">Esperienze e competenze</label>
                        <textarea name="esperienze" id="esperienze" class="form-control"></textarea>
                        @error('esperienze') <span class="text-danger small">{{$message}}</span>@enderror
                    </div>

                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-orange btn-orange-accedi">Invia richiesta</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-layout>