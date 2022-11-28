<?php


class Cart  
{
    private array $items = [];


    //TODO Skriv getter för items
    public function getItems() {
        return $this->items;
    }


    /*
     Skall lägga till en produkt i kundvagnen genom att
     skapa ett nytt cartItem och lägga till i $items array.
     Metoden skall returnera detta cartItem.

     VG: Om produkten redan finns i kundvagnen
     skall istället quantity på cartitem ökas.
     */


   public function addProduct($product, $quantity)
    {
   // print_r($product->getTitle());
    $cartItem = new CartItem($product, $quantity);
    array_push($this->items, $cartItem);
    return $cartItem;

    //kolla om product id redan finns om det finns anropa increase()
    //gör en koll typ: 
    /*
    OM ID INTE FINNS UPPDATERA ANNARS ÖKA ANTAL
    if(!$this-items[$product->getId()]) {
       $cartItem = new CartItem($product, $quantity);
      array_push($this->items, $cartItem);
      return $cartItem;
    } else {
      $cartItem->increaseQuantity($quantity)
      return $cartItem;
    }
    */
    }

    //Skall ta bort en produkt ur kundvagnen (använd unset())
    public function removeProduct($product)
    {
      unset($this->items[$product->getId()]);
    }

    //Skall returnera totala antalet produkter i kundvagnen
    //OBS: Ej antalet unika produkter
    public function getTotalQuantity()
    {
     $quantity = 0;
      foreach ($this->items as $item) {
        $quantity += $item->getQuantity();
      }
     return $quantity;
    }
  

    //Skall räkna ihop totalsumman för alla produkter i kundvagnen
    //VG: Tänk på att ett cartitem kan ha olika quantity
    public function getTotalSum()
    {
      $totalSum = 0;
        foreach ($this->items as $item) {
            $totalSum += $item->getQuantity() * $item->getProduct()->getPrice();
        }

        return $totalSum;
    }



}
