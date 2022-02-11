const contenu = document.querySelector('.content');
const nameInput = document.querySelector('#name');
const addressInput = document.querySelector('#address');
const cityInput = document.querySelector('#city');
const monBouton1 = document.querySelector('.monBouton1')

monBouton1.addEventListener('click', ()=>{
    envoiRestaurant(nameInput.value, addressInput.value, cityInput.value)
})

function afficheTout(){
    let urlRestaurants = "http://localhost/hb_php/frameworkdebase/?type=restaurant&action=index"

    fetch(urlRestaurants)
        .then((reponse)=>reponse.json())
        .then((restaurants)=>{
            console.log(restaurants)
            
            contenu.innerHTML = ""
             restaurants.forEach(restaurant => {
                
                templateRestaurant =
                    `
                <div>
                    <hr>
                        <h2>Nom du restaurant : ${restaurant.name}</h2>
                        <h2>Adresse du restaurant : ${restaurant.address}</h2>
                        <h2>Ville du restaurant : ${restaurant.city}</h2>
                        <button id="${restaurant.id}" class="btn btn-danger boutonSuppression"><strong>Supprimer</strong></button>
                    <hr>
                </div>
            `               
                contenu.innerHTML += templateRestaurant
            })
     
            document.querySelectorAll(".boutonSuppression").forEach((bouton) => {bouton.addEventListener("click", () => { supprimerRestaurant(bouton.id);                                         
            });              
        })      
    })
}

function envoiRestaurant(nameRestaurant, addressRestaurant, cityRestaurant){
    let url = "http://localhost/hb_php/frameworkdebase/?type=restaurant&action=new"

   let bodyRequete = {
        name:nameRestaurant,
        address:addressRestaurant,
        city:cityRestaurant,
    }
   let requete = {
       method: "POST",
       headers : {
           "Content-Type" : "application/json"
       },
       body : JSON.stringify(bodyRequete)
   }
    fetch(url, requete)
        .then(reponse=>reponse.json()).then(donnees =>{
                    console.log(donnees)

                        afficheTout()
                            nameInput.value = ""
                            addressInput.value = ""
                            cityInput.value = ""
                            } )       
}

function supprimerRestaurant(id){

    let url = "http://localhost/hb_php/frameworkdebase/?type=restaurant&action=suppr"

    let bodyRequete = {
        id:id
    }
    let requete = {
        method: "DELETE",
        headers : {
            "Content-Type" : "application/json"
        },
        body : JSON.stringify(bodyRequete)
    }
    fetch(url, requete)
        .then(reponse=>reponse.json())
        .then(donnees => {
        console.log(donnees)
        afficheTout()
    })
}


afficheTout()