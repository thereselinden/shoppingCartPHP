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

    if(isset($this->items[$product->getId()])) {
      $cartItem = $this->items[$product->getId()];
      $cartItem->increaseQuantity();
    } else {
      $cartItem = new CartItem($product, $quantity);
      $this->items[$product->getId()] = $cartItem;
    }
  
    return $cartItem;

    }

    //Skall ta bort en produkt ur kundvagnen (använd unset())
    public function removeProduct($product)
    {

      unset($this->items[$product->getId()]);

      // IF WE WOULD NOT HAVE PUSHED CARTITEM AS ASSOCIATIVE ARRAY!
      // for ($i = 0; $i < count($this->items); $i++) {
      //   if($product->getId() === $this->items[$i]->getProduct()->getId()) {
      //     unset($this->items[$i]);
      //     $this->items = array_values($this->items); //reindex after unset 
      //     break;
      //   }
      // }
    }

    //Skall returnera totala antalet produkter i kundvagnen
    //OBS: Ej antalet unika produkter
    public function getTotalQuantity()
    {
     $quantity = 0;
      foreach ($this->items as $item) {
       //echo "Product title and number of products: " . $item->getProduct()->getTitle() . ' ,  antal: ' . $item->getQuantity() . ' productId: ' . $item->getProduct()->getId() .'<br>';
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
