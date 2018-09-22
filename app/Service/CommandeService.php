<?php
/**
 * Created by PhpStorm.
 * User: matthieu
 * Date: 12/07/2018
 * Time: 20:07
 */

namespace App\Service;



class CommandeService
{
    public static function toPdf($articles)
    {
        $p = new \PDFlib();

        /*  ouvre un nouveau fichier PDF ; insère un nom de fichier pour créer le PDF sur le disque */
        if ($p->begin_document("", "") == 0) {
            die("Error: " . $p->get_errmsg());
        }

        $doc_title = utf8_decode('eCommerçant');
        $doc_subtitle = utf8_decode("Facture n°". $_GET['id']);

        $p->set_info("Creator", $doc_title);
        $p->set_info("Author", $doc_title);
        $p->set_info("Title", $doc_subtitle);
        $p->begin_page_ext(595, 842, "");
        $font = $p->load_font("Helvetica-Bold", "winansi", "");
        $p->setfont($font, 24.0);
        $p->set_text_pos(50, 700);
        $p->show($doc_title);

        $p->setfont($font, 12.0);
        $p->continue_text(utf8_decode('Facture n°'. $_GET['id']));

        $prixTotal = 0;

        $p->set_text_pos(50,600);
        $y = 600;

        $font = $p->load_font("Helvetica", "winansi", "");

        $p->setfont($font, 10.0);
        foreach ($articles as $article) {
            $y -= 30;
            $p->setfont($font, 10.0);
            $p->set_text_pos(50,$y);
            $p->continue_text(' - '. $article->description);
            $p->set_text_pos(510,$y);
            $p->continue_text('x'.$article->quantity .' = '. $article->quantity*$article->price);
            $prixTotal += $article->quantity*$article->price;
            if ($y <= 120) {
                $y = 800;
                $p->end_page_ext("");
                $p->begin_page_ext(595, 842, "");
            }
        }
        $p->setfont($font, 15.0);
        $p->set_text_pos(400, $y-40);
        $font = $p->load_font("Helvetica-Bold", "winansi", "");
        $p->setfont($font, 10.0);
        $p->continue_text("TOTAL : ". $prixTotal);

        $p->end_page_ext("");

        $p->end_document("");

        $buf = $p->get_buffer();
        $len = strlen($buf);

        header("Content-type: application/pdf");
        header("Content-Length: $len");
        header("Content-Disposition: inline; filename=hello.pdf");
        print $buf;


        $p->delete();
    }
}