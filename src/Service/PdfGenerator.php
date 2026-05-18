<?php

namespace App\Service;

use Dompdf\Dompdf;

class PdfGenerator
{
    /**
     * Génère un PDF à partir de HTML (version basique)
     * 
     * @param string $html Le contenu HTML à convertir
     * @return string Le contenu brut du PDF généré
     */
    public function generateFromHtml(string $html): string 
    {
        $dompdf = new Dompdf(); // On utilise maintenant le 'use' déclaré
        $dompdf->loadHtml($html);
        $dompdf->render();
        return $dompdf->output();
    }

    /**
     * Génère un PDF avec des options de mise en page
     * 
     * @param string $html Le contenu HTML à convertir
     * @param array $options Options de formatage ['format' => 'A4', 'margin' => 15]
     * @return string Le contenu brut du PDF généré
     */
    public function generateFromHtmlWithOptions(
        string $html,
        array $options = ['format' => 'A4', 'margin' => 15]
    ): string {
        $dompdf = new Dompdf();
        
        // Configuration du format
        $dompdf->setPaper($options['format'], 'portrait');
    
        $dompdf->loadHtml($html);
        $dompdf->render();
        return $dompdf->output();
    }
}