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

class Clockworkgeek_DashboardReviews_Block_Tab extends Mage_Adminhtml_Block_Abstract
{

    protected function _prepareLayout()
    {
        /* @var $session Mage_Admin_Model_Session */
        $session = Mage::getSingleton('admin/session');
        if ($session->isAllowed('catalog/reviews_ratings/reviews/pending')) {
            /* @var $reviews Clockworkgeek_DashboardReviews_Model_Resource_Review_Pending_Collection */
            $reviews = Mage::getModel('dashboardreviews/resource_review_pending_collection');
            /* @var $grids Mage_Adminhtml_Block_Dashboard_Grids */
            $grids = $this->getLayout()
                ->getBlock('content')
                ->getChild('dashboard')
                ->getChild('grids');
            $grids->addTab('pending_reviews', array(
                'label' => Mage::helper('review')->__('Pending Reviews (%d)', $reviews->getSize()),
                'url' => $this->getUrl('*/dashboardReviews/pending', array(
                    '_current' => true
                )),
                'class' => 'ajax'
            ));
        }
        return parent::_prepareLayout();
    }
}
