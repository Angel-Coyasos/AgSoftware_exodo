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
            "content" => '<style>#html-body [data-pb-style=FDW6ASH]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;align-self:stretch}#html-body [data-pb-style=QXPV7R3]{display:flex;width:100%}#html-body [data-pb-style=DWLG2KJ]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;width:50%;align-self:stretch}#html-body [data-pb-style=WNVTT4T]{text-align:left}#html-body [data-pb-style=OPM36KI]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;width:50%;align-self:stretch}#html-body [data-pb-style=VQYE4SH]{border-style:none}#html-body [data-pb-style=QJVBLW9],#html-body [data-pb-style=SJRN1V1]{max-width:100%;height:auto}@media only screen and (max-width: 768px) { #html-body [data-pb-style=VQYE4SH]{border-style:none} }</style><div class="pagebuilder-column-group google-Analytics-4" data-background-images="{}" data-content-type="column-group" data-appearance="default" data-grid-size="12" data-element="main" data-pb-style="FDW6ASH"><div class="pagebuilder-column-line" data-content-type="column-line" data-element="main" data-pb-style="QXPV7R3"><div class="pagebuilder-column google-Analytics-4__content" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="DWLG2KJ"><h2 class="google-Analytics-4__title" data-content-type="heading" data-appearance="default" data-element="main" data-pb-style="WNVTT4T">Google Analytics 4.</h2><h2 class="google-Analytics-4__subtitle" data-content-type="heading" data-appearance="default" data-element="main">Get Your Head Start.</h2><div class="google-Analytics-4__text" data-content-type="text" data-appearance="default" data-element="main"><p id="B4EYJF0">Starting <strong>July 1st, 2023, Universal Analytics properties will no longer be processing new data.</strong> If you still rely on Universal Analytics, it&apos;s important to get a head start and switch to using Google Analytics 4. Doing so will allow you to build historical data and usage in the property, ensuring continuity once Universal Analytics is no longer available.</p></div><div class="google-Analytics-4__container-buttons" data-content-type="html" data-appearance="default" data-element="main">&lt;a class="ancla-button" href="https://www.weltpixel.com/resources/PearlTheme/User-Guide-WeltPixel-Pearl-Theme-Magento2.html"&gt; 
  &lt;span&gt;START COLLECTING DATA&lt;/span&gt;
 &lt;/a&gt;</div></div><div class="pagebuilder-column google-Analytics-4__image" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="OPM36KI"><figure class="google-Analytics-4__image" data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="VQYE4SH"><img class="pagebuilder-mobile-hidden" src="{{media url=wysiwyg/weltpixel-ga-4_1.png}}" alt="" title="" data-element="desktop_image" data-pb-style="QJVBLW9"><img class="pagebuilder-mobile-only" src="{{media url=wysiwyg/weltpixel-ga-4_1.png}}" alt="" title="" data-element="mobile_image" data-pb-style="SJRN1V1"></figure></div></div></div>',
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