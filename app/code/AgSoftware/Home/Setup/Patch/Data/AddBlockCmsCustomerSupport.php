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

class AddBlockCmsCustomerSupport implements DataPatchInterface, PatchRevertableInterface 
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
            "title" => "customer support",
            "identifier" => "customer-support",
            "store_id" => "All Store Views",
            "content" => '<style>#html-body [data-pb-style=TAAJJ27]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;align-self:stretch}#html-body [data-pb-style=IF6YV88]{display:flex;width:100%}#html-body [data-pb-style=NHH057I]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;width:50%;align-self:stretch}#html-body [data-pb-style=P7PNTPC]{border-style:none}#html-body [data-pb-style=FBEX5OM],#html-body [data-pb-style=SSU0R9R]{max-width:100%;height:auto}#html-body [data-pb-style=IQVDLKH]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;width:50%;align-self:stretch}@media only screen and (max-width: 768px) { #html-body [data-pb-style=P7PNTPC]{border-style:none} }</style><div class="pagebuilder-column-group customer-support" data-background-images="{}" data-content-type="column-group" data-appearance="default" data-grid-size="12" data-element="main" data-pb-style="TAAJJ27"><div class="pagebuilder-column-line" data-content-type="column-line" data-element="main" data-pb-style="IF6YV88"><div class="pagebuilder-column customer-support__image" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="NHH057I"><figure class="customer-support--image" data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="P7PNTPC"><img class="pagebuilder-mobile-hidden" src="{{media url=wysiwyg/section_8.png}}" alt="" title="" data-element="desktop_image" data-pb-style="SSU0R9R"><img class="pagebuilder-mobile-only" src="{{media url=wysiwyg/section_8.png}}" alt="" title="" data-element="mobile_image" data-pb-style="FBEX5OM"></figure></div><div class="pagebuilder-column customer-support__content" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="IQVDLKH"><div class="customer-support__content--container" data-content-type="html" data-appearance="default" data-element="main">&lt;h2&gt;
   PAYMENT. FRAUD 
   &lt;br&gt;
   DETECTION. TAX 
   &lt;br&gt;
   AUTOMATION. 
   &lt;br&gt;
   CUSTOMER SUPPORT.
&lt;/h2&gt;

&lt;div id="accordion" data-mage-init='{
        "accordion":{
            "active": [0],
            "collapsible": false,
            "openedState": "active",
            "multipleCollapsible": false
        }}'&gt;
    &lt;div data-role="collapsible" class="fist-item"&gt;
        &lt;div data-role="trigger"&gt;
            &lt;p&gt;PayPal, First Data... you name it, we integrate&lt;/p&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div data-role="content"&gt;
      &lt;p&gt;
         We&lsquo;ve integrated with the most known 3rd party service providers and created automations that save our customers time and money!
      &lt;/p&gt;
    &lt;/div&gt;

&lt;div data-role="collapsible"&gt;
        &lt;div data-role="trigger"&gt;
            &lt;p&gt;Fraud Detection with minFraud&lt;/p&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div data-role="content"&gt;
      &lt;p&gt;
         The minFraud service determines the likelihood that a transaction is fraudulent based on many factors, including whether an online transaction comes from a high risk IP address, high risk email, high risk device, or anonymizing proxy. One of the key features of the minFraud service is the minFraud Network, which allows MaxMind to establish the reputations of IP addresses, emails, and other parameters.
      &lt;/p&gt;
      &lt;p&gt;
         Key features of the minFraud service include:
      &lt;/p&gt;
      &lt;p class="margin-0"&gt;
         The riskScore (The likelihood that a transaction is fraudulent)
      &lt;/p&gt;
      &lt;p class="margin-0"&gt;
         Geographical IP address location checking
      &lt;/p&gt;
      &lt;p class="margin-0"&gt;
         High risk IP address and email checking
      &lt;/p&gt;
      &lt;p class="margin-0"&gt;
         Bank Identification Number (BIN) to country matching
      &lt;/p&gt;
      &lt;p class="margin-0"&gt;
         The minFraud Network
      &lt;/p&gt;
      &lt;p class="margin-0"&gt;
         Prepaid and gift card identification
      &lt;/p&gt;
      &lt;p class="margin-0"&gt;
         Post query analysis
      &lt;/p&gt;
      &lt;p class="margin-0"&gt;
         Prices start at $0.005 per transaction
      &lt;/p&gt;
      &lt;p class="margin-0"&gt;
         For more details check out our 
         &lt;a href="https://www.weltpixel.com/magento2-maxmind-fraud-prevention-minfraud.html" target="_blank"&gt;Magento 2 Maxmind Fraud Prevention Extension&lt;/a&gt;
      &lt;/p&gt;
      
    &lt;/div&gt;


    &lt;div data-role="collapsible"&gt;
        &lt;div data-role="trigger"&gt;
            &lt;p&gt;Tax Automation with Avalara or TaxJar&lt;/p&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div data-role="content"&gt; 
      &lt;p&gt;
         Tax calculation is one of the most frustrating steps to managing transactional tax – and the first place where something is likely to go wrong. Knowing when you have to apply tax, which type of tax, what rate, and what tax rules apply can be daunting, especially if you’re relying on people or basic software or systems to do it for you. Relax. We’ve got your back. Avalara’s automated tax calculation engines are powerful and proven accurate. Which means you not only reduce risk, but save time and money too. Leave the taxing parts of business to us and get back to calculating what really matters to you – profits.
      &lt;/p&gt;
    &lt;/div&gt;

&lt;div data-role="collapsible"&gt;
        &lt;div data-role="trigger"&gt;
            &lt;p&gt;Customer Support with Zendesk&lt;/p&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div data-role="content"&gt;
      &lt;p&gt;
         Businesses are made of relationships! Integrate you Ecommerce store with Chat, Voice and even Facebook Messanger!
      &lt;/p&gt;
      &lt;p class="margin-0"&gt;
          &lt;b&gt;Support&lt;/b&gt;
          - An elegant customer service system for dealing with inbound ticket requests from any channel — email, web, social, phone, or chat.
      &lt;/p&gt;
      &lt;p class="margin-0"&gt;
          &lt;b&gt;Self Service&lt;/b&gt;
           - An easy way for users to help themselves, quickly find what they need, and minimize their frustration.
      &lt;/p&gt;
      &lt;p class="margin-0"&gt;
          &lt;b&gt;Engagement&lt;/b&gt;
           - A feature suite that gives you data and insights to build customer relationships that are more meaningful, personal, and productive.
      &lt;/p&gt;
    &lt;/div&gt;

&lt;/div&gt;</div></div></div></div>',
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