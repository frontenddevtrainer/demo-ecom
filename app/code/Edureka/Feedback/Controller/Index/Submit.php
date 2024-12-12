<?php
namespace Edureka\Feedback\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Edureka\Feedback\Model\FeedbackFactory;

class Submit extends Action
{
    protected $feedbackFactory;

    public function __construct(
        Context $context,
        FeedbackFactory $feedbackFactory
    ) {
        $this->feedbackFactory = $feedbackFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            try {
                $feedback = $this->feedbackFactory->create();
                $feedback->setData([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'message' => $data['message']
                ]);
                $feedback->save();
                $this->messageManager->addSuccessMessage(__('Thank you for your feedback.'));
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(__('Unable to save your feedback. Please try again.'));
            }
        }
        return $this->_redirect('feedback/index');
    }
}
