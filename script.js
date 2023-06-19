let serieA = document.querySelector("#serieA");
let coppaIta = document.querySelector("#coppaIta");
let supercoppa = document.querySelector("#supercoppaIta");
let europa = document.querySelector("#Europaligue");
let ldc = document.querySelector("#ldc");
let WC = document.querySelector("#WCclub");

function defaultHeight() {
    serieA.style.height = "35px";
    coppaIta.style.height = "35px";
    supercoppa.style.height = "35px";
    europa.style.height = "35px";
    ldc.style.height = "35px";
    WC.style.height = "35px";
}
defaultHeight();

function affichagePalmares(element) {
    if (element.style.height == '35px') {
        element.style.height = 'fit-content';
    } else {
        element.style.height = '35px';
    }
}

let victoireSerieA = ['1905', '1925/1926', '1930/1931', '1931/1932', '1932/1933', '1933/1934', '1934/1935', '1949/1950', '1951/1952', '1957/1958', '1959/1960', '1960/1961', '1966/1967', '1971/1972', '1972/1973', '1974/1975', '1976/1977', '1977/1978', '1980/1981', '1981/1982', '1983/1984', '1985/1986', '1994/1995', '1996/1997', '1997/1998', '2001/2002', '2002/2003', '2011/2012', '2012/2013', '2013/2014', '2014/2015', '2015/2016', '2016/2017', '2017/2018', '2018/2019', '2019/2020'];

serieA.addEventListener('click', function () {
    let p = document.createElement('p');
    p.setAttribute('id', 'victoireSerieA');
    if (!document.querySelector('#victoireSerieA')) {
        p.textContent = victoireSerieA.join(', ');
        serieA.appendChild(p);

    } else {
        document.querySelector("#" + p.getAttribute('id')).remove();
    }
    affichagePalmares(serieA);
});

let victoireCoppaIta = " 1937/1938, 1941/1942, 1958/1959, 1959/1960, 1964/1965, 1978/1979, 1982/1983, 1989/1990, 1994/1995, 2014/2015, 2015/2016, 2016/2017, 2017/2018, 2020/2021"
coppaIta.addEventListener('click', function () {
    let p = document.createElement('p');
    p.setAttribute('id', 'victoireCoppaIta');
    if (!document.querySelector('#victoireCoppaIta')) {
        p.textContent = victoireCoppaIta;
        coppaIta.appendChild(p);

    } else {
        document.querySelector("#" + p.getAttribute('id')).remove();
    }
    affichagePalmares(coppaIta);
});

let victoireSupercoppa = "1995/1996, 1997/1998, 2002/2003, 2003/2004, 2012/2013, 2013/2014, 2015/2016, 2018/2019, 2020/2021"
supercoppa.addEventListener('click', function () {
    let p = document.createElement('p');
    p.setAttribute('id', 'victoireSupercoppa');
    if (!document.querySelector('#victoireSupercoppa')) {
        p.textContent = victoireSupercoppa;
        supercoppa.appendChild(p);

    } else {
        document.querySelector("#" + p.getAttribute('id')).remove();
    }
    affichagePalmares(supercoppa);
});
let victoireEuropa = "1976/1977, 1989/1990, 1992/1993";
europa.addEventListener('click', function () {
    let p = document.createElement('p');
    p.setAttribute('id', 'victoireEuropa');
    if (!document.querySelector('#victoireEuropa')) {
        p.textContent = victoireEuropa;
        europa.appendChild(p);

    } else {
        document.querySelector("#" + p.getAttribute('id')).remove();
    }
    affichagePalmares(europa);
});

let victoireLdc = "1984/1985, 1995/1996"
ldc.addEventListener('click', function () {
    let p = document.createElement('p');
    p.setAttribute('id', 'victoireLdc');
    if (!document.querySelector('#victoireLdc')) {
        p.textContent = victoireLdc;
        ldc.appendChild(p);

    } else {
        document.querySelector("#" + p.getAttribute('id')).remove();
    }
    affichagePalmares(ldc);
});

let victoireWC = "1984/1985, 1996/1997";

WC.addEventListener('click', function () {
    let p = document.createElement('p');
    p.setAttribute('id', 'victoireWC');
    if (!document.querySelector('#victoireWC')) {
        p.textContent = victoireWC;
        WC.appendChild(p);

    } else {
        document.querySelector("#" + p.getAttribute('id')).remove();
    }
    affichagePalmares(WC);
});



function afficherEquipe() {
    fetch('equipe.json')
        .then(response => response.json())
        .then(data => {
            let divEquipe = document.createElement('div');
            divEquipe.className = 'container-equipe';
            let palmares = document.querySelector('.Palmares');
            palmares.appendChild(divEquipe);

            let logoEquipe = document.createElement('img');
            logoEquipe.setAttribute('class', 'img-ekp');
            logoEquipe.src = data.team.logo;
            divEquipe.appendChild(logoEquipe);
            console.log(logoEquipe);

            let nomEquipe = document.createElement('h4');
            nomEquipe.textContent = `Nom : ${data.team.name} `
            nomEquipe.setAttribute('class', 'h4-dom');
            divEquipe.appendChild(nomEquipe);
            console.log(nomEquipe);

            let paysEquipe = document.createElement('p');
            paysEquipe.textContent = `Pays : ${data.team.country}`;
            paysEquipe.setAttribute('class', 'p-dom');
            nomEquipe.appendChild(paysEquipe);

            let stadeEquipe = document.createElement('p');
            stadeEquipe.textContent = `Stade: ${data.venue.name}`;
            stadeEquipe.setAttribute('class', 'p-dom');
            paysEquipe.appendChild(stadeEquipe);

            let capaciteStade = document.createElement('p');
            capaciteStade.textContent = `Capacité Maximum : ${data.venue.capacity}`;
            capaciteStade.setAttribute('class', 'p-dom');
            stadeEquipe.appendChild(capaciteStade);

            /* let imgStade = document.createElement('img');
             imgStade.src = data.venue.image ;
             imgStade.setAttribute('id' , 'imgstade');
             capaciteStade.appendChild(imgStade); 
  */
            /* document.body.appendChild(divEquipe); */
        })
}
afficherEquipe();



function afficherStats() {
    fetch('stats.json')
        .then(response => response.json())
        .then(data => {
            let divStat = document.createElement('div');
            divStat.className = 'stats-container';
            divStat.style.marginBottom = '70px';
            let palmares = document.querySelector('.Palmares');
            palmares.appendChild(divStat);

            let form = document.createElement('h4');
            form.textContent = `Forme Actuelle : ${data.form}`;
            form.setAttribute("class", "p-stats");
            divStat.appendChild(form);

            let matchjouer = document.createElement('h4');
            matchjouer.textContent = `Match jouées : ${data.fixtures.played.total}`;
            matchjouer.setAttribute("class", "p-stats");
            divStat.appendChild(matchjouer);

            let wins = document.createElement('h4');
            wins.textContent = `Victoires : ${data.fixtures.wins.total}`;
            wins.setAttribute("class", "p-stats");
            divStat.appendChild(wins);

            let draws = document.createElement('h4');
            draws.textContent = `Matchs Nuls : ${data.fixtures.draws.total}`;
            draws.setAttribute("class", "p-stats");
            divStat.appendChild(draws);

            let loses = document.createElement('h4');
            loses.textContent = `Defaites : ${data.fixtures.loses.total}`;
            loses.setAttribute("class", "p-stats");
            divStat.appendChild(loses);
            // ajouter section plus de stats pour voir les autres stats
        })
}

afficherStats();



function createDom(data) {
    let divJoueur = document.createElement("div")
    let palmares = document.querySelector('.Palmares');
    divJoueur.className = 'joueur-container';
    palmares.appendChild(divJoueur);

    let joueurCard = document.createElement('div');
    joueurCard.setAttribute('class', 'joueurCard');
    divJoueur.appendChild(joueurCard);

    let photo = document.createElement('img');
    photo.setAttribute('class', 'img-joueurs');
    photo.src = data.player.photo;
    joueurCard.appendChild(photo);

    let jName = document.createElement("h4");
    jName.setAttribute('class', 'p-joueurs');
    jName.textContent = `Nom : ${data.player.name}`;
    joueurCard.appendChild(jName);

    let age = document.createElement('h4');
    age.setAttribute('class', 'p-joueurs');
    age.textContent = `Age : ${data.player.age}`;
    joueurCard.appendChild(age);

    let nationalite = document.createElement('h4');
    nationalite.setAttribute('class', 'p-joueurs');
    nationalite.textContent = `Pays : ${data.player.nationality}`
    joueurCard.appendChild(nationalite);

    let poids = document.createElement('h4');
    poids.setAttribute('class', 'p-joueurs');
    poids.textContent = `Poid : ${data.player.weight}`;
    joueurCard.appendChild(poids);
}


function afficherJoueurs() {
    fetch('joueurs.json')
        .then(response => response.json())
        .then(data => {
            for (i = 0; i < data.length; i++) {
                createDom(data[i]);
            }
        })
}
afficherJoueurs();

async function ajouterPanier(idArticle) {

    var formData = new FormData();

    formData.append('ajouterPanier', 1);
    formData.append('idShop', idArticle);

    await fetch("./panier.php", {
        method: "POST",
        body: formData
    })
    .then((response) => response.json())
    .then((result) => {
        document.getElementById("icon").className = "";
        document.getElementById("icon").className = result.icon + " stats-icon color";
        document.getElementById("data").innerText = result.data;
        document.getElementById("text").innerText = result.text;
        var colors = document.getElementsByClassName('color');
        for (var i = 0; i < colors.length; i++) {
            colors[i].style.color = result.color;
        }
    });
}