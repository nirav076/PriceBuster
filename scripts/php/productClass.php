<?php 

class product
{

//Defining the properties

    private $id ;
    private $name;
    private $price ;   
    private $company ;
    
    private $categoryId ;
    private $category ;
    
    private $image ;
    private $specificationDestination;
    private $linkToProductPage ;
    private $popularity ;
    private $review ;
    private $overallRating ;
    
   
    public function product() // Contructor for default values!
    {
        $this->id = 0;
        $this->name = "";
        $this->price = 0.0;    
        $this->company = "";
        
        $this->categoryId = 0;
        $this->category = "";
        
        $this->image = "";
        $this->specificationDestination = "";
        $this->linkToProductPage = "" ;
        $this->popularity = 0;
        $this->review = "";
        $this->overallRating = 0.0;
    
    }
    
    public function setId($id){$this->id = $id;}
    public function setName($name){ $this->name = $name ;}
    
    public function setPrice($price){ $this->price = $price ;}
    public function setCompany($company){ $this->company = $company ;}
    
    public function setCategoryId($categoryId){$this->categoryId = $categoryId;}
    public function setCategory($category){$this->category = $category;}
    
    public function setSpecificationDestination($specificationDestination){$this->specificationDestination = $specificationDestination;}
    public function setLinkToProductPage($linkToProductPage){ $this->linkToProductPage = $linkToProductPage ;}
    
    public function setPopularity($popularity){$this->popularity = $popularity;}
    public function setReview($review){$this->review = $review;}
    public function setOverallRating($overallRating){$this->overallRating = $overallRating;}
    
    public function setImage($image){$this->image = $image;}
     
// Defining the getter methods
    public function getId(){ return $this->id; }
    public function getName() { return $this->name ; }    
    
    public function getPrice(){ return $this->price ; }    
    public function getCompany() { return $this->company ; }
    
    public function getCategoryId(){return $this->categoryId ;}
    public function getCategory(){return $this->category ;}
    
    public function getSpecificationDestination(){return $this->specificationDestination ;}
    public function getLinkToProductPage(){ return $this->linkToProductPage;}
    public function getPopularity(){return $this->popularity ;}
    public function getReview(){return $this->review ;}
    public function getOverallRating(){return $this->overallRating ;}
    
    public function getImage(){return $this->image;}
}

?>
