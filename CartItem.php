<?php


class CartItem
{
    private $product;
    private int $quantity;

    // TODO Skriv en konstruktor som sätter alla properties
    public function __construct($product, $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;

    }
    // TODO Skriv getters för alla properties
    public function getProduct() {
        return $this->product;
    }


    public function getQuantity() {      
        return $this->quantity;
    }

    //VG: Skall utöka antalet på ett cartItem med 1. 
    //VG: Det skall inte vara möjligt att utöka så att antalet överstiger produktens $inStock.
    public function increaseQuantity($productQuantity = 1) 
    {
    // sätter ett initialvärde i parameter $productQuantity = 1 
    $inStock = $this->getProduct()->getInStock();
   
      if ($this->getQuantity() + $productQuantity > $inStock) {
        echo "Out of stock, in stock quantity: ". $this->getProduct()->getInStock();
        echo 'Kan inte lägga till. Slut i lager';
        // Stops nextcomming code to run, since we are throwing Exception
        // throw new Exception( "Product quantity can not be more than whats available in stock, for this product it is: ". $this->getProduct()->getInStock());
      }
      $this->quantity += 1;

      //$this->quantity++;

    }
}
