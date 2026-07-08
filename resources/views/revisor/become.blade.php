<x-layouts.app title="Diventa Revisore">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 my-5 mx-auto card-login rounded shadow p-5">
                <h1 class="text-secondary">Diventa Revisore</h1>
                <p class="lead">
                    Ti piacerebbe contribuire alla qualità degli annunci pubblicati su Presto.it?
                    Invia la tua richiesta e un amministratore la valuterà.
                </p>

                <form id="become-revisor-form" action="{{  route('revisor.becomeMail')  }}" method="POST" class="mt-5"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex flex-column gap-3">

                        <div>
                            <label for="why">Perchè vuoi diventare revisore?</label>
                            <textarea name="why" id="why" class="form-control"></textarea>
                            @error('why') <span class="text-danger small">{{ $message }}</span>@enderror
                        </div>

                        <div>
                            <label for="pastExperience">Esperienze e competenze</label>
                            <textarea name="pastExperience" id="pastExperience" class="form-control"></textarea>
                            @error('pastExperience') <span class="text-danger small">{{ $message }}</span>@enderror
                        </div>

                        <div>
                            <x-form-field type="file" label="Allega il tuo curriculum" name="curriculum"
                                          accept="application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document"/>
                            <p class="small opacity-50 ps-1">File PDF o Word, max 1MB</p>
                        </div>
                        <div class="mt-3">
                            <button type="submit" id="become-revisor-submit" class="btn btn-primary btn-orange-accedi">Invia richiesta</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
