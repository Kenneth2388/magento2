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
 * @copyright  Copyright (c) 2013 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Magento\Integration\Model;

/**
 * Integration model.
 *
 * @method \string getName()
 * @method Integration setName(\string $name)
 * @method \string getEmail()
 * @method Integration setEmail(\string $email)
 * @method \int getStatus()
 * @method Integration setStatus(\int $value)
 * @method \int getType()
 * @method Integration setType(\int $value)
 * @method \string getEndpoint()
 * @method Integration setEndpoint(\string $endpoint)
 * @method \string getCreatedAt()
 * @method Integration setCreatedAt(\string $createdAt)
 * @method \string getUpdatedAt()
 * @method Integration setUpdatedAt(\string $createdAt)
 */
class Integration extends \Magento\Core\Model\AbstractModel
{
    /**#@+
     * Integration Status values
     */
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    /**#@-*/

    /**#@+
     * Integration setup type
     */
    const TYPE_MANUAL = 0;
    const TYPE_CONFIG = 1;
    /**#@-*/

    /**#@+
     * Integration data key constants.
     */
    const ID = 'integration_id';
    const NAME = 'name';
    const EMAIL = 'email';
    const ENDPOINT = 'endpoint';
    const SETUP_TYPE = 'setup_type';
    /**#@-*/

    /**
     * @var \Magento\Stdlib\DateTime
     */
    protected $_dateTime;

    /**
     * @param \Magento\Core\Model\Context $context
     * @param \Magento\Core\Model\Registry $registry
     * @param \Magento\Stdlib\DateTime $dateTime
     * @param \Magento\Core\Model\Resource\AbstractResource $resource
     * @param \Magento\Data\Collection\Db $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Core\Model\Context $context,
        \Magento\Core\Model\Registry $registry,
        \Magento\Stdlib\DateTime $dateTime,
        \Magento\Core\Model\Resource\AbstractResource $resource = null,
        \Magento\Data\Collection\Db $resourceCollection = null,
        array $data = array()
    ) {
        $this->_dateTime = $dateTime;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init('Magento\Integration\Model\Resource\Integration');
    }

    /**
     * Prepare data to be saved to database
     *
     * @return \Magento\Integration\Model\Integration
     */
    protected function _beforeSave()
    {
        parent::_beforeSave();
        if ($this->isObjectNew()) {
            $this->setCreatedAt($this->_dateTime->formatDate(true));
        }
        $this->setUpdatedAt($this->_dateTime->formatDate(true));
        return $this;
    }
}
