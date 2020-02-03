<?php

namespace BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /*
     * Route ("/homme", name="homepage")
     */
    //AFFICHGE DE TOUTES LES MONTURES
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $montures= $em->getRepository('BackendBundle:Montures')->findAll();
        return $this->json($montures);
    }

    //RECHERCHE PAR NOM POUR HOMMES
    public function nameAction(Request $request){
        $json = $request->get("json",null);
        $params = json_decode($json);
        $name = $params->nom;
        $cible = $params->cible;
        $em = $this->getDoctrine()->getManager();
        $dql = "SELECT m FROM BackendBundle:Montures m where m.nom LIKE '".$name."%' AND  m.cible = '".$cible."'  order by m.id ASC";
        $query= $em->createQuery($dql);
         $query->setMaxResults(40);
        $monture= $query->getResult();
        return $this->json($monture);
    }
    //RECHERCHE PAR COULEURS
    public function couleursAction(Request $request){
        $json = $request->get("json",null);
        $params = json_decode($json);
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
        $em = $this->getDoctrine()->getManager();
        $dql = "SELECT m FROM BackendBundle:Montures m where m.couleur = '".$couleur1."' OR m.couleur = '".$couleur2."' OR m.couleur = '".$couleur3."' ";
        $dql .= " OR m.couleur = '".$couleur4."' OR m.couleur = '".$couleur5."' OR m.couleur = '".$couleur6."' ";
        $dql .= " OR m.couleur = '".$couleur7."' OR m.couleur = '".$couleur8."' OR m.couleur = '".$couleur9."' ";
        $dql .= " OR m.couleur = '".$couleur10."' OR m.couleur = '".$couleur11."' OR m.couleur = '".$couleur12."' ";
        $dql .= " OR m.couleur = '".$couleur13."' OR m.couleur = '".$couleur14."' OR m.couleur = '".$couleur15."' OR m.couleur = '".$couleur16."' ";
        $dql.= "order by m.id ASC";
        $query= $em->createQuery($dql);
        //$query->setMaxResults(40);
        $monture= $query->getResult();
        return $this->json($monture);
    }
    //RECHERCHE PAR NOM POUR TOUTES LES MONTURES
    public function nameallAction(Request $request,$nameall){
        $json = $request->get("json",null);
        $em = $this->getDoctrine()->getManager();
        //$monture = $em->getRepository('BackendBundle:Montures')->findBy(array('nom'=>$nameall));
        $dql = "SELECT m FROM BackendBundle:Montures m where m.nom LIKE '".$nameall."%'   order by m.id ASC";
        $query= $em->createQuery($dql);
        $query->setMaxResults(40);
        $monture= $query->getResult();
        
        return $this->json($monture);
    }
    //RECHERCHE PAR REFERENCE
    public function refAction(Request $request){
        $json = $request->get("json",null);
        $params = json_decode($json);
        $name=$params->ref;
    
        $em = $this->getDoctrine()->getManager();
        $monture= $em->getRepository('BackendBundle:Montures')->findOneByRef($name);
        if(is_object($monture)){
            return $this->json($monture);
        }else {
            return $this->json("non trouve");
        }

    }
    //FORMES
    public function formeAction(Request $request,$forme){
        $json = $request->get("json",null);
        $em = $this->getDoctrine()->getManager();
        //$monture = $em->getRepository('BackendBundle:Montures')->findBy(array('forme'=>$forme));
        $dql = "SELECT m FROM BackendBundle:Montures m where m.forme = '".$forme."'   order by m.ref ASC";
        $query= $em->createQuery($dql);
        //$query->setMaxResults(40);
        $monture= $query->getResult();
        return $this->json($monture);
    }
    //FAMILLE
    public function familleAction(Request $request,$famille){
     
        $em = $this->getDoctrine()->getManager();
        //$monture = $em->getRepository('BackendBundle:Montures')->findBy(array('sousfamille'=>$famille));
        $dql = "SELECT m FROM BackendBundle:Montures m where m.sousfamille = '".$famille."'   order by m.ref ASC";
        $query= $em->createQuery($dql);
        //$query->setMaxResults(40);
        $monture= $query->getResult();
        return $this->json($monture);
    }
    //MATIERE
    public function matiereAction(Request $request,$matiere){
        $em = $this->getDoctrine()->getManager();
        //$monture = $em->getRepository('BackendBundle:Montures')->findBy(array('matiere'=>$matiere));
        $dql = "SELECT m FROM BackendBundle:Montures m where m.matiere = '".$matiere."'   order by m.ref ASC";
        $query= $em->createQuery($dql);
        //$query->setMaxResults(40);
        $monture= $query->getResult();
        return $this->json($monture);
    }
    
    //SEXE
    public function sexeAction(Request $request,$sexe){
        $em = $this->getDoctrine()->getManager();
        //$monture = $em->getRepository('BackendBundle:Montures')->findBy(array('cible'=>$sexe));
        $dql = "SELECT m FROM BackendBundle:Montures m where m.cible = '".$sexe."'   order by m.ref ASC";
        $query= $em->createQuery($dql);
        $monture= $query->getResult();
        return $this->json($monture);
    }

    //lib
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
