<?php

class Clockworkgeek_DashboardReviews_Model_Resource_Review_Pending_Collection
extends Mage_Review_Model_Mysql4_Review_Product_Collection
{

    protected function _initSelect()
    {
        parent::_initSelect();
        $this->addStatusFilter(Mage_Review_Model_Review::STATUS_PENDING)
            ->addStoreData()
            ->setDateOrder()
            ->addReviewSummary();
        return $this;
    }

    protected function _afterLoad()
    {
        parent::_afterLoad();
        $this->_addSummaryData();
        return $this;
    }

    protected function _addSummaryData()
    {
        Mage::register('review_data', $this->getFirstItem(), true);

        /* @var $layout Mage_Core_Model_Layout */
        $layout = Mage::app()->getLayout();
        foreach ($this as $item) {
            $rating = $layout->createBlock('adminhtml/review_rating_summary');
            $rating->setReviewId($item->getReviewId());
            $item->setData('summary_rating', $rating->toHtml());
        }

        return $this;
    }
}
