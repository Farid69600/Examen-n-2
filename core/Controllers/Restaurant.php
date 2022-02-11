<?php

namespace Controllers;

class Restaurant extends AbstractController
{
    protected $defaultModelName = \Models\Restaurant::class;

    public function index()
    {
        return $this->json($this->defaultModel->findAll() );
    }


    public function new(){

        $request = $this->post('json', ['name'=>'text', 'address'=>'text', 'city'=>'text']);

        if(!$request){
            return $this->json('formulaire mal soumis');
        }


        $restaurant = new \Models\Restaurant();
        $restaurant->setName($request['name']);
        $restaurant->setAddress($request['address']);
        $restaurant->setCity($request['city']);
        $this->defaultModel->save($restaurant);

        return $this->json("bien crée ton restaurant");
    }

    /**
     * attend une requete de type DELETE
     * @return void
     */
    public function suppr(){

        //recuperer la demande (la requete)

        $request = $this->delete('json', ['id'=>'number']);
        if(!$request){

            return $this->json("requete mal soumise", "delete");
        }

        //verifier si le message existe
        //s'il n'existe, renvoyer une réponse qui le signale

        $restaurant = $this->defaultModel->findById($request['id']);
        if(!$restaurant){

            return $this->json("désolé ce restaurant n'existe pas", "delete");
        }

        //supprimer le message

        $this->defaultModel->remove($restaurant);
        //envoyer une réponse qui confirme la bonne suppression

        return $this->json("restaurant bien supprimée", "delete");
    }

}