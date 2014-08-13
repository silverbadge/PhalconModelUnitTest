<?php
namespace Silverbadge\Models;

use Phalcon\Mvc\Model;

class Popup extends Model
{
    /**
     *
     * @var integer
     */
    protected $Id;

    /**
     *
     * @var string
     */
    protected $Name;

    /**
     *
     * @var string
     */
    protected $Content;

    /**
     *
     * @var string
     */
    protected $CreatedAt;

    /**
     *
     * @var string
     */
    protected $LastUpdate;

    /**
     * @param string $Content
     *
     * @return Popup
     */
    public function setContent($Content)
    {
        $this->Content = $Content;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->Content;
    }

    /**
     * @param string $Name
     *
     * @return Popup
     */
    public function setName($Name)
    {
        $this->Name = $Name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param string $LastUpdate
     *
     * @return Popup
     */
    public function setLastUpdate($LastUpdate)
    {
        $this->LastUpdate = $LastUpdate;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastUpdate()
    {
        return $this->LastUpdate;
    }

    /**
     * @param int $Id
     *
     * @return Popup
     */
    public function setId($Id)
    {
        $this->Id = $Id;
        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @param string $CreatedAt
     *
     * @return Popup
     */
    public function setCreatedAt($CreatedAt)
    {
        $this->CreatedAt = $CreatedAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->CreatedAt;
    }

    public function getSchema()
    {
        return 'test';
    }

    public function getSource()
    {
        return 'Popup';
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->useDynamicUpdate(true);
    }
    
}
