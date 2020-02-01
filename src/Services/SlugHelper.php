<?php

namespace App\Services;

class SlugHelper {

    /**
     * @deprecated - Remplacer par utilisation des helpers de illuminate Str::slug
     * @author Lucas Robin
     * Permet de slugify une chaîne de caractère.
     * @param string $string Chaîne à transformer.
     * @param string $delimiter Séparateur qui remplace les espace de la chaîne.
     * @return string $clean 
     */
    public static function slugify(string $string, string $delimiter = '-') :string {
        $oldLocale = setlocale(LC_ALL, '0');
        setlocale(LC_ALL, 'en_US.UTF-8');
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = strtolower($clean);
        $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
        $clean = trim($clean, $delimiter);
        setlocale(LC_ALL, $oldLocale);
        return $clean;
    }
}