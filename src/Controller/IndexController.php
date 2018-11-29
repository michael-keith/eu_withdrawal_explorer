<?php

namespace App\Controller;

use App\Entity\Text;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
  /**
  * @Route("/", name="index")
  */
  public function index()
  {
    $pages = $this->getDoctrine()
    ->getRepository(Text::class)
    ->getAllPages();

    // $page_words = $this->getDoctrine()
    // ->getRepository(Text::class)
    // ->searchWord("");

    // foreach($page_words as $words) {
    //   $pages[$words["page_num"]-1]["selected"] = true;
    // }

    return $this->render('index/index.html.twig', [
      'controller_name' => 'IndexController',
      'pages' => $pages,
    ]);
  }
}
