@section('title')
Buscar cédulas
@endsection

@section('meta-description')
Las especies del jardín: Información sobre las especies del Jardín Etnobiológico de Oaxaca
@endsection

@section('banner')
banner-colaboradores
@endsection

@section('banner-title')
Buscar cédulas
@endsection

<div>
    <section class="colaboradores pt-4">
        <div class="container px-4 py-5">
            <h2 class="subtitulo">Buscar información</h2>

            <!-- ------------ Formulario de búsqueda -------------------------- -->
            <div class="row">
                <div class="col-sm-12 col-md-3 form-group">
                    <label class="form-label">Buscar: </label>
                    <input wire:model.live="buscaText" type="text" class="form-control">
                    @error('buscaText')<error>{{ $message }}</error>@enderror
                </div>

                <div class="col-sm-12 col-md-3 form-group">
                    <label class="form-label">Jardín:</label>
                    <select wire:model.live="buscaJardin" class="form-select">
                        <option value="%"> Todos</option>
                        @foreach ($jardines as $i)
                            <option value="{{ $i->ced_cjarsiglas }}"> {{ $i->cjar_nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-12 col-md-3 form-group">
                    <label class="form-label">Lengua:</label>
                    <select wire:model.live="buscaLengua" class="form-select">
                        <option value="%"> Todas</option>
                        @foreach ($lenguas as $i)
                            <option value="{{ $i->ced_clencode }}"> {{ $i->clen_lengua }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row py-4">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Cédula</th>
                            <th>Jardín &nbsp; &nbsp; Lengua</th>
                            <th>Palabras</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cedulas as $i)
                            <tr>
                                <td>
                                    <span wire:click="CambiaLengua({{ $i->ced_id }})" class="PaClick">
                                        <b>{{ $i->url_nombre }}</b>
                                    </span>
                                </td>
                                <td>
                                    {{ $i->ced_cjarsiglas }}
                                    &nbsp; &nbsp;
                                    {{ $i->clen_lengua }}
                                </td>
                                <td style="font-size: 80%;">
                                    @if($i->url_nombrecomun !='')
                                        {{ $i->url_nombrecomun }},
                                    @endif

                                    @if($i->url_sciname != '')
                                        {{ $i->url_sciname }},
                                    @endif

                                    @if($i->url_palabras != '')
                                        {{ $i->url_palabras }}
                                    @endif
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</div>
