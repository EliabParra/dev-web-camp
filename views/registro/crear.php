<main class="registro">
    <h2 class="registro__heading"><?= $titulo ?></h2>
    <p class="registro__subtitle">Elige tu plan</p>

    <div class="paquetes__grid">
        <div class="paquete">
            <h3 class="paquete__nombre">Pase Gratis</h3>
            <ul class="paquete__beneficios">
                <li class="paquete__incluye">Acceso Virtual a DevWebCamp</li>
            </ul>
            <p class="paquete__precio">$0</p>

            <form action="/finalizar-registro/gratis" method="POST">
                <input type="submit" value="Inscripción Gratis" class="paquetes__submit">
            </form>
        </div>
        <div class="paquete">
            <h3 class="paquete__nombre">Pase Presencial</h3>
            <ul class="paquete__beneficios">
                <li class="paquete__incluye">Acceso Presencial a DevWebCamp</li>
                <li class="paquete__incluye">Pase por 2 días</li>
                <li class="paquete__incluye">Acceso a Talleres y Conferencias</li>
                <li class="paquete__incluye">Acceso a las Grabaciones</li>
                <li class="paquete__incluye">Camisa del Evento</li>
                <li class="paquete__incluye">Comida y Bebida</li>
            </ul>
            <p class="paquete__precio">$199</p>
        </div>
        <div class="paquete">
            <h3 class="paquete__nombre">Pase Virtual</h3>
            <ul class="paquete__beneficios">
                <li class="paquete__incluye">Acceso Virtual a DevWebCamp</li>
                <li class="paquete__incluye">Pase por 2 días</li>
                <li class="paquete__incluye">Acceso a Talleres y Conferencias</li>
                <li class="paquete__incluye">Acceso a las Grabaciones</li>
            </ul>
            <p class="paquete__precio">$49</p>
        </div>
    </div>
</main>