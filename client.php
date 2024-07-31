<?php
class Client
{
   //Atrributs
   private int $id;
   private string $nom;
   private string $prenom;
   private int $age;
   private string $ville;
   private string $code_postal;

   //getters and setters
   public function get_id()
   {
      return $this->id;
   }
   public function set_id(int $id)
   {
      $this->id = $id;
   }

   public function get_nom()
   {
      return $this->nom;
   }
   public function set_nom(string $nom)
   {
      $this->nom = $nom;
   }
   public function get_prenom()
   {
      return $this->prenom;
   }
   public function set_prenom(string $prenom)
   {
      $this->prenom = $prenom;
   }
   public function get_age()
   {
      return $this->age;
   }
   public function set_age(int $age)
   {
      $this->age = $age;
   }
   public function get_ville()
   {
      return $this->ville;
   }
   public function set_ville(string $ville)
   {
      $this->ville = $ville;
   }
   public function get_code_postal()
   {
      return $this->code_postal;
   }
   public function set_code_postal(string $code_postal)
   {
      $this->code_postal = $code_postal;
   }

   public function __construct(int $id, string $nom, string $prenom, string $ville, int $age, string $code_postal)
   {
      $this->id = $id;
      $this->nom = $nom;
      $this->prenom = $prenom;
      $this->ville = $ville;
      $this->age = $age;
      $this->code_postal = $code_postal;
   }
   public function __toString()
   {
      return "{$this->id},{$this->nom},{$this->prenom},{$this->ville},{$this->age},{$this->code_postal}";
   }

   public function toArray()
   {
      return [$this->id, $this->nom, $this->prenom, $this->ville, $this->age, $this->code_postal];
   }




}
?>