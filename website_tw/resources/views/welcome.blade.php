
{{-- @extends('layouts.default')
@section('content')
    <article class="border border-dark bg-body-tertiary my-3 p-3 rounded">    

            <div class="row d-flex flex-row align-items-end g-3"> 

                <div class="col-12 col-md-8">
                    <h2 class="display-5"> Prueba </h2>
                </div>

                <div class="col-6 col-md-2">
                    <p> <strong> Autor: </strong> UGR </p>
                </div>
                <div class="col-6 col-md-2">
                    <p> <strong> Fecha: </strong> 19-03-2026 </p>
                </div>
            </div>

            <div class="row mt-2">

                <p> Organizada por la Asociación 
                    por la Memoria Histórica del Partido del
                    Trabajo de Andalucía y de la Joven Guardia Roja, 
                    con la colaboración del Decanato de la Facultad de 
                    Ciencias de la UGR, la Cátedra de Memoria Democrática 
                    de la Universidad de Almería y la Secretaría de Estado
                    de Memoria Democrática, la Facultad de 
                    Ciencias acoge la exposición homenaje a
                    Javier Verdejo en el 50º aniversario de su asesinato. </p>
                <p> La exposición “Verdejo y la lucha antifranquista en la
                    Universidad de Granada”, se inauguró este miércoles, 18 de 
                    marzo, en el vestíbulo de la Facultad de Ciencias, ofrece 
                    un recorrido por la figura de Javier Verdejo y el
                    contexto de la lucha por las libertades democráticas </p>
                
                <div class="text-center mt-2">
                    <figure class="figure">
                        <img
                            src ="./img/6113519191_6f229dd3ea_o.jpg"
                            alt = "Gatito tumbado" 
                            class = "figure-img img-fluid"
                            style = "max-width: 800px; width: 100%; height: auto;"
                            />
                            <figcaption class="figure-caption text-center text-decoration-underline"> A cat lying on the floor</figcaption>
                    </figure>
                </div>
            </div>

        </article>

        <article class="border border-dark bg-body-tertiary my-3 p-3 rounded">  
        
            <div class="row d-flex flex-row align-items-end g-3">

                <div class="col-12 col-md-8">
                    <h2 class="display-5"> Continúan las concentraciones altas de polen de ciprés y parietaria </h2>
                </div>

                <div class="col-6 col-md-2">
                    <p> <strong> Autor: </strong> UGR </p>
                </div>
                <div class="col-6 col-md-2">
                    <p> <strong> Fecha: </strong> 19-03-2026 </p>
                </div>
            </div>

            <div class="row mt-2">
                <p> La ciudad de Granada continua con concentraciones 
                    altas de polen de ciprés y parietaria; otras plantas
                    como gramíneas, plátanos de sombra y pinos han comenzado 
                    su floración. Las floraciones de inicio de primavera han 
                    comenzado su periodo al registrarse en el aire tipos polínicos
                    habituales en estas fechas como gramíneas, plátanos de sombra
                    y pinos. </p>
                <p> En relación a los plátanos de sombra, se espera que en los
                    próximos días se incrementen sus concentraciones de polen 
                    de forma significativa, estimándose que se alcanzarán niveles 
                    altos la próxima semana. En relación a los tipos polínicos de ciprés y parietaria, pese a mostrar una tendencia decreciente, sus niveles continúan siendo elevados.
                </p>
            </div>
        </article>
@endsection
--}}
@extends('layouts.default')

@section('content')
<div class="container-fluid">
    <section class="text-center py-5 mb-5 rounded-4 bg-light shadow-sm border border-primary-subtle">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <i class="bi bi-geo-alt-fill text-danger display-4 mb-3"></i>
                <h1 class="display-4 fw-bold">Gestión de Incidencias Granada</h1>
                <p class="lead text-muted">Haz de tu ciudad un lugar mejor. Reporta desperfectos en la vía pública de forma rápida y sencilla.</p>
                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center mt-4">
                    <a href="{{ route('login') }}" class="btn btn-gh-primary btn-lg px-4">
                        <i class="bi bi-megaphone me-2"></i>Nueva Incidencia
                    </a>
                    <a href="{{ route('lista_incidencias') }}" class="btn btn-outline-dark btn-lg px-4">
                        <i class="bi bi-search me-2"></i>Ver todas
                    </a>
                </div>
            </div>
        </div>
    </section>

        <div class="row mb-5 g-4 text-center">
        <div class="col-md-4">
            <div class="p-4 bg-white rounded-3 shadow-sm border-bottom border-primary border-4">
                <h2 class="fw-bold">{{ $resueltas }}</h2>
                <span class="text-muted text-uppercase small fw-semibold">Incidencias Resueltas</span>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-4 bg-white rounded-3 shadow-sm border-bottom border-warning border-4">
                <h2 class="fw-bold">{{ $proceso }}</h2>
                <span class="text-muted text-uppercase small fw-semibold">En Proceso</span>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-4 bg-white rounded-3 shadow-sm border-bottom border-info border-4">
                <h2 class="fw-bold">{{ $total }}</h2>
                <span class="text-muted text-uppercase small fw-semibold">Total Reportadas</span>
            </div>
        </div>
    </div>

    <div class="row align-items-center py-4">
        <div class="col-md-6">
            <h3 class="fw-bold mb-4">¿Cómo funciona el servicio?</h3>
            <ul class="list-unstyled">
                <li class="mb-3 d-flex align-items-start">
                    <i class="bi bi-1-circle-fill text-primary fs-4 me-3"></i>
                    <div>
                        <strong>Identifica el problema:</strong> Localiza la incidencia y toma una fotografía descriptiva.
                    </div>
                </li>
                <li class="mb-3 d-flex align-items-start">
                    <i class="bi bi-2-circle-fill text-primary fs-4 me-3"></i>
                    <div>
                        <strong>Envía el reporte:</strong> Usa nuestro formulario para enviarnos la ubicación y el detalle técnico.
                    </div>
                </li>
                <li class="mb-3 d-flex align-items-start">
                    <i class="bi bi-3-circle-fill text-primary fs-4 me-3"></i>
                    <div>
                        <strong>Seguimiento:</strong> Recibirás actualizaciones sobre el estado de la reparación en tiempo real.
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-md-6 text-center">
            <div class="p-5 bg-secondary-subtle rounded-5">
                <i class="bi bi-map display-1 text-secondary"></i>
                <p class="mt-3 text-secondary italic">Plataforma de mantenimiento urbano participativo</p>
            </div>
        </div>
    </div>
</div>
@endsection