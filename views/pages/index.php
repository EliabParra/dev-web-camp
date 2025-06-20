<?php
    include_once __DIR__ . '../../pages/conferencias.php';
?>

<section class="resumen">
    <div class="resumen__grid">
        <div class="resumen__bloque">
            <p class="resumen__text resumen__text--numero"><?= $ponentes_total ?></p>
            <p class="resumen__text">Speakers</p>
        </div>

        <div class="resumen__bloque">
            <p class="resumen__text resumen__text--numero"><?= $conferencias_total ?></p>
            <p class="resumen__text">Conferencias</p>
        </div>

        <div class="resumen__bloque">
            <p class="resumen__text resumen__text--numero"><?= $workshops_total ?></p>
            <p class="resumen__text">Workshops</p>
        </div>

        <div class="resumen__bloque">
            <p class="resumen__text resumen__text--numero">500</p>
            <p class="resumen__text">Asistentes</p>
        </div>
    </div>
</section>

<section class="speakers">
    <h2 class="speakers__heading">Speakers</h2>
    <p class="speakers__subtitle">Conoce a nuestros expertos de DevWebCamp</p>

    <div class="speakers__grid">
        <?php foreach($ponentes as $ponente) { ?>
            <div class="speaker">
                <picture>
                    <source srcset="<?= $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen ?>.webp" type="image/webp">
                    <source srcset="<?= $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen ?>.png" type="image/png">
                    <img class="speaker__img" loading="lazy" width="200" height="300" src="<?= $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen ?>.png" alt="Imagen Actual">
                </picture>
    
                <div class="speaker__info">
                    <h4 class="speaker__nombre"><?= $ponente->nombre . ' ' . $ponente->apellido ?></h4>
                    <p class="speaker__ubicacion"><?= $ponente->ciudad . ', ' . $ponente->pais ?></p>
    
                    <nav class="speaker-social">
                        <?php $redes = json_decode($ponente->redes) ?>
    
                        <?php if (!empty($redes->facebook)) { ?>
                            <a class="speaker-social__link" rel="noopener noreferrer" target="_blank" href="<?= $redes->facebook ?>">
                                <span class="speaker-social__ocultar">Facebook</span>
                            </a>
                        <?php } ?>
    
                        <?php if (!empty($redes->twitter)) { ?>
                            <a class="speaker-social__link" rel="noopener noreferrer" target="_blank" href="<?= $redes->twitter ?>">
                                <span class="speaker-social__ocultar">Twitter</span>
                            </a>
                        <?php } ?>
    
                        <?php if (!empty($redes->youtube)) { ?>
                            <a class="speaker-social__link" rel="noopener noreferrer" target="_blank" href="<?= $redes->youtube ?>">
                                <span class="speaker-social__ocultar">YouTube</span>
                            </a>
                        <?php } ?>
    
                        <?php if (!empty($redes->instagram)) { ?>
                            <a class="speaker-social__link" rel="noopener noreferrer" target="_blank" href="<?= $redes->instagram ?>">
                                <span class="speaker-social__ocultar">Instagram</span>
                            </a>
                        <?php } ?>
    
                        <?php if (!empty($redes->tiktok)) { ?>
                            <a class="speaker-social__link" rel="noopener noreferrer" target="_blank" href="<?= $redes->tiktok ?>">
                                <span class="speaker-social__ocultar">Tiktok</span>
                            </a>
                        <?php } ?>
    
                        <?php if (!empty($redes->github)) { ?>
                            <a class="speaker-social__link" rel="noopener noreferrer" target="_blank" href="<?= $redes->github ?>">
                                <span class="speaker-social__ocultar">GitHub</span>
                            </a>
                        <?php } ?>
                    </nav>
    
                    <ul class="speaker__listado-skills">
                        <?php 
                            $tags = explode(',', $ponente->tags); 
                            foreach($tags as $tag) { ?>
                                <li class="speaker__skill"><?= $tag ?></li>
                            <?php }?>
                    </ul>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<div id="map" class="map"></div>

<section class="boletos">
    <h2 class="boletos__heading">Boletos & Precios</h2>
    <p class="boletos__subtitle">Precios para DevWebCamp</p>

    <div class="boletos__grid">
        <div class="boleto boleto--presencial">
            <h4 class="boleto__logo">&#60;DevWebCamp /></h4>
            <p class="boleto__plan">Presencial</p>
            <p class="boleto__precio">$199</p>
        </div>

        <div class="boleto boleto--virtual">
            <h4 class="boleto__logo">&#60;DevWebCamp /></h4>
            <p class="boleto__plan">Virtual</p>
            <p class="boleto__precio">$49</p>
        </div>

        <div class="boleto boleto--gratis">
            <h4 class="boleto__logo">&#60;DevWebCamp /></h4>
            <p class="boleto__plan">Gratis</p>
            <p class="boleto__precio">Gratis - $0</p>
        </div>
    </div>

    <div class="boleto__link-container">
        <a href="/paquetes" class="boleto__link">Ver Paquetes</a>
    </div>
</section>