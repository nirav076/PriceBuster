<?php 

class product
{

//Defining the properties

    private $name ;
    private $price;    
    private $company;
    private $image;
    private $linkToProductPage ;

// The Setter methods    

    public function setName($name){ $this->name = $name ;}
    public function setPrice($price){ $this->price = $price ;}
    public function setCompany($company){ $this->company = $company ;}
    public function setImage($image){ $this->image = $image ;}
    public function setLinkToProductPage($linkToProductPage){ $this->linkToProductPage = $linkToProductPage ;}
     
// Defining the getter methods
    
    public function getName() { return $this->name ; }    
    public function getPrice(){ return $this->price ; }    
    public function getCompany() { return $this->company ; }    
    public function getImage() { return $this->image ; }
    public function getLinkToProductPage(){ return $this->linkToProductPage;}
}

?>
