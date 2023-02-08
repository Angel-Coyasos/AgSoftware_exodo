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

class AddBlockCmsMarketingMerchandising implements DataPatchInterface, PatchRevertableInterface 
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
            "title" => "marketing merchandising",
            "identifier" => "marketing-merchandising",
            "store_id" => "All Store Views",
            "content" => '<style>#html-body [data-pb-style=L4CHTBV]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;align-self:stretch}#html-body [data-pb-style=IJDCIRI]{display:flex;width:100%}#html-body [data-pb-style=HELP7PL],#html-body [data-pb-style=IWU7FNI]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;width:50%;align-self:stretch}#html-body [data-pb-style=HPY6T2Q]{border-style:none}#html-body [data-pb-style=Q0J8OUD],#html-body [data-pb-style=TAC4XOR]{max-width:100%;height:auto}@media only screen and (max-width: 768px) { #html-body [data-pb-style=HPY6T2Q]{border-style:none} }</style><div class="pagebuilder-column-group marketing-merchandising" data-background-images="{}" data-content-type="column-group" data-appearance="default" data-grid-size="12" data-element="main" data-pb-style="L4CHTBV"><div class="pagebuilder-column-line" data-content-type="column-line" data-element="main" data-pb-style="IJDCIRI"><div class="pagebuilder-column marketing-merchandising__content" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="IWU7FNI"><div class="marketing-merchandising__content--container" data-content-type="html" data-appearance="default" data-element="main">&lt;h2&gt;
            MARKETING &amp; 
            &lt;br&gt;
            MERCHANDISING.
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
                     &lt;p&gt;Social Integration&lt;/p&gt;
                 &lt;/div&gt;
             &lt;/div&gt;
             &lt;div data-role="content"&gt;
               &lt;b&gt;
                  Customers hate creating accounts and having to remember usernames and passwords. This one of the biggest drop-off step for your store! Your customers also want to see that your products are appreciated and shared on social media!
               &lt;/b&gt;
               &lt;p&gt;
                  Make Login faster and easier with Facebook, Amazon, Google, Twitter and Instagram.
         Place share buttons on Product Pages, Look books and help your customers to easily share whenever you have a new release, promotion or a Big Sales
         Showcase on your Home Page, Collection, Look book and Product Page how your products are loved on Social Media and gain Social Proof!
               &lt;/p&gt;
             &lt;/div&gt;
         
             &lt;div data-role="collapsible"&gt;
                 &lt;div data-role="trigger"&gt;
                     &lt;p&gt;Highly customizable product feeds for Google and Facebook&lt;/p&gt;
                 &lt;/div&gt;
             &lt;/div&gt;
             &lt;div data-role="content"&gt; 
               &lt;p&gt;
                  Publication of your product feed to Google and Facebook will allow you to attract more new buyers to your store. These feeds often are very complex and hard to manage, we are here to help you create the prefect the feed so you can start selling your products tomorrow
               &lt;/p&gt;
             &lt;/div&gt;
         
         &lt;div data-role="collapsible"&gt;
                 &lt;div data-role="trigger"&gt;
                     &lt;p&gt;Product SEO - Rich Snippets&lt;/p&gt;
                 &lt;/div&gt;
             &lt;/div&gt;
             &lt;div data-role="content"&gt;
               &lt;p&gt;
                  Rich Snippets is the term used to describe structured data markup that site operators can add to their existing HTML, which in turn allow search engines to better understand what information is contained on each web page.
               &lt;/p&gt;
             &lt;/div&gt;
         
         &lt;div data-role="collapsible"&gt;
                 &lt;div data-role="trigger"&gt;
                     &lt;p&gt;Email Integration &amp; Automation&lt;/p&gt;
                 &lt;/div&gt;
             &lt;/div&gt;
             &lt;div data-role="content"&gt;
               &lt;p&gt;
                  You can create targeted campaigns, automate helpful product follow-ups, and send back-in-stock messaging. Learn what your customers are purchasing, then send them better email.
               &lt;/p&gt;
               &lt;p&gt;
                  Robust marketing automation makes sure your emails get to the right people at the right time. Target customers based on behavior, preferences, and previous sales.
               &lt;/p&gt;
                &lt;p&gt;
                  Advanced reporting features you can access anywhere. Monitor sales and website activity with revenue reports, and inform your email content with purchase data using Google Analytics.
               &lt;/p&gt;
             &lt;/div&gt;
         
         &lt;div data-role="collapsible"&gt;
                 &lt;div data-role="trigger"&gt;
                     &lt;p&gt;Product Reviews trusted by Google&lt;/p&gt;
                 &lt;/div&gt;
             &lt;/div&gt;
             &lt;div data-role="content"&gt;
               &lt;b&gt;
                   63% of customers are more likely to make a purchase from a site which has user reviews
               &lt;/b&gt;
               &lt;p&gt;
                  Consumer reviews are significantly more trusted (nearly 12 times more) than descriptions that come from manufacturers.
               &lt;/p&gt;
                &lt;p&gt;
                  Did you know that Product Reviews trusted by Google can save money on Google Advertising?
         We will integrate your store with the most powerful review systems available! Increase your Click-Through-Rate on Google Advertising and beat your competition!
               &lt;/p&gt;
             &lt;/div&gt;
         
         &lt;div data-role="collapsible"&gt;
                 &lt;div data-role="trigger"&gt;
                     &lt;p&gt;Become a Google Trusted Stores!&lt;/p&gt;
                 &lt;/div&gt;
             &lt;/div&gt;
             &lt;div data-role="content"&gt;
               &lt;b&gt;
         Becoming a Google Trusted Stores will increase your Conversion Rate and decrease your Paid Advertising cost!
               &lt;/b&gt;
               &lt;p&gt;
                  We did the integration and we analyzed the results!
               &lt;/p&gt;
             &lt;/div&gt;
         
         &lt;div data-role="collapsible"&gt;
                 &lt;div data-role="trigger"&gt;
                     &lt;p&gt;One Page Checkout Integration Ready&lt;/p&gt;
                 &lt;/div&gt;
             &lt;/div&gt;
             &lt;div data-role="content"&gt;
               &lt;b&gt;
         1 in 10 people who abandon their cart do so because the checkout process is too long. Reduce cart abandonment by offering the entire purchase process on a single page.
               &lt;/b&gt;
               &lt;p&gt;
                  A lack of transparency and the request for upfront details when purchasing online is the biggest cause of drop offs according ecommerce polls. The research polled over 1,200 online users, asking why they would abandon an order when shopping online. The results were:
               &lt;/p&gt;
               &lt;p&gt;
                  Having to register before buying – 29%
               &lt;/p&gt;
               &lt;p&gt;
                  Hidden charges at the checkout – 41%
               &lt;/p&gt;
               &lt;p&gt;
                  Lengthy checkout process – 10%
               &lt;/p&gt;
               &lt;p&gt;
                  Not clear delivery details – 11%
               &lt;/p&gt;
               &lt;p&gt;
                  Phone number not provided on website – 8%
               &lt;/p&gt;
             &lt;/div&gt;
         
         &lt;div data-role="collapsible"&gt;
                 &lt;div data-role="trigger"&gt;
                     &lt;p&gt;Google Analytics and Google Tag Manager enabled&lt;/p&gt;
                 &lt;/div&gt;
             &lt;/div&gt;
             &lt;div data-role="content"&gt;
               &lt;p&gt;
                  Google Tag Manager for Magento with full support for Google Analytics Enhanced Ecommerce, AdWords Dynamic Remarketing, AdWords Conversion Tracking, Social Network interaction tracking, Facebook Custom Audiences Pixel, Custom Dimensions, User ID data acquisition and User Timings Tracking.
               &lt;/p&gt;
               &lt;p&gt;
                  Track product impressions, product detail views, add to cart actions, remove from cart actions, checkout steps, refunds, purchases and promotions performance in Magento with Google Tag Manager/p&gt;.
               &lt;/p&gt;
             &lt;/div&gt;
         
         &lt;/div&gt;
         </div></div><div class="pagebuilder-column marketing-merchandising__image" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="HELP7PL"><figure data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="HPY6T2Q"><img class="pagebuilder-mobile-hidden" src="{{media url=wysiwyg/section_6.png}}" alt="" title="" data-element="desktop_image" data-pb-style="TAC4XOR"><img class="pagebuilder-mobile-only" src="{{media url=wysiwyg/section_6.png}}" alt="" title="" data-element="mobile_image" data-pb-style="Q0J8OUD"></figure></div></div></div>',
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