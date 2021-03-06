<?php

namespace Votolab\VotolabBundle\Form\Handler;

use Votolab\VotolabBundle\Model\ElectionManager;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

class ElectionFormHandler
{
    protected $form;

    protected $request;

    protected $em;

    public function __construct(FormInterface $form, Request $request, ElectionManager $manager)
    {
        $this->form = $form;
        $this->request = $request;
        $this->manager = $manager;
    }

    public function process()
    {
        $this->form->handleRequest($this->request);
        if ($this->form->isValid()) {
            return $this->manager->create($this->form->getData());
        }
        return false;
    }
}