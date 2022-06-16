<?php

namespace App\Table;

use DateTime;

class Article {

    public function getURL() {
        return 'index.php?p=article&id=' . $this->id_article;
    }

    public function getExtrait() {
        $html = '<p>' . substr($this->contenu, 0, 200) . '...</p>';
        $html .= '<p><a href="' . $this->getURL() . '">Voir la suite</a></p>';
        return $html;
    }

    public function getDate() {
        $date = $this->date;
        $DateTime = DateTime::createFromFormat('Y-m-d H:i:s', $date);
        $dateWithNewFormat = $DateTime->format('d m Y');

        return $dateWithNewFormat;
    }

    public function getTimeSincePost() {
        $actualDate = new DateTime(Date('Y-m-d'));
        $postDate = new DateTime($this->date);
        $dateInterval = $postDate->diff($actualDate);
        
        if ($dateInterval->y > 0) {
            $timeSincePost = $dateInterval->y . ' an(s)';
        } elseif ($dateInterval->m > 0) {
            $timeSincePost = $dateInterval->m . ' mois';
        } else {
            $timeSincePost = $dateInterval->d . ' jour(s)';
        }

        return $timeSincePost;
    }

    public function deletePost() {
        return var_dump("test");
    }
    
}