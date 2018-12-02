<?php

namespace App\Controller;

use App\Entity\Text;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{

  /**
  * @Route("/search/word", name="search_word")
  */
  public function search_word(Request $request)
  {
    $word = $request->query->get('word');

    if(strlen($word)>3) {
        $search_term = "%" . $word . "%";
    }
    else {$search_term = "% " . $word . " %";}

    $page_words = $this->getDoctrine()
    ->getRepository(Text::class)
    ->searchWord($search_term);

    return $this->json($page_words);
  }


  /**
  * @Route("/search/page", name="search_page")
  */
  public function search_page(Request $request)
  {
    $page_num = $request->query->get('page');

    $text = $this->getDoctrine()
    ->getRepository(Text::class)
    ->searchPage($page_num);

    $cat_text = "";
    foreach($text as $line) {
      $cat_text = $cat_text . nl2br($line["text"]);
    }

    if($cat_text != "") {
      $text = [];
      $text[0] = ["type" => "page", "text" => $cat_text, "page_num" => $page_num];
    }

    return $this->json($text);
  }

}
