<?php
namespace Edureka\Feedback\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Feedback extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('edureka_feedback', 'feedback_id');
    }
}
