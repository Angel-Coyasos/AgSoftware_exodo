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

class AddBlockCmsGoogleAnalytics4 implements DataPatchInterface, PatchRevertableInterface 
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
            "title" => "google analytics 4",
            "identifier" => "google-analytics-4",
            "store_id" => "All Store Views",
            "content" => '<style>#html-body [data-pb-style=L1K7PH8]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;align-self:stretch}#html-body [data-pb-style=MJJH5RF]{display:flex;width:100%}#html-body [data-pb-style=VMYX6TL]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;width:50%;align-self:stretch}#html-body [data-pb-style=J8F8XH2]{text-align:left}#html-body [data-pb-style=X6STUO3]{display:inline-block}#html-body [data-pb-style=XJJ9A8Y]{text-align:center}#html-body [data-pb-style=I6Q6LPB]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;width:50%;align-self:stretch}#html-body [data-pb-style=OYHRM7F]{border-style:none}#html-body [data-pb-style=APCA93T],#html-body [data-pb-style=JI4UQE1]{max-width:100%;height:auto}@media only screen and (max-width: 768px) { #html-body [data-pb-style=OYHRM7F]{border-style:none} }</style><div class="pagebuilder-column-group google-Analytics-4" data-background-images="{}" data-content-type="column-group" data-appearance="default" data-grid-size="12" data-element="main" data-pb-style="L1K7PH8"><div class="pagebuilder-column-line" data-content-type="column-line" data-element="main" data-pb-style="MJJH5RF"><div class="pagebuilder-column google-Analytics-4__content" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="VMYX6TL"><h2 class="google-Analytics-4__title" data-content-type="heading" data-appearance="default" data-element="main" data-pb-style="J8F8XH2">Google Analytics 4.</h2><h2 class="google-Analytics-4__subtitle" data-content-type="heading" data-appearance="default" data-element="main">Get Your Head Start.</h2><div class="google-Analytics-4__text" data-content-type="text" data-appearance="default" data-element="main"><p id="B4EYJF0">Starting <strong>July 1st, 2023, Universal Analytics properties will no longer be processing new data.</strong> If you still rely on Universal Analytics, it&lsquo;s important to get a head start and switch to using Google Analytics 4. Doing so will allow you to build historical data and usage in the property, ensuring continuity once Universal Analytics is no longer available.</p></div><div data-content-type="buttons" data-appearance="inline" data-same-width="false" data-element="main" class="google-Analytics-4__button"><div data-content-type="button-item" data-appearance="default" data-element="main" data-pb-style="X6STUO3"><div class="pagebuilder-button-primary" data-element="empty_link" data-pb-style="XJJ9A8Y"><span data-element="link_text">START COLLECTING DATA</span></div></div></div></div><div class="pagebuilder-column google-Analytics-4__image" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="I6Q6LPB"><figure class="google-Analytics-4__image" data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="OYHRM7F"><img class="pagebuilder-mobile-hidden" src="{{media url=wysiwyg/weltpixel-ga-4_1.png}}" alt="" title="" data-element="desktop_image" data-pb-style="JI4UQE1"><img class="pagebuilder-mobile-only" src="{{media url=wysiwyg/weltpixel-ga-4_1.png}}" alt="" title="" data-element="mobile_image" data-pb-style="APCA93T"></figure></div></div></div>',
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