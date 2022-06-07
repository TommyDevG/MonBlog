<?php

namespace App\Table;

class Categories {

    public function getURL() {
        return '../index.php?p=category&id=' . $this->id_categorie;
    }
    
}