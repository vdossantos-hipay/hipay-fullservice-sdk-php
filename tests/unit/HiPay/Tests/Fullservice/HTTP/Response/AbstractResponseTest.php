<?php
namespace HiPay\Tests\Fullservice\HTTP\Response;

use HiPay\Tests\TestCase;

/**
 * Test Abstract HTTP Response
 * 
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 */
class AbstractResponseTest extends TestCase
{
    
    protected $_abstractName = 'HiPay\Fullservice\HTTP\Response\AbstractResponse';
    
    /**
     * @covers \HiPay\Fullservice\HTTP\Response\AbstractResponse::__construct
     * @expectedException \HiPay\Fullservice\Exception\InvalidArgumentException
     */
    public function testCannotBeConstructFromNonStringValue(){
        
        $mock = $this->getAbstractMock($this->_abstractName);
        $this->getClassConstructor($this->_abstractName)->invoke($mock,null,500,array());
        
    }

    
    /**
     * @covers \HiPay\Fullservice\HTTP\Response\AbstractResponse::__construct
     * @expectedException \HiPay\Fullservice\Exception\InvalidArgumentException
     */
    public function testCannotBeConstructFromNonNumericValue(){
    
        $mock = $this->getAbstractMock($this->_abstractName);
        $this->getClassConstructor($this->_abstractName)->invoke($mock,'some string','status 500',array());
    
    }
    
    /**
     * @covers \HiPay\Fullservice\HTTP\Response\AbstractResponse::__construct
     * @expectedException PHPUnit_Framework_Error
     */
    public function testCannotBeConstructFromNonArrayValue(){
    
        $mock = $this->getAbstractMock($this->_abstractName);
        $this->getClassConstructor($this->_abstractName)->invoke($mock,'some string',500,'Content-Type: application/json');
    
    }
    
    /**
     * @covers \HiPay\Fullservice\HTTP\Response\AbstractResponse::__construct
     */
    public function testObjectBanBeConstructFromNumericStatusCodeArgument(){
        $mock = $this->getAbstractMock($this->_abstractName);
        $this->getClassConstructor($this->_abstractName)->invoke($mock,'some string','500',array());
    }
    
    /**
     * @covers \HiPay\Fullservice\HTTP\Response\AbstractResponse::__construct
     */
    public function testObjectBanBeConstructUsingValidArguments(){
        $mock = $this->getMockBuilder($this->_abstractName)->setConstructorArgs(array('body'=>'some string','statusCode'=>200,'headers'=>array()))->getMock();
        //$mock = $this->getAbstractMock($this->_abstractName);
        //$this->getClassConstructor($this->_abstractName)->invoke($mock,'some string',200,array());
            
        return $mock;
    }
 
    
}