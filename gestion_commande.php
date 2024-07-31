<?php
require_once("commande.php");
class Gestion_commande {

    private string $nom_fichier;

    public function __construct (string $nom_fichier) {
        $this->nom_fichier = $nom_fichier;
    }
    
    public function ajouter(Commande $commande):void {
        $file = fopen($this->nom_fichier, 'a');
        fputcsv($file, $commande->toArray(), ";");
        fclose($file);
    }
    


    public function rechercher(int $id):?Commande {
        $file = fopen($this->nom_fichier, 'r');
        while (($data = fgetcsv($file, 1000, ";")) !== FALSE) {
            if ($data[0] == $id) {
                fclose($file);
                return new Commande($data[0], $data[1], $data[2], $data[3]);
            }
        }
        fclose($file);
        return null;
    }
    
    public function supprimer(int $id) {
        $file = fopen($this->nom_fichier, "r+");
        $result = [];
        while (($data = fgetcsv($file, 1000, ";")) !== FALSE) {
            if ($data[0] != $id) {
                $result[] = $data;
            }
        }
        ftruncate($file, 0);
        rewind($file);
        foreach ( $result as $line){
            fputcsv($file, $line, ";");
        }
        fclose($file);
}

    public function modifier(Commande $commande):void{
        $file = fopen($this->nom_fichier, "r+");
        $result = [];
        while (($data = fgetcsv($file, 1000, ";")) !== FALSE) {
            if ($data[0] == $commande->get_id()) {
                $result[] = $commande->toArray();
            } else {
                $result[] = $data;
            }
        }
        ftruncate($file, 0);
        rewind($file);
        foreach ( $result as $line){
            fputcsv($file, $line, ";");
        }
        fclose($file);
    }
    public function lister(): array {
        $commandes = [];
        $file = fopen($this->nom_fichier, 'r');
        while (($data = fgetcsv($file, 1000, ";")) !== FALSE) {
            $commande = new Commande($data[0], $data[1], $data[2], $data[3]);
            $commandes[] = $commande;
        }
        fclose($file);
        return  $commandes;
    }

}