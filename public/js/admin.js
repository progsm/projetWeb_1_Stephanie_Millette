// confirmation suppression utilisateur
let tableauBts = document.querySelectorAll(".bt-supprimer-confirm")

for (let bt of tableauBts) {
    bt.addEventListener("click", e => {
        e.preventDefault()
        let confirme = window.confirm("Êtes-vous certain que vous voulez supprimer cet utilisateur?")
        if (confirme) {
            window.location.href = e.target.getAttribute("href")
        }
    })
}

// confirmation suppression utilisateur
let tabBts = document.querySelectorAll(".bt-supprimer-episode-confirm")

for (let bt of tabBts) {
    bt.addEventListener("click", e => {
        e.preventDefault()
        let confirme = window.confirm("Êtes-vous certain que vous voulez supprimer cet épisode?")
        if (confirme) {
            window.location.href = e.target.getAttribute("href")
        }
    })
}