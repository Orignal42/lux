<?php

namespace App\Controller;

use App\Entity\Candidate;
use App\Entity\InfoAdminCandidat;
use App\Form\CandidateType;

// use App\Entity\Experience;
// use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

use Symfony\Component\HttpFoundation\File\Exception\FileException;

/**
 * @Route("/candidate")
 */
class CandidateController extends AbstractController
{
    /**
     * @Route("/", name="candidate_index", methods={"GET"})
     */
    public function index(): Response
    {
        $candidates = $this->getDoctrine()
            ->getRepository(Candidate::class)
            ->findAll();

        return $this->render('candidate/index.html.twig', [
            'candidates' => $candidates,
        ]);
    }

    /**
     * @Route("/new", name="candidate_new", methods={"GET","POST"})
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $candidate = new Candidate();
       
        $form = $this->createForm(CandidateType::class, $candidate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
         
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('candidate_index');
        }

        return $this->render('candidate/new.html.twig', [
            'candidate' => $candidate,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="candidate_show", methods={"GET"})
     */
    public function show(Candidate $candidate): Response
    {
        return $this->render('candidate/show.html.twig', [
            'candidate' => $candidate,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="candidate_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Candidate $candidate, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(CandidateType::class, $candidate);
        $form->handleRequest($request);
        $dataCandidate = $candidate->toArray();
         $dataLength = count($dataCandidate);
        if ($form->isSubmitted() && $form->isValid()) {
            $cv = $form->get('cv')->getData();
            $profil = $form->get('profil_picture')->getData();
            $passport = $form->get('passport')->getData();

            if($cv){
                $candidate->setCv($this->uploadFile($cv, $slugger, 'cv_directory'));
            }

            if($profil){
                $candidate->setprofilPicture($this->uploadFile($profil, $slugger, 'profil_directory'));
            }

            if($passport){
                $candidate->setPassport($this->uploadFile($passport, $slugger, 'passport_directory'));
            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('candidate_edit',[
                'id'=>$candidate->getId()
            ]);
        }
        

        return $this->render('candidate/edit.html.twig', [
            'candidate' => $candidate,
            'form' => $form->createView(),
            'dataCandidate'=>$dataCandidate,
            'dataLength'=>$dataLength  
        ]);
    }

    /**
     * @Route("/{id}", name="candidate_delete", methods={"POST"})
     */
    public function delete(Request $request, Candidate $candidate): Response
    {
        if ($this->isCsrfTokenValid('delete'.$candidate->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($candidate);
            $entityManager->flush();
        }

        return $this->redirectToRoute('candidate_index');
    }
    public function uploadFile($file, $slugger, $targetDirectory){

        if ($file) {

            $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

            $safeFilename = $slugger->slug($originalFilename);
            $newFilename = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();

            try {
                $file->move(
                    $this->getParameter($targetDirectory),
                    $newFilename
                );
            } catch (FileException $e) {
                // ... handle exception if something happens during file upload
            }
            return $newFilename;

        }
    }
}
