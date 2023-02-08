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

class AddBlockCmsSupportDocumentation implements DataPatchInterface, PatchRevertableInterface 
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
            "title" => "support documentation",
            "identifier" => "support-documentation",
            "store_id" => "All Store Views",
            "content" => '<style>#html-body [data-pb-style=B3C679A]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;align-self:stretch}#html-body [data-pb-style=QA23H5F]{display:flex;width:100%}#html-body [data-pb-style=BDJ1KJY],#html-body [data-pb-style=EVCOEA6]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;width:50%;align-self:stretch}#html-body [data-pb-style=L82FWQ5]{border-style:none}#html-body [data-pb-style=KBMQ8SM],#html-body [data-pb-style=XGUWORY]{max-width:100%;height:auto}@media only screen and (max-width: 768px) { #html-body [data-pb-style=L82FWQ5]{border-style:none} }</style><div class="pagebuilder-column-group support-documentation" data-background-images="{}" data-content-type="column-group" data-appearance="default" data-grid-size="12" data-element="main" data-pb-style="B3C679A"><div class="pagebuilder-column-line" data-content-type="column-line" data-element="main" data-pb-style="QA23H5F"><div class="pagebuilder-column support-documentation__content" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="BDJ1KJY"><h2 class="support-documentation--title title__the-best" data-content-type="heading" data-appearance="default" data-element="main">The best </h2><h2 class="support-documentation--subtitle" data-content-type="heading" data-appearance="default" data-element="main">Magento 2 Documentation. Support Center.</h2><div class="support-documentation--text text-one" data-content-type="text" data-appearance="default" data-element="main"><p>Faced a problem? No worries! If it&lsquo;s something you cannot figure out our</p></div><div class="support-documentation--text text-two" data-content-type="text" data-appearance="default" data-element="main"><p>extended documentation and support center is there to help you!</p></div><div class="support-documentation--text text-three" data-content-type="text" data-appearance="default" data-element="main"><p>Also the support team is always happy to help!</p></div><div class="support-documentation__container-buttons" data-content-type="html" data-appearance="default" data-element="main">&lt;a class="ancla-button theme-documentation" href="https://www.weltpixel.com/resources/PearlTheme/User-Guide-WeltPixel-Pearl-Theme-Magento2.html"&gt; 
  &lt;span&gt;theme documentation&lt;/span&gt;
 &lt;/a&gt;

  &lt;a class="ancla-button support-center" href="https://support.weltpixel.com/hc/en-us"&gt; 
   &lt;span&gt;Support center&lt;/span&gt;
  &lt;/a&gt;</div></div><div class="pagebuilder-column support-documentation__image" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="EVCOEA6"><figure data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="L82FWQ5"><a href="https://support.weltpixel.com/hc/en-us" target="_blank" data-link-type="default" title="" data-element="link"><img class="pagebuilder-mobile-hidden" src="{{media url=wysiwyg/Documentation.png}}" alt="" title="" data-element="desktop_image" data-pb-style="XGUWORY"><img class="pagebuilder-mobile-only" src="{{media url=wysiwyg/Documentation.png}}" alt="" title="" data-element="mobile_image" data-pb-style="KBMQ8SM"></a></figure></div></div></div>',
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