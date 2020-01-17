<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 17/01/2020
 * Time: 12:21
 */

namespace App\Controller;

use App\Entity\Source;
use App\Service\SourceService;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * @var  SourceService
 */


class SourceController extends FOSRestController
{




    /**
     * Creates Source
     * @Rest\Post("/sources")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return string
     */
    public function postSources(Request $request, EntityManagerInterface $em)
    {
        $source = new Source();
        $source->setLibelle($request->get('libelle'));
        $source->setWork($request->get('work'));

        $em->persist($source);
        $em->flush();

        //dump($source);die();
        //return View::create($source, Response::HTTP_CREATED);
        return $response = new Response ("source added", Response::HTTP_OK);

        //return $response->getContent();

    }

    /**
     * Creates Source
     * @Rest\Post("/source")
     * @param Request $request
     * @param SourceService $SourceService
     * @param EntityManagerInterface $em
     * @return string
     */

    public function postSource(Request $request,SourceService $SourceService,EntityManagerInterface $em )
    {
        $source = $SourceService->newSource($request->get('libelle'), $request->get('work'), $em);

        return $response = new Response ("source added", Response::HTTP_OK);
    }





}