const $ = $ => document.querySelector($)
const $$ = $$ => document.querySelectorAll($$)

if ($('#map')) {
    const lat = 10.6489534
    const lng = -71.5958892
    const zoom = 16

    const map = L.map('map').setView([lat, lng], zoom)

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution:
            '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map)

    L.marker([lat, lng])
        .addTo(map)
        .bindPopup(`
            <h2 class="map__heading">DevWebCamp</h2>
            <p class="map__text">
                Universidad Rafael Urdaneta
            </p>
        `)
        .openPopup()

}