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

class Clockworkgeek_DashboardReviews_Block_Grid extends Mage_Adminhtml_Block_Dashboard_Grid
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('pendingReviewsGrid');
        $this->setDefaultSort('created_at');
    }

    protected function _prepareCollection()
    {
        /* @var $reviews Clockworkgeek_DashboardReviews_Model_Resource_Review_Pending_Collection */
        $reviews = Mage::getModel('dashboardreviews/resource_review_pending_collection');
        $this->setCollection($reviews);
        
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('name', array(
            'header' => Mage::helper('reports')->__('Product Name'),
            'sortable' => false,
            'index' => 'name',
            'escape' => true
        ));
        
        $this->addColumn('title', array(
            'header' => Mage::helper('reports')->__('Title'),
            'width' => '200px',
            'sortable' => false,
            'index' => 'title',
            'truncate' => 50,
            'escape' => true
        ));
        
        $this->addColumn('summary_rating', array(
            'header' => Mage::helper('review')->__('Summary Rating'),
            'width' => '100px',
            'sortable' => false,
            'index' => 'summary_rating',
            'type' => 'text'
        ));
        
        $this->setFilterVisibility(false);
        $this->setPagerVisibility(false);
        
        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        $params = array(
            'id' => $row->getReviewId()
        );
        if ($this->getRequest()->getParam('store')) {
            $params['store'] = $this->getRequest()->getParam('store');
        }
        return $this->getUrl('*/catalog_product_review/edit', $params);
    }
}
