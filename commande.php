<?php
class Commande{
   private int $id;
   private int $montante;
   private  string $date;
   private int $id_client;

   public function get_id()
   {
      return $this->id;
   }
   public function set_id(int $id)
   {
      $this->id = $id;
   }

   public function get_montante()
   {
      return $this->montante;
   }
   public function set_montante(int $montante)
   {
      $this->montante = $montante;
   }
   public function get_date()
   {
      return $this->date;
   }
   public function set_date(string $date)
   {
      $this->date = $date;
   }
   public function get_id_client()
   {
      return $this->id_client;
   }
   public function set_id_client(int $id_client)
   {
      $this->id_client = $id_client;
   }
   public function __construct(int $id, int $montante, string $date,int $id_client)
   {
      $this->id = $id;
      $this->montante = $montante;
      $this->date = $date;
      $this->id_client = $id_client;
     
   }
   public function __toString()
   {
      return "{$this->id},{$this->montante},{$this->date},{$this->id_client}";
   }

   public function toArray()
   {
      return [$this->id, $this->montante, $this->date, $this->id_client];
   }

}
?>