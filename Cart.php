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
    //echo "ProductId: " . $product->getId() . "<br>";
    $cartItem = new CartItem($product, $quantity);
    //array_push($this->items, $cartItem);
    $this->items[] = $cartItem;
    return $cartItem;

   
    //OM ID INTE FINNS LÄGG TILL NY INSTANCE  ANNARS ÖKA ANTAL
    // $cartItem = $this->items[$product->getId()] ?? null;
    // echo "Intial CARTITEM value: " . $cartItem . "<br>";
    // if(!$cartItem) {
    //   echo 'No product of this found, I will create a new product object! <br>';
    //   $cartItem = new CartItem($product, $quantity);
    //   array_push($this->items, $cartItem);
    //   //return $cartItem;
    // } 
    //   echo 'Product already in cart - I will increase quantity instead! <br>';
    //   $cartItem->increaseQuantity($quantity);
    //   return $cartItem;
    
    
    }

    //Skall ta bort en produkt ur kundvagnen (använd unset())
    public function removeProduct($product)
    {

      for ($i = 0; $i < count($this->items); $i++) {
        if($product->getId() === $this->items[$i]->getProduct()->getId()) {
          unset($this->items[$i]);
          $this->items = array_values($this->items); //reindex after unset 
          break;
        }
      }
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
