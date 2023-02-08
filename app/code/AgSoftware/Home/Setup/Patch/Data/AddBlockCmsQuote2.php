<?php
/**
 * Copyright © N/A All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace AgSoftware\Home\Setup\Patch\Data;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;
use Magento\Framework\Stdlib\DateTime\Filter\Date;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Magento\Framework\App\State;
use Magento\Cms\Model\BlockFactory;
use Magento\Framework\App\Area;

class AddBlockCmsQuote2 implements DataPatchInterface, PatchRevertableInterface 
{

    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * Constructor
     *
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct (
        Date $dateFilter,
        TimezoneInterface $localeDate,
        ModuleDataSetupInterface $moduleDataSetup,
        State $state,
        BlockFactory $cmsBlock,
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->cmsBlock = $cmsBlock;
        $this->localeDate = $localeDate;
        $this->_dateFilter = $dateFilter;

        $this->state = $state;
        //$this->cmsRepository = $cmsRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        
        $this->moduleDataSetup->getConnection()->startSetup();

        /**
         * @var \Magento\Cms\Model\Block $cmsBlock
         */
        $cmsBlock = $this->cmsBlock->create();
        $data = [
            "title" => "quote 2",
            "identifier" => "quote-2",
            "store_id" => "All Store Views",
            "content" => '<style>#html-body [data-pb-style=DEC67PI]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;text-align:center;align-self:stretch}#html-body [data-pb-style=ENO4DUE]{display:flex;width:100%}#html-body [data-pb-style=Q7K32K6]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;width:100%;align-self:stretch}</style><div class="pagebuilder-column-group quote-2" data-background-images="{}" data-content-type="column-group" data-appearance="default" data-grid-size="12" data-element="main" data-pb-style="DEC67PI"><div class="pagebuilder-column-line" data-content-type="column-line" data-element="main" data-pb-style="ENO4DUE"><div class="pagebuilder-column quote-2__card" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="Q7K32K6"><h3 class="quote-2--title" data-content-type="heading" data-appearance="default" data-element="main">INCREDIBLE CUSTOMER SERVICE</h3><div class="quote-2--review-title" data-content-type="text" data-appearance="default" data-element="main"><p>&nbsp;Pearl Theme for Magento 2.&nbsp;</p></div><div class="quote-2--text" data-content-type="text" data-appearance="default" data-element="main"><p>The Welt Pixel team has been so helpful to us over the time that we&lsquo;ve been using their Pearl theme. The theme itself is really powerful and lets us do a lot more visually on our site than we ever considered before. We&lsquo;re hoping to move our secondary website to Magento in the near future and we&lsquo;ll definitely be using Welt Pixel when that happens. Thank you guys!!</p></div><div class="quote-2--name-author" data-content-type="text" data-appearance="default" data-element="main"><p>DEVIN</p></div></div></div></div>',
            "is_active" => "1"
        ];

        $data["from_date"] = $this->localeDate->formatDate();
        $filterValues = ["from_date" => $this->_dateFilter];

        $inputFilter = new \Zend_Filter_Input(
            $filterValues,
            [],
            $data
        );
        $data = $inputFilter->getUnescaped();
        $cmsBlock->addData($data);

        $this->state->setAreaCode(Area::AREA_ADMINHTML); // or \Magento\Framework\App\Area::AREA_FRONTEND, depending on your needs

        $cmsBlock->save();

        $this->moduleDataSetup->getConnection()->endSetup();

    }

    /**
     * {@inheritdoc}
     */
    public function revert()
    {
        $this->moduleDataSetup->getConnection()->startSetup();

        $this->moduleDataSetup->getConnection()->endSetup();
    }

    /**
     * {@inheritdoc}
    */
    public function getAliases()
    {
        return [];
    }

    /**
     * {@inheritdoc}
    */
    public static function getDependencies()
    {
        return [];
    }
    
}