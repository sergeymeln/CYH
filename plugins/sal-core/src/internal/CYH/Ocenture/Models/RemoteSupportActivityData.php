<?php

namespace CYH\Ocenture\Models;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for RemoteSupportActivityData Models
 * @subpackage Structs
 */
class RemoteSupportActivityData extends AbstractStructBase
{
    /**
     * The CaseID
     * @var int
     */
    public $CaseID;
    /**
     * The Issue
     * @var string
     */
    public $Issue;
    /**
     * The Duration
     * @var int
     */
    public $Duration;
    /**
     * The Started
     * @var string
     */
    public $Started;
    /**
     * The Ended
     * @var string
     */
    public $Ended;
    /**
     * The Memo
     * @var string
     */
    public $Memo;
    /**
     * The Notes
     * @var string
     */
    public $Notes;
    /**
     * Constructor method for RemoteSupportActivityData
     * @uses RemoteSupportActivityData::setCaseID()
     * @uses RemoteSupportActivityData::setIssue()
     * @uses RemoteSupportActivityData::setDuration()
     * @uses RemoteSupportActivityData::setStarted()
     * @uses RemoteSupportActivityData::setEnded()
     * @uses RemoteSupportActivityData::setMemo()
     * @uses RemoteSupportActivityData::setNotes()
     * @param int $caseID
     * @param string $issue
     * @param int $duration
     * @param string $started
     * @param string $ended
     * @param string $memo
     * @param string $notes
     */
    public function __construct($caseID = null, $issue = null, $duration = null, $started = null, $ended = null, $memo = null, $notes = null)
    {
        $this
            ->setCaseID($caseID)
            ->setIssue($issue)
            ->setDuration($duration)
            ->setStarted($started)
            ->setEnded($ended)
            ->setMemo($memo)
            ->setNotes($notes);
    }
    /**
     * Get CaseID value
     * @return int|null
     */
    public function getCaseID()
    {
        return $this->CaseID;
    }
    /**
     * Set CaseID value
     * @param int $caseID
     * @return \CYH\Ocenture\Models\RemoteSupportActivityData
     */
    public function setCaseID($caseID = null)
    {
        // validation for constraint: int
        if (!is_null($caseID) && !is_numeric($caseID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($caseID)), __LINE__);
        }
        $this->CaseID = $caseID;
        return $this;
    }
    /**
     * Get Issue value
     * @return string|null
     */
    public function getIssue()
    {
        return $this->Issue;
    }
    /**
     * Set Issue value
     * @param string $issue
     * @return \CYH\Ocenture\Models\RemoteSupportActivityData
     */
    public function setIssue($issue = null)
    {
        // validation for constraint: string
        if (!is_null($issue) && !is_string($issue)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($issue)), __LINE__);
        }
        $this->Issue = $issue;
        return $this;
    }
    /**
     * Get Duration value
     * @return int|null
     */
    public function getDuration()
    {
        return $this->Duration;
    }
    /**
     * Set Duration value
     * @param int $duration
     * @return \CYH\Ocenture\Models\RemoteSupportActivityData
     */
    public function setDuration($duration = null)
    {
        // validation for constraint: int
        if (!is_null($duration) && !is_numeric($duration)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($duration)), __LINE__);
        }
        $this->Duration = $duration;
        return $this;
    }
    /**
     * Get Started value
     * @return string|null
     */
    public function getStarted()
    {
        return $this->Started;
    }
    /**
     * Set Started value
     * @param string $started
     * @return \CYH\Ocenture\Models\RemoteSupportActivityData
     */
    public function setStarted($started = null)
    {
        // validation for constraint: string
        if (!is_null($started) && !is_string($started)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($started)), __LINE__);
        }
        $this->Started = $started;
        return $this;
    }
    /**
     * Get Ended value
     * @return string|null
     */
    public function getEnded()
    {
        return $this->Ended;
    }
    /**
     * Set Ended value
     * @param string $ended
     * @return \CYH\Ocenture\Models\RemoteSupportActivityData
     */
    public function setEnded($ended = null)
    {
        // validation for constraint: string
        if (!is_null($ended) && !is_string($ended)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($ended)), __LINE__);
        }
        $this->Ended = $ended;
        return $this;
    }
    /**
     * Get Memo value
     * @return string|null
     */
    public function getMemo()
    {
        return $this->Memo;
    }
    /**
     * Set Memo value
     * @param string $memo
     * @return \CYH\Ocenture\Models\RemoteSupportActivityData
     */
    public function setMemo($memo = null)
    {
        // validation for constraint: string
        if (!is_null($memo) && !is_string($memo)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($memo)), __LINE__);
        }
        $this->Memo = $memo;
        return $this;
    }
    /**
     * Get Notes value
     * @return string|null
     */
    public function getNotes()
    {
        return $this->Notes;
    }
    /**
     * Set Notes value
     * @param string $notes
     * @return \CYH\Ocenture\Models\RemoteSupportActivityData
     */
    public function setNotes($notes = null)
    {
        // validation for constraint: string
        if (!is_null($notes) && !is_string($notes)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($notes)), __LINE__);
        }
        $this->Notes = $notes;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \CYH\Ocenture\Models\RemoteSupportActivityData
     */
    public static function __set_state(array $array)
    {
        return parent::__set_state($array);
    }
    /**
     * Method returning the class name
     * @return string __CLASS__
     */
    public function __toString()
    {
        return __CLASS__;
    }
}
