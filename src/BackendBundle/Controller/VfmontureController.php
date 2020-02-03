<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
/**
 * Description of VfmontureController
 *
 * @author luis.manresa
 */
class VfmontureController extends Controller {
    public function indexAction(Request $request)
    {
        $json = $request->get("json",null);
        $params   = json_decode($json);
        
        $couleur1 = $params->couleur1;
        $couleur2 = $params->couleur2;
        $couleur3 = $params->couleur3;
        $couleur4 = $params->couleur4;
        $couleur5 = $params->couleur5;
        $couleur6 = $params->couleur6;
        $couleur7 = $params->couleur7;
        $couleur8 = $params->couleur8;
        $couleur9 = $params->couleur9;
        $couleur10 = $params->couleur10;
        $couleur11 = $params->couleur11;
        $couleur12 = $params->couleur12;
        $couleur13 = $params->couleur13;
        $couleur14 = $params->couleur14;
        $couleur15 = $params->couleur15;
        $couleur16 = $params->couleur16;
        $cible = $params->cible;
        $matiere = $params->matiere;
        $forme = $params->forme;
        $nom = $params->nom;
        $usage = $params->usage;
        $em = $this->getDoctrine()->getManager();
        //requette
        $dql = "SELECT m FROM BackendBundle:Vfmonture m where (m.couleur = '".$couleur1."' OR m.couleur = '".$couleur2."' OR m.couleur = '".$couleur3."' ";
        $dql .= " OR m.couleur = '".$couleur4."' OR m.couleur = '".$couleur5."' OR m.couleur = '".$couleur6."' ";
        $dql .= " OR m.couleur = '".$couleur7."' OR m.couleur = '".$couleur8."' OR m.couleur = '".$couleur9."' ";
        $dql .= " OR m.couleur = '".$couleur10."' OR m.couleur = '".$couleur11."' OR m.couleur = '".$couleur12."' ";
        $dql .= " OR m.nom = '".$nom."'";
        $dql .= " OR m.couleur = '".$couleur13."' OR m.couleur = '".$couleur14."' OR m.couleur = '".$couleur15."' OR m.couleur = '".$couleur16."'" ;
        
        
        
        $dql .= " OR m.matiere = '".$matiere."'";
        $dql .= " OR m.forme = '".$forme."'";
        $dql .= " OR m.usage = '".$usage."')";
        $dql .= " AND m.cible = '".$cible."'";
        $dql .= " AND  m.sortieCollection < CURRENT_TIMESTAMP() ";
        $dql.= "order by m.itemcode ASC";
        $query= $em->createQuery($dql);
        //$query->setMaxResults(40);
        $monture= $query->getResult();
        return $this->json($monture);
    }
    public function allAction(){
        $em = $this->getDoctrine()->getManager();
        $vfmonture= $em->getRepository('BackendBundle:Vfmonture')->findAll();
        return $this->json($vfmonture);        
    }
    public function json($data){
        $normalizers = array(new \Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer);
        $encoders = array("json" => new \Symfony\Component\Serializer\Encoder\JsonEncoder());
        $serializer = new \Symfony\Component\Serializer\Serializer($normalizers, $encoders);        
        $json = $serializer->serialize($data,'json');        
        $response = new \Symfony\Component\HttpFoundation\Response();
        $response->setContent($json);
        $response->headers->set("Content-Type","application/json");
        return $response;
    }
}
