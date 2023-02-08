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

class AddBlockCmsIndustryPartnes implements DataPatchInterface, PatchRevertableInterface 
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
            "title" => "industry partners",
            "identifier" => "industry-partners",
            "store_id" => "All Store Views",
            "content" => '<style>#html-body [data-pb-style=XMMDFEW]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;align-self:stretch}#html-body [data-pb-style=QEYFNLU]{display:flex;width:100%}#html-body [data-pb-style=OBR21XX],#html-body [data-pb-style=QD89WPA]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;width:50%;align-self:stretch}#html-body [data-pb-style=HWBJNA3]{text-align:center;border-style:none}#html-body [data-pb-style=BOS80N6],#html-body [data-pb-style=UXKHLRM]{max-width:100%;height:auto}@media only screen and (max-width: 768px) { #html-body [data-pb-style=HWBJNA3]{border-style:none} }</style><div class="pagebuilder-column-group industry-partners" data-background-images="{}" data-content-type="column-group" data-appearance="default" data-grid-size="12" data-element="main" data-pb-style="XMMDFEW"><div class="pagebuilder-column-line" data-content-type="column-line" data-element="main" data-pb-style="QEYFNLU"><div class="pagebuilder-column industry-partners__content" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="OBR21XX"><h2 class="industry-partners--title" data-content-type="heading" data-appearance="default" data-element="main">Industry </h2><h2 class="industry-partners--subtitle" data-content-type="heading" data-appearance="default" data-element="main">Partners.</h2><div class="industry-partners--text" data-content-type="text" data-appearance="default" data-element="main"><p>Together we are stronger! We have partnered up with key companies to help you achieve the best experience and take your online business to a new level.</p></div></div><div class="pagebuilder-column industry-partners__image" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="QD89WPA"><figure data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="HWBJNA3"><img class="pagebuilder-mobile-hidden" src="{{media url=wysiwyg/Homepage-v2---partners.png}}" alt="" title="" data-element="desktop_image" data-pb-style="BOS80N6"><img class="pagebuilder-mobile-only" src="{{media url=wysiwyg/Homepage-v2---partners.png}}" alt="" title="" data-element="mobile_image" data-pb-style="UXKHLRM"></figure></div></div></div>',
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