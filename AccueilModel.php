<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


class AccueilModel extends CI_Model
{
    public function Accueil ()
    {
        // Chargement de la librairie 'database'
        $this->load->database();

        ////Partie pour voir les commentaires////

        // Exécute la requête
        $results = $this->db->query("SELECT *
        FROM waz_commentaire,waz_internautes
        WHERE com_notes=(SELECT MAX(com_notes)
                        FROM waz_commentaire)
        AND com_date_ajout=(SELECT MAX(com_date_ajout)
                        FROM waz_commentaire
                        WHERE com_notes= (SELECT MAX(com_notes)
                        FROM waz_commentaire))
        AND waz_commentaire.in_id=waz_internautes.in_id
        ");

        // Récupération des résultats
        $Comm1 = $results->result();
        // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
        //$aView["TopCom"] = $Comm1;
        return $Comm1;

    }


}
