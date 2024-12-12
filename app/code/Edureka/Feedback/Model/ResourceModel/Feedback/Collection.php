<?php
namespace Edureka\Feedback\Model\ResourceModel\Feedback;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'feedback_id';

    protected function _construct()
    {
        $this->_init(
            \Edureka\Feedback\Model\Feedback::class,
            \Edureka\Feedback\Model\ResourceModel\Feedback::class
        );
    }
}
