<?php

namespace Overdose\Testimonials\Controller\Index;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Overdose\Testimonials\Model\Imageupload\ImageUploader;

class UploadImage implements HttpPostActionInterface
{
    protected ImageUploader $imageUploader;

    protected JsonFactory $resultJsonFactory;

    protected RequestInterface $request;

    public function __construct(
        ImageUploader $imageUploader,
        JsonFactory $resultJsonFactory,
        RequestInterface $request
    ) {
        $this->imageUploader = $imageUploader;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->request = $request;
    }

    public function execute()
    {
        $imageId = $this->request->getParam('param_name', 'image');

        try {
            $result = $this->imageUploader->saveFileToTmpDir($imageId);
        } catch (\Exception $e) {
            $result = ['error' => $e->getMessage(), 'errorcode' => $e->getCode()];
        }
        return $this->resultJsonFactory->create()->setData($result);
    }
}
