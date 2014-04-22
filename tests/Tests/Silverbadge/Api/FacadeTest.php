<?php
/**
 * FacadeTest.php
 *
 * @author rami
 */

namespace Tests\Silverbadge\Api;

use Silverbadge\Api\Facade;
use Phalcon\Mvc\Model\Manager;
use Phalcon\Mvc\Model\Metadata\Files;
use Phalcon\DI;

class FacadeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provideDataForTestCreateApplication
     * @runInSeparateProcess
     */
    public function testCreateApplication($numRowsFound, $fetchAllData)
    {
        $di = New DI();
        $di->set('modelsManager', new Manager());
        $di->set('modelsMetadata', new Files(array('metaDataDir' => __DIR__ . '/../../../resources/')));
        $con = $this->getMock('\\Phalcon\\Db\\Adapter\\Pdo\\Mysql', array('getDialect', 'query', 'execute'), array(),'',false);
        $dialect = $this->getMock('\\Phalcon\\Db\\Dialect\\Mysql', array('select'), array(), '', false);
        $results = $this->getMock('\\Phalcon\\Db\\Result\\Pdo', array('numRows', 'setFetchMode', 'fetchall'), array(), '', false);
        $results->expects($this->any())
            ->method('numRows')
            ->will($this->returnValue($numRowsFound));

        $results->expects($this->any())
            ->method('fetchall')
            ->will($this->returnValue($fetchAllData));

        $dialect->expects($this->any())
            ->method('select');

        $con->expects($this->any())
            ->method('getDialect')
            ->will($this->returnValue($dialect));

        $con->expects($this->any())
            ->method('query')
            ->will($this->returnValue($results));

        $con->expects($this->any())
            ->method('execute');

        $di->set('db', $con);

        $facade = new Facade();
        $facade->setDI($di);

        $actual = $facade->createNewPopup('Test Popup','This is a test');

        $this->assertTrue(is_array($actual));
    }

    public function provideDataForTestCreateApplication()
    {
        return array(
            array(0, null),
            array(1, array(array())),
        );
    }
}
 