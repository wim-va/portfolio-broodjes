function voegBestellijnToe() {
    let tabel = document.getElementById("broodjes");
    let rij = document.getElementById("broodje1");
    let aantal = ++extra.dataset.aantal;
    let clone = rij.cloneNode(true);
    let string = rij.attributes.id.value;
    naam = string.substr(0, string.length - 1);
    clone.setAttribute("id", naam + aantal);
    for (let i = 0; i < clone.childElementCount; i++) {
        // for (let y = 0;)
        let string = clone.children[i].children[0].name;
        let naam = string.substr(0, string.length - 1);
        clone.children[i].children[0].setAttribute("name", naam + aantal);
        clone.children[i].children[0].setAttribute("id", naam + aantal);
    }
    tabel.append(clone);
    extra.dataset.aantal = aantal;
}

function optellen() {
    let aantal = extra.dataset.aantal;
    for (let i = 1; i <= aantal; i++) {
        let beleg = document.getElementById("beleg" + i);
        let formaat = document.getElementById("formaat" + i);
        let saus = document.getElementById("saus" + i);
        let brood = document.getElementById("brood" + i);
        let totaal = document.getElementById("totaalprijs" + i);
        let som =
            parseFloat(beleg[beleg.selectedIndex].dataset.prijs) +
            parseFloat(formaat[formaat.selectedIndex].dataset.prijs) +
            parseFloat(saus[saus.selectedIndex].dataset.prijs) +
            parseFloat(brood[brood.selectedIndex].dataset.prijs);
        totaal.setAttribute("value", "€ ".concat(som.toFixed(2)));
    }
}