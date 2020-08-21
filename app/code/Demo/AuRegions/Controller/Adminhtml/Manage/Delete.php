<?php

namespace Demo\AuRegions\Controller\Adminhtml\Manage;

class Delete extends \Magento\Backend\App\Action
{
    protected $regionRepository;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Demo\AuRegions\Model\ResourceModel\RegionRepository $regionRepository
    ) {
        parent::__construct($context);
        $this->regionRepository = $regionRepository;
    }

    public function execute()
    {
        $data = $this->getRequest()->getParams();

        try {
            $this->regionRepository->delete($data);
            $this->messageManager->addSuccessMessage(__('Region has been successfully deleted.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__($e->getMessage()));
        }

        $this->_redirect('*/*/');

        return $data;
    }
}
