<?php
require_once("client.php");
class Gestion_client {

    private string $nom_fichier;

    public function __construct (string $nom_fichier) {
        $this->nom_fichier = $nom_fichier;
    }
    
    public function ajouter(Client $client):void {
        $file = fopen($this->nom_fichier, 'a');
        fputcsv($file, $client->toArray(), ";");
        fclose($file);
    }
    


    public function rechercher(int $id):?Client {
        $file = fopen($this->nom_fichier, 'r');
        while (($data = fgetcsv($file, 1000, ";")) !== FALSE) {
            if ($data[0] == $id) {
                fclose($file);
                return new Client($data[0], $data[1], $data[2], $data[3],$data[4],$data[5]);
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

    public function modifier(Client $client):void{
        $file = fopen($this->nom_fichier, "r+");
        $result = [];
        while (($data = fgetcsv($file, 1000, ";")) !== FALSE) {
            if ($data[0] == $client->get_id()) {
                $result[] = $client->toArray();
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
        $clients = [];
        $file = fopen($this->nom_fichier, 'r');
        while (($data = fgetcsv($file, 1000, ";")) !== FALSE) {
            $client = new Client($data[0], $data[1], $data[2], $data[3], $data[4], $data[5]);
            $clients[] = $client;
        }
        fclose($file);
        return  $clients;
    }
    public function get_numbre_client(){
        return count($this->lister());
    }
}

