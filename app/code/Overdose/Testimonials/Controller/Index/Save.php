<?php

namespace Overdose\Testimonials\Controller\Index;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Response\RedirectInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Message\ManagerInterface;
use Overdose\Testimonials\Model\Imageupload\ImageUploader;
use Overdose\Testimonials\Model\ResourceModel\FeedbackRepository;

class Save implements HttpPostActionInterface
{
    protected RequestInterface $request;

    protected FeedbackRepository $feedbackRepository;

    protected ImageUploader $imageUploader;

    protected ManagerInterface $messageManager;

    protected RedirectInterface $redirect;

    protected ResponseInterface $response;

    public function __construct(
        ImageUploader $imageUploader,
        FeedbackRepository $feedbackRepository,
        RequestInterface $request,
        ManagerInterface $messageManager,
        RedirectInterface $redirect,
        ResponseInterface $response
    ) {
        $this->request = $request;
        $this->feedbackRepository = $feedbackRepository;
        $this->imageUploader = $imageUploader;
        $this->messageManager = $messageManager;
        $this->redirect = $redirect;
        $this->response = $response;
    }

    public function execute()
    {
        $data = $this->request->getParams();

        if (isset($data['image-name'])) {
            $data['image'] = $data['image-name'];
            $path = '';
            try {
                $path = $this->imageUploader->moveFileFromTmp($data['image']);
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage(__($e->getMessage()));
            }
            $data['img_url'] = $path;
        }

        try {
            $this->feedbackRepository->save($data);
            $this->messageManager->addSuccessMessage(__('Feedback has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__($e->getMessage()));
        }

        $this->redirect->redirect($this->response, '*/');

        return $data;
    }
}
