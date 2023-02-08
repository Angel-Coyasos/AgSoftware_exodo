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

class AddBlockCmsCustomerDevelopment implements DataPatchInterface, PatchRevertableInterface 
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
            "title" => "customer development",
            "identifier" => "customer-development",
            "store_id" => "All Store Views",
            "content" => '<style>#html-body [data-pb-style=K3F9WAG]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=NCDIPK3]{text-align:center}</style><div data-content-type="row" data-appearance="contained" data-element="main"><div class="customer-development" data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="inner" data-pb-style="K3F9WAG"><div class="customer-development__title" data-content-type="html" data-appearance="default" data-element="main" data-pb-style="NCDIPK3">&lt;h2 class="customer-development--title"&gt;
            Magento Custom 
            &lt;br&gt;
            Development.
         &lt;/h2&gt;</div><div class="customer-development__content" data-content-type="html" data-appearance="default" data-element="main">&lt;div data-mage-init='{
             "collapsible":{
                 "animate":{ "duration" :1000, "easing":"easeOutCubic"}
             }}'&gt;
             &lt;div data-role="title"&gt;
                 &lt;img class="pagebuilder-mobile-only" src="https://www.weltpixel.com/media/wysiwyg/homepage-v2/Custom-development-PUR-Cosmetics-mobile-closed.png"&gt;
                 &lt;img class="pagebuilder-mobile-hidden" src="https://www.weltpixel.com/media/wysiwyg/homepage-v2/Custom-development-PUR-Cosmetics-dekstop-closed.png"&gt;
                 &lt;i class="title-buttons--close-expand"&gt;&lt;i&gt;
             &lt;/div&gt;
             &lt;div data-role="content"&gt;
                &lt;img class="pagebuilder-mobile-only" src="https://www.weltpixel.com/media/wysiwyg/homepage-v2/Custom-development-PUR-Csometics-mobile-expanded.png"&gt;
                &lt;img class="pagebuilder-mobile-hidden" src="https://www.weltpixel.com/media/wysiwyg/homepage-v2/Custom-development-PUR-Cosmetics-desktop-expanded.png"&gt;
             &lt;/div&gt;
         &lt;/div&gt;
         
         &lt;div data-mage-init='{
             "collapsible":{
                 "animate":{ "duration" :1000, "easing":"easeOutCubic"}
             }}'&gt;
             &lt;div data-role="title"&gt;
                 &lt;img class="pagebuilder-mobile-only" src="https://www.weltpixel.com/media/wysiwyg/homepage-v2/Workscene-22.png"&gt;
                 &lt;img class="pagebuilder-mobile-hidden" src="https://www.weltpixel.com/media/wysiwyg/homepage-v2/Homepage-v2_2_.png"&gt;
                  &lt;i class="title-buttons--close-expand"&gt;&lt;i&gt;
             &lt;/div&gt;
             &lt;div data-role="content"&gt;
                 &lt;img class="pagebuilder-mobile-only" src="https://www.weltpixel.com/media/wysiwyg/homepage-v2/Workscene-21.png"&gt;
                 &lt;img class="pagebuilder-mobile-hidden" src="https://www.weltpixel.com/media/wysiwyg/homepage-v2/Homepage-v21.png"&gt;
             &lt;/div&gt;
         &lt;/div&gt;
         
         &lt;div data-mage-init='{
             "collapsible":{
                 "animate":{ "duration" :1000, "easing":"easeOutCubic"}
             }}'&gt;
             &lt;div data-role="title"&gt;
                 &lt;img class="pagebuilder-mobile-only" src="https://www.weltpixel.com/media/wysiwyg/homepage-v2/Kicks--11.png"&gt;
                 &lt;img class="pagebuilder-mobile-hidden" src="https://www.weltpixel.com/media/wysiwyg/homepage-v2/kicks-2.png"&gt;
                 &lt;i class="title-buttons--close-expand"&gt;&lt;i&gt;
             &lt;/div&gt;
             &lt;div data-role="content"&gt;
                 &lt;img class="pagebuilder-mobile-only" src="https://www.weltpixel.com/media/wysiwyg/homepage-v2/Kicks--22.png"&gt;
                 &lt;img class="pagebuilder-mobile-hidden" src="https://www.weltpixel.com/media/wysiwyg/homepage-v2/kicks.png"&gt;
             &lt;/div&gt;
         &lt;/div&gt;
         
         </div></div></div>',
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