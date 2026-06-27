    <div class="container mt-5 py-5 card-login rounded-5 stonegreen-color">
       
            <h1 class="m-4">Crea il tuo annuncio</h1>

            <x-success />

        <div class="row g-5 mx-3 mb-5">
            
            <!-- COLONNA SINISTRA -->
            <div class="col-12 col-md-6">

                <!-- titolo -->

                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo">

                <!-- categoria -->

                <label for="category" class="form-label mt-3">Categoria</label>
                <select class="form-select" id="category" name="category">
                    <option selected disabled>Seleziona una categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>


                <!-- descrizione -->

                <label for="description" class="form-label mt-3">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="5" placeholder="Inserisci la descrizione"></textarea>

                <label for="price" class="form-label mt-3">Prezzo</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Inserisci il prezzo">

                <label for="condition" class="form-label mt-3 ">Condizioni</label>
                <select class="form-select" id="condition" name="condition">
                    <option selected disabled>Seleziona una condizione</option>
                    <option>Nuovo con cartellino</option>
                    <option>Nuovo</option>
                    <option>Ottime</option>
                    <option>Buone</option>
                    <option>Accettabili</option>
                </select>
            </div>

            <!-- COLONNA DESTRA -->

            <!-- bisogna aggiungere pulsante DENTRO il div per caricare le immagini, devo capire come si fa e bisogna bloccare il div sennò si ingrandisce, PROBABILMENTE CON DROPZONE JS -->
             
            <div class="col-12 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <label for="image" class="form-label">Carica le immagini del tuo articolo</label>

                <div class="image-input-box d-block align-items-center justify-content-center">
                    <i class="fa-regular fa-images" style="font-size: 5rem;"></i>
                </div>

            

                <button type="submit" class="btn btn-orange mt-3">Pubblica</button>
            </div>



        </div>
    </div>
