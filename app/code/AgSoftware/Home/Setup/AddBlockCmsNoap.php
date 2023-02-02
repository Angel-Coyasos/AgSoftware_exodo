<?php
/**
 * Copyright © N/A All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace AgSoftware\Home\Setup\Patch\Data;

use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;
use Magento\Framework\Stdlib\DateTime\Filter\Date;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;

class AddBlockCmsNoap implements DataPatchInterface, PatchRevertableInterface 
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
        \Magento\Framework\App\State $state,
        \Magento\Cms\Model\BlockFactory $cmsBlock//,
        //\Magento\Cms\Api\BlockRepositoryInterface $cmsRepository
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
            // "block_id" => "hola",
            "title" => "nopadding",
            "identifier" => "nopadding--2",
            "store_id" => "All Store Views",
            "content" => '<style>#html-body [data-pb-style=KEYI9EY]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;align-self:stretch}#html-body [data-pb-style=VVKMI0S]{display:flex;width:100%}#html-body [data-pb-style=EUDQXKP]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;width:50%;align-self:stretch}#html-body [data-pb-style=GVR6YUT]{border-style:none}#html-body [data-pb-style=H67G6FL],#html-body [data-pb-style=XP7UERS]{max-width:100%;height:auto}#html-body [data-pb-style=UF5ELS9]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;width:50%;align-self:stretch}@media only screen and (max-width: 768px) { #html-body [data-pb-style=GVR6YUT]{border-style:none} }</style><div class="pagebuilder-column-group container-awards" data-background-images="{}" data-content-type="column-group" data-appearance="default" data-grid-size="12" data-element="main" data-pb-style="KEYI9EY"><div class="pagebuilder-column-line" data-content-type="column-line" data-element="main" data-pb-style="VVKMI0S"><div class="pagebuilder-column container-awards__col--box" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="EUDQXKP"><figure data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="GVR6YUT"><img class="pagebuilder-mobile-hidden" src="{{media url=wysiwyg/Homepage-award.jpg}}" alt="" title="" data-element="desktop_image" data-pb-style="XP7UERS"><img class="pagebuilder-mobile-only" src="{{media url=wysiwyg/Homepage-award.jpg}}" alt="" title="" data-element="mobile_image" data-pb-style="H67G6FL"></figure></div><div class="pagebuilder-column container-awards__col--box padding" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="UF5ELS9"><h2 class="mg-top-title" data-content-type="heading" data-appearance="default" data-element="main">Magento</h2><h2 class="mg-top-title margin" data-content-type="heading" data-appearance="default" data-element="main">Awards.</h2><div data-content-type="html" data-appearance="default" data-element="main">&lt;P class="wpx-p aws-descr"&gt;
                        With over 50 retail locations, KicksUSA is one of the largest retailers 
                        of urban footwear and apparel on the East Coast of the United States. 
                        Using Cleo Theme and WeltPixel,
                        &lt;strong&gt;KicksUSA achieved a 60% sales growth&lt;/strong&gt;
                    and received the "2017 Impact Awards - Rising above the noise" for Analytics and Measurement.
                    &lt;/P&gt;
                    &lt;P class="wpx-p"&gt;
                        How KicksUSA boosted their bottom line while powered by WeltPixel solutions.
                    &lt;/P&gt;
                    &lt;a href="https://magento.com/customers/kicks-usa" target="_blank" class="read-more" rel="nofollow"&gt;
                        Read more..
                    &lt;/a&gt;</div></div></div></div>',
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
        //if($this->state->getAreaCode()) {
            $this->state->setAreaCode(\Magento\Framework\App\Area::AREA_ADMINHTML); // or \Magento\Framework\App\Area::AREA_FRONTEND, depending on your needs
        //}
        $cmsBlock->save();
        //$this->ruleRepository->save($catalogRule);

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
        return [
        ];
    }
    
}