<?php

namespace AlunoBundle\Controller;

use AlunoBundle\Entity\Aluno;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Aluno controller.
 *
 */
class AlunoController extends Controller {

    /**
     * Creates a new aluno entity.
     *
     */
    public function newAction(Request $request) {
        $aluno = new Aluno();
        $form = $this->createForm('AlunoBundle\Form\AlunoType', $aluno);
        $form->handleRequest($request);

        $maximoCadastro = 1; // troca aqui para a quantidade de cadastros limite

        $countApa = count($this->getDoctrine()->getRepository('AlunoBundle:Aluno')->findBy([
            'american_pale_ale' => true
        ]));
        $countCs = count($this->getDoctrine()->getRepository('AlunoBundle:Aluno')->findBy([
            'catarina_sour' => true
        ]));

        if ($form->isSubmitted() && $form->isValid()) {
            if ($countApa == $maximoCadastro) {
                if ($aluno->getAmericanPaleAle()) {
                    $aluno->setAmericanPaleAle(false);
                }
                $this->addFlash(
                    'error',
                    'O tipo American Pale Ale já possue o número limite de cadastro!'
                );
            }
            if ($countCs == $maximoCadastro) {
                if ($aluno->getCatarinaSour()) {
                    $aluno->setCatarinaSour(false);
                }
                $this->addFlash(
                    'error',
                    'O tipo Catarina Sour já possue o número limite de cadastro!'
                );
            }

            if (!$aluno->getCatarinaSour() and !$aluno->getAmericanPaleAle()) {
                $this->addFlash(
                    'error',
                    'Você deve selecionar no mínimo um tipo!'
                );

                return $this->redirectToRoute('aluno');
            }

            $em = $this->getDoctrine()->getManager();
            $verificaAluno = $this->getDoctrine()->getRepository('AlunoBundle:Aluno')->findOneBy([
                'cpf' => $aluno->getCpf(),
                'email' => $aluno->getEmail(),
            ]);

            if ($verificaAluno and $verificaAluno->getAmericanPaleAle() and $verificaAluno->getCatarinaSour()) {
                $this->addFlash(
                    'error',
                    'Você já está cadastrado para esse tipo!'
                );
            } else if ($verificaAluno) {
                if (!$verificaAluno->getAmericanPaleAle() and $aluno->getAmericanPaleAle()) {
                    $verificaAluno->setAmericanPaleAle(true);
                }
                if (!$verificaAluno->getCatarinaSour() and $aluno->getCatarinaSour()) {
                    $verificaAluno->setCatarinaSour(true);
                }

                $em->persist($verificaAluno);
                $em->flush();

                $this->addFlash(
                    'success',
                    'Cadastrado com sucesso!'
                );
            } else {
                $em->persist($aluno);
                $em->flush();

                $this->addFlash(
                    'success',
                    'Cadastrado com sucesso!'
                );
            }

            $message = \Swift_Message::newInstance()
                ->setSubject('Confirmação de Cadastro')
                ->setFrom('mees.rafael@gmail.com') // Trocar este email para o email da vale do lupulo
                ->setTo($aluno->getEmail())
                ->setBody(
                    $this->renderView(
                        'AlunoBundle:Template:email.html.twig',
                        array('aluno' => $aluno)
                    ),
                    'text/html'
                );
            $this->get('mailer')->send($message);

            return $this->redirectToRoute('aluno');
        }

        return $this->render('AlunoBundle:Aluno:new.html.twig', array(
            'aluno' => $aluno,
            'form' => $form->createView(),
        ));
    }
}
