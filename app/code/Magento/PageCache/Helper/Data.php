<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Magento
 * @package     Magento_PageCache
 * @copyright   Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Page cache data helper
 *
 * @category    Magento
 * @package     Magento_PageCache
 * @author      Magento Core Team <core@magentocommerce.com>
 */
namespace Magento\PageCache\Helper;

/**
 * Class Data
 * @package Magento\PageCache\Helper
 */
class Data extends \Magento\App\Helper\AbstractHelper
{
    /**
     * Private caching time one year
     */
    const PRIVATE_MAX_AGE_CACHE = 31536000;

    /**
     * XML path to value for public max-age parameter
     */
    const PUBLIC_MAX_AGE_PATH = 'system/headers/public-max-age';

    /**
     * @var \Magento\App\ConfigInterface
     */
    protected $config;

    /**
     * @param \Magento\App\Helper\Context $context
     * @param \Magento\App\ConfigInterface $config
     */
    public function __construct(\Magento\App\Helper\Context $context, \Magento\App\ConfigInterface $config)
    {
        parent::__construct($context);
        $this->config = $config;
    }

    /**
     * @return mixed
     */
    public function getPublicMaxAgeCache()
    {
        return $this->config->getValue(self::PUBLIC_MAX_AGE_PATH);
    }
}