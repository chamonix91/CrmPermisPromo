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
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * @var  SourceService
 */


class SourceController extends FOSRestController
{

    ///////////////////
    ///  Add source ////
    /// ////////////////

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
        $SourceService->newSource($request->get('libelle'), $request->get('work'), $em);

        return $response = new Response ("source added", Response::HTTP_OK);
    }



    /////////////////////////
    ///  get all sources ////
    /////////////////////////


    /**
     * Creates Source
     * @Rest\Get("/source")
     * @param EntityManagerInterface $em
     * @param SourceService $SourceService
     * @param SerializerInterface $serializer
     * @return Response
     */

    public function AllSources(EntityManagerInterface $em, SourceService $SourceService, SerializerInterface $serializer )
    {
        $sources = $SourceService->AllSource($em, $serializer);


        return $response = new Response ($sources, Response::HTTP_OK);
    }


    ///////////////////////////
    ///  get source by id /////
    ///////////////////////////


    /**
     * Creates Source
     * @Rest\Get("/source/{id}")
     * @param EntityManagerInterface $em
     * @param SourceService $SourceService
     * @param SerializerInterface $serializer
     * @param int $id
     * @return Response
     */

    public function SourceById(EntityManagerInterface $em, SourceService $SourceService, SerializerInterface $serializer,$id)
    {

        $sources = $SourceService->SourceById($em, $serializer, $id);


        return $response = new Response ($sources, Response::HTTP_OK);
    }


    ///////////////////////
    ///  update source ////
    /// ///////////////////

    /**
     * Creates Source
     * @Rest\Put("/source/{id}")
     * @param EntityManagerInterface $em
     * @param Request $request
     * @param SourceService $SourceService
     * @param $id
     * @return string
     */

    public function updateSource(EntityManagerInterface $em, Request $request, SourceService $SourceService, $id)
    {
        $SourceService->UpdateSource($request->get('libelle'), $request->get('work'), $em, $id, $request);

        return $response = new Response ("source updated", Response::HTTP_OK);
    }


    ///////////////////////
    ///  delete source ////
    /// ///////////////////


    /**
     * Creates Source
     * @Rest\Delete("/source/{id}")
     * @param EntityManagerInterface $em
     * @param SourceService $SourceService
     * @param SerializerInterface $serializer
     * @param int $id
     * @return Response
     */


    public function DeleteSource(EntityManagerInterface $em, SourceService $SourceService,$id)
    {

        $source = $SourceService->DeleteSource($em, $id);


        return $response = new Response ("source deleted", Response::HTTP_OK);
    }



}