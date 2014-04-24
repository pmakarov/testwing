<?php

class DO_Transaction{
    public $piin;
    public $spiin;
	public $edi;
	public $xml;
	public $udf;

    function __construct($piin = null, $spiin = null){
        $this->piin = $piin;
        $this->spiin = $spiin;
    }

    public function __toString() {
      return $this->piin . $this->spiin;
    }
	
	/* public function __isset($name) {
        echo "Is '$name->piin' set?\n";
        return (isset($this->piin) && isset($this->spiin));
    }*/
}
?>