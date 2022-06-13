<?php

namespace App\Controller;

use App\Entity\Usuarios;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/usuarios", name="usuarios", methods={"GET"})
*/
class UsuariosController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $usuarios =$this->getDoctrine()->getRepository(Usuarios::class)->findAll();

        return $this->json([
            'data' => $usuarios
        ]);
    }

    /**
    * @Route("/{usuarioId}", name="showu", methods={"GET"})
    */
    public function showu($usuarioId)
    {
        $usuario =$this->getDoctrine()->getRepository(Usuarios::class)->find($usuarioId);

        return $this->json([
            'data'=> $usuario
        ]);

    }

    /**
    * @Route("/", name="createu", methods={"POST"})
    */
    public function createu(Request $request)
    {
        $data = $request->request->all();

        $usuario = new Usuarios();
        $usuario->setNomeUsuario($data['nome_usuario']);
        $usuario->setEmail($data['email']);
        $usuario->setStatusUsuario($data['status_usuario']);

        $doctrine = $this->getDoctrine()->getManager();

        $doctrine->persist($usuario);
        $doctrine->flush();

        return $this->json([
            'data' => 'Usuario criado!'
        ]);
    }

    /**
    * @Route("/{usuarioId}", name="updateu", methods={"PUT", "PATCH"})
    */
    public function updateu($usuarioId, Request $request)
    {
        $data = $request->request->all();
        $doctrine = $this->getDoctrine();

        $usuario = $doctrine->getRepository(Usuarios::class)->find($usuarioId);

        if($request->request->has('nome_usuario'))
            $usuario->setNomeUsuario($data['nome_usuario']);
        
        if($request->request->has('email'))
            $usuario->setEmail($data['email']);

        if($request->request->has('status_usuario'))    
            $usuario->setStatusUsuario($data['status_usuario']);

        $manager = $doctrine->getManager();
        $manager->flush();

        return $this->json([
            'data' => 'Usuario atualizado!'
        ]);
    }

}
