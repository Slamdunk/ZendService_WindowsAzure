<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Service_WindowsAzure
 * @subpackage Storage
 * @copyright  Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */

namespace Zend\Service\WindowsAzure\Storage;

use Zend\Service\WindowsAzure\Exception\UnknownPropertyException;

/**
 * @category                            Zend
 * @package                             Zend_Service_WindowsAzure
 * @subpackage                          Storage
 * @copyright                           Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license                             http://framework.zend.com/license/new-bsd     New BSD License
 *
 * @property string $MessageId          Message ID
 * @property string $InsertionTime      Insertion time
 * @property string $ExpirationTime     Expiration time
 * @property string $PopReceipt         Receipt verification for deleting the message from queue.
 * @property string $TimeNextVisible    Next time the message is visible in the queue
 * @property string $MessageText        Message text
 */
class QueueMessage
{
    /**
     * Data
     *
     * @var array
     */
    protected $_data = null;

    /**
     * Constructor
     *
     * @param string $messageId           Message ID
     * @param string $insertionTime       Insertion time
     * @param string $expirationTime      Expiration time
     * @param string $popReceipt          Receipt verification for deleting the message from queue.
     * @param string $timeNextVisible     Next time the message is visible in the queue
     * @param string $messageText         Message text
     */
    public function __construct($messageId, $insertionTime, $expirationTime, $popReceipt, $timeNextVisible,
                                $messageText)
    {
        $this->_data = array(
            'messageid'       => $messageId,
            'insertiontime'   => $insertionTime,
            'expirationtime'  => $expirationTime,
            'popreceipt'      => $popReceipt,
            'timenextvisible' => $timeNextVisible,
            'messagetext'     => $messageText
        );
    }

    /**
     * Magic overload for setting properties
     *
     * @param string $name     Name of the property
     * @param string $value    Value to set
     * @throws UnknownPropertyException
     * @return
     */
    public function __set($name, $value)
    {
        if (array_key_exists(strtolower($name), $this->_data)) {
            $this->_data[strtolower($name)] = $value;
            return;
        }

        throw new UnknownPropertyException('Unknown property: ' . $name);
    }

    /**
     * Magic overload for getting properties
     *
     * @param string $name  Name of the property
     * @throws UnknownPropertyException
     * @return
     */
    public function __get($name)
    {
        if (array_key_exists(strtolower($name), $this->_data)) {
            return $this->_data[strtolower($name)];
        }

        throw new UnknownPropertyException('Unknown property: ' . $name);
    }
}
