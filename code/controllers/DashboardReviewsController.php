<?php
/**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 *
 * @category   Adminhtml
 * @package    Clockworkgeek_DashboardReviews
 * @author     Daniel Deady <daniel@clockworkgeek.com>
 * @copyright  Copyright (c) 2010, Daniel Deady
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Clockworkgeek_DashboardReviews_DashboardReviewsController extends Mage_Adminhtml_Controller_Action
{

    public function pendingAction()
    {
        $this->getResponse()->setBody($this->getLayout()
            ->createBlock('dashboardreviews/grid')
            ->toHtml());
    }

    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('catalog/reviews_ratings/reviews/pending');
    }
}
