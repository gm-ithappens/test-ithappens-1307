<?php
namespace ItHappens\ClaudioPablo\Controller\Index;
use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;

class Test extends Action {

    public function execute() {
        //echo "Claudio Pablo Silva Santos";
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }

}
