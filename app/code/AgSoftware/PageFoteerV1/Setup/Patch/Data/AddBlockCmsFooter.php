<?php
/**
 * Copyright © N/A All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace AgSoftware\PageFoteerV1\Setup\Patch\Data;

use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;
use Magento\Framework\Stdlib\DateTime\Filter\Date;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;

class AddBlockCmsFooter implements DataPatchInterface, PatchRevertableInterface 
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
            "title" => "footer weltpixel",
            "identifier" => "footer-weltpixel",
            "store_id" => "All Store Views",
            "content" => '<style>#html-body [data-pb-style=KM4J4AJ]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}</style><div data-content-type="row" data-appearance="contained" data-element="main"><div class="footer-container" data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="inner" data-pb-style="KM4J4AJ"><div class="footer-content" data-content-type="html" data-appearance="default" data-element="main">&lt;div class="block-title"&gt;
            &lt;h2 class="block-title--title"&gt;weltpixel runs on magento 2. built with pearl. theme&lt;/h2&gt;
          &lt;/div&gt;
          
          &lt;a href="https://www.weltpixel.com/magento-2-theme-pearl" class="block-ancla-btn"&gt;
            &lt;p class="block-ancla-btn--text"&gt;GRAB Your COPY Now!&lt;/p&gt;
          &lt;/a&gt;
          
          &lt;div class="block-columns"&gt;
          
            &lt;div class="block-columns__logo"&gt;
              &lt;img class="block-columns__logo--minilogo" src="{{media url=wysiwyg/magento_partner.png}}" alt="logo footer" /&gt;
              &lt;p class="block-columns__logo--text"&gt;© 2022 Weltpixel. All Rights Reserved.&lt;/p&gt;
              &lt;img  class="block-columns__logo--img-card" src="{{media url=wysiwyg/logo-creditcards.png}}" alt="credit cards" /&gt;
            &lt;/div&gt;
          
            &lt;div class="block-columns__services"&gt;
              &lt;ul class="block-columns__services--ul"&gt;
                &lt;li class="block-columns__services-links"&gt; 
                  &lt;a href="#" class="block-columns__services-links--ancla" target="_blank"&gt;Pearl - Magento 2 Theme&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class="block-columns__services-links"&gt; 
                  &lt;a href="#" class="block-columns__services-links--ancla" target="_blank"&gt;Magento 2 Extensions&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class="block-columns__services-links"&gt; 
                  &lt;a href="#" class="block-columns__services-links--ancla" target="_blank"&gt;Magento 1 Extensions&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class="block-columns__services-links"&gt; 
                  &lt;a href="#" class="block-columns__services-links--ancla" target="_blank"&gt;Magento Development&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class="block-columns__services-links"&gt; 
                  &lt;a href="#" class="block-columns__services-links--ancla" target="_blank"&gt;Magento 2 Migration Solutions&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class="block-columns__services-links"&gt; 
                  &lt;a href="#" class="block-columns__services-links--ancla" target="_blank"&gt;GA4 Server-Side Setup Guide&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class="block-columns__services-links"&gt; 
                  &lt;a href="#" class="block-columns__services-links--ancla" target="_blank"&gt;
                    &lt;br&gt;  
                  &lt;/a&gt;
                &lt;/li&gt;
                &lt;li class="block-columns__services-links"&gt; 
                  &lt;a href="#" class="block-columns__services-links--ancla" target="_blank"&gt;Partner Program&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class="block-columns__services-links"&gt; 
                  &lt;a href="#" class="block-columns__services-links--ancla" target="_blank"&gt;Partners&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class="block-columns__services-links"&gt; 
                  &lt;a href="#" class="block-columns__services-links--ancla" target="_blank"&gt;Blog&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class="block-columns__services-links"&gt; 
                  &lt;a href="#" class="block-columns__services-links--ancla" target="_blank"&gt;
                    &lt;br&gt;
                  &lt;/a&gt;
                &lt;/li&gt;
                &lt;li class="block-columns__services-links"&gt; 
                  &lt;a href="#" class="block-columns__services-links--ancla" target="_blank"&gt;Facebook Community&lt;/a&gt;
                &lt;/li&gt;
              &lt;/ul&gt;
            &lt;/div&gt;
          
            &lt;div class="block-columns__about"&gt;
                &lt;ul class="block-columns__about--ul"&gt;
                &lt;li class="block-columns__about-links"&gt; 
                  &lt;a href="#" class="block-columns__about-links--ancla" target="_blank"&gt;My Account&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class="block-columns__about-links"&gt; 
                  &lt;a href="#" class="block-columns__about-links--ancla" target="_blank"&gt;Cancelation and refund policy&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class="block-columns__about-links"&gt; 
                  &lt;a href="#" class="block-columns__about-links--ancla" target="_blank"&gt;Privacy Policy&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class="block-columns__about-links"&gt; 
                  &lt;a href="#" class="block-columns__about-links--ancla" target="_blank"&gt;Terms and Conditions&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class="block-columns__about-links"&gt; 
                  &lt;a href="#" class="block-columns__about-links--ancla" target="_blank"&gt;Legal notice&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class="block-columns__about-links"&gt; 
                  &lt;a href="#" class="block-columns__about-links--ancla" target="_blank"&gt;About Us&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class="block-columns__about-links"&gt; 
                  &lt;a href="#" class="block-columns__about-links--ancla" target="_blank"&gt;Careers&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class="block-columns__about-links"&gt; 
                  &lt;a href="#" class="block-columns__about-links--ancla" target="_blank"&gt;Support Center&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class="block-columns__about-links"&gt; 
                  &lt;a href="#" class="block-columns__about-links--ancla" target="_blank"&gt;Contact us&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class="block-columns__about-links"&gt; 
                  &lt;a href="#" class="block-columns__about-links--ancla" target="_blank"&gt;&lt;/a&gt;
                &lt;/li&gt;
              &lt;/ul&gt;
            &lt;/div&gt;
          
            &lt;div class="block-columns__information"&gt;
              &lt;h4 class="block-columns__information-title"&gt;Let`s Stay in touch!&lt;/h4&gt;
          
              &lt;div class="block-columns__information-icons"&gt;
          
                &lt;a class="icon-facebook" href="https://m.facebook.com/WeltPixel/"&gt;
                   &lt;i class="fa-brands fa-square-facebook icon-facebook--visible"&gt;&lt;/i&gt;
                   &lt;i class="fa-brands fa-square-facebook icon-facebook--transition"&gt;&lt;/i&gt;
                &lt;/a&gt;
          
                &lt;a class="icon-twitter" href="https://twitter.com/weltpixel"&gt;
                   &lt;i class="fa-brands fa-square-twitter icon-twitter--visible"&gt;&lt;/i&gt;
                   &lt;i class="fa-brands fa-square-twitter icon-twitter--transition"&gt;&lt;/i&gt;
                &lt;/a&gt;
          
                &lt;a class="icon-linkedin" href="https://www.linkedin.com/mwlite/company/weltpixel"&gt;
                   &lt;i class="fa-brands fa-linkedin icon-linkedin--visible"&gt;&lt;/i&gt;
                   &lt;i class="fa-brands fa-linkedin icon-linkedin--transition"&gt;&lt;/i&gt;
                &lt;/a&gt;
          
              &lt;/div&gt;
          
             &lt;!-- FOOTER NEWSLETTER BLOCK BEGIN --&gt;
                 &lt;div class="newsletter-subscribe"&gt;
                      &lt;form action="{{store url="newsletter/subscriber/new/"}}" method="post"
                        id="newsletter-footer" data-mage-init=`{"validation": {"errorClass": "mage-error"}}`&gt;
          
                             &lt;div class="form-group"&gt;
                                  &lt;input name="email" type="email" id="newsletter-bottom" placeholder="Enter your email address"
                                             data-validate="{required:true, `validate-email`:true}"
                                             class="input-text required-entry validate-email"/&gt;
                                   &lt;button class="button" title="Subscribe" type="submit"&gt;
                                          &lt;span&gt;Sign Up&lt;/span&gt;
                                   &lt;/button&gt;
                              &lt;/div&gt;
                       &lt;/form&gt;
                  &lt;/div&gt;
              &lt;!-- FOOTER NEWSLETTER BLOCK END --&gt;
          
              &lt;div class="block-columns__information-hq"&gt;
                &lt;p class="block-columns__information--title"&gt;HQ Office&lt;/p&gt;
                &lt;p class="block-columns__information--text"&gt;Philadelphia, PA 
                  &lt;span&gt;USA&lt;/span&gt;
                &lt;/p&gt;
              &lt;/div&gt;
              &lt;div class="block-columns__information-development"&gt;
                &lt;p class="block-columns__information--title"&gt;Development Office&lt;/p&gt;
                &lt;p class="block-columns__information--text"&gt;Cluj-Napoca, Romania
                  &lt;span&gt;Europe&lt;/span&gt;
                 &lt;/p&gt;
              &lt;/div&gt;
            &lt;/div&gt;
          
          &lt;/div&gt;
          
          &lt;div class="block-links-searchs"&gt;
            &lt;a href="#" class="links-searchs links-searchs--blue" target="_blank"&gt;Magento 2 Google Analytics 4 (GA4) With GTM Support&lt;/a&gt;
            &lt;a href="#" class="links-searchs links-searchs--blue" target="_blank"&gt;Magento 2 Banner Slider&lt;/a&gt;
            &lt;a href="#" class="links-searchs links-searchs--gray" target="_blank"&gt;Magento 2 Google Tag Manager Extension&lt;/a&gt;
            &lt;a href="#" class="links-searchs links-searchs--gray" target="_blank"&gt;Magento 2 Theme&lt;/a&gt;
            &lt;a href="#" class="links-searchs links-searchs--gray" target="_blank"&gt;Magento 2 Lazy Load Images &amp; Products&lt;/a&gt;
            &lt;a href="#" class="links-searchs links-searchs--gray" target="_blank"&gt;Magento 2 Ajax Add to Cart&lt;/a&gt;
            &lt;a href="#" class="links-searchs links-searchs--gray" target="_blank"&gt;Magento 2 Layered Navigation&lt;/a&gt;
            &lt;a href="#" class="links-searchs links-searchs--gray" target="_blank"&gt;Mega Menu Magento 2 Extension&lt;/a&gt;
            &lt;a href="#" class="links-searchs links-searchs--gray" target="_blank"&gt;Magento 2 Rich Snippets&lt;/a&gt;
            &lt;a href="#" class="links-searchs links-searchs--gray" target="_blank"&gt;Magento 2 Social Login Extension&lt;/a&gt;
            &lt;a href="#" class="links-searchs links-searchs--gray" target="_blank"&gt;Magento 2 Order Tracking&lt;/a&gt;
            &lt;a href="#" class="links-searchs links-searchs--gray" target="_blank"&gt;Magento 2 Page Speed Optimization Extension&lt;/a&gt;
            &lt;a href="#" class="links-searchs links-searchs--gray" target="_blank"&gt;Magento 2 Extensions &amp; Plugins&lt;/a&gt;
            &lt;a href="#" class="links-searchs links-searchs--gray" target="_blank"&gt;Magento 2 Newsletter Popup Extension&lt;/a&gt;
            &lt;a href="#" class="links-searchs links-searchs--gray" target="_blank"&gt;Magento 2 Instagram Feed Widget&lt;/a&gt;
            &lt;a href="#" class="links-searchs links-searchs--gray" target="_blank"&gt;Magento 2 infinite Scroll Extension&lt;/a&gt;
            &lt;a href="#" class="links-searchs links-searchs--gray" target="_blank"&gt;Magento 2 Transactional Emails&lt;/a&gt;
            &lt;a href="#" class="links-searchs links-searchs--gray" target="_blank"&gt;Wishlist Magento 2&lt;/a&gt;
            &lt;a href="#" class="links-searchs links-searchs--gray" target="_blank"&gt;Magento 2 Quick Cart Extension&lt;/a&gt;
            &lt;a href="#" class="links-searchs links-searchs--gray" target="_blank"&gt;Magento 2 Search Extension&lt;/a&gt;
            &lt;a href="#" class="links-searchs links-searchs--gray" target="_blank"&gt;Magento 2 Product Labels Extension&lt;/a&gt;
            &lt;a href="#" class="links-searchs links-searchs--gray" target="_blank"&gt;Magento 2 Google XML Sitemap&lt;/a&gt;
          &lt;/div&gt;</div></div></div>',
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
            \AgSoftware\PageFoteerV1\Setup\Patch\Data\AddBlockCmsPreFooter::class
        ];
    }
    
}