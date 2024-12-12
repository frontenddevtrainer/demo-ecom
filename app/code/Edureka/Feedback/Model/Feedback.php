<?php
namespace Edureka\Feedback\Model;

use Magento\Framework\Model\AbstractModel;

class Feedback extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Edureka\Feedback\Model\ResourceModel\Feedback::class);
    }
}
