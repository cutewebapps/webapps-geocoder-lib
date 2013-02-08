<?php
/**
  * table of US ZIPs. Provided by Geocoder.ca
  * 
  * related classes: Geocoder_ZipUsCtrl
  */
class Geocoder_ZipUs_Table extends DBx_Table
{
    /**
     * database table name
     * @var string
     */
    protected $_name='geocoder_zip5';
    /**
     * database table primary key
     * @var string
     */
    protected $_primary='zip5';
    
    /**
     * @param string $strZip 5-digit ZIP
     * @return Geocoder_ZipUs
     */
    public function fetchByZip( $strZip )
    {
        return $this->find( sprintf( "%05s", $strZip ) )->current();
    }
}
/**
 * class of the rowset
 */
class Geocoder_ZipUs_List extends DBx_Table_Rowset
{
}

/**
 * class for extending form filtration
 */
class Geocoder_ZipUs_Form_Filter extends App_Form_Filter
{
    /**
     * specify elements that could be filtered with standard controller
     * @return void
     */
    public function createElements()
    {
        $this->allowFiltering( array( ) );
    }
}

/**
 * class for extending editing procedures
 */
class Geocoder_ZipUs_Form_Edit extends App_Form_Edit
{
    /**
     * specify elements that could be edited with standard controller
     * @return void
     */
    public function createElements()
    {
        $this->allowEditing(array(  ) );
    }
}

/**
 * class of the database row
 */
class Geocoder_ZipUs extends DBx_Table_Row
{
    /** 
      * Get class name - for php 5.2 compatibility
      * @return string 
      */
    public static function getClassName() { return 'Geocoder_ZipUs'; }
    /** 
      * Get table class object 
      * @return string 
      */
    public static function TableClass() { return self::getClassName().'_Table'; }
    /** 
      *  Get table class instance
      *  @return Geocoder_ZipUs_Table 
      */
    public static function Table() { $strClass = self::TableClass();  return new $strClass; }
    /** 
      * get table name 
      * @return string 
      */
    public static function TableName() { return self::Table()->getTableName(); }
    /** 
      * get class name for the specified form ("Filter" or "Edit")
      * @return string 
      */
    public static function FormClass( $name ) { return self::getClassName().'_Form_'.$name; }
    /** 
      * get class instance for the specified form ("Filter" or "Edit")
      *  @return mixed 
      */
    public static function Form( $name ) { $strClass = self::getClassName().'_Form_'.$name; return new $strClass; }
    

    /**
     * Get 5 digit ZIP
     * @return string
     */
    public function getZip()
    {
        return $this->zip5;
    }
    /**
     * Get name of the city for that ZIP
     * @return string
     */
    public function getCity()
    {
        return strtoupper( $this->city );
    }
    /**
     * Get name of the city for that ZIP
     * @return string
     */
    public function getState()
    {
        return strtoupper( $this->state );
    }
    /**
     * Get latitude of approximate coordinates
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }
   /**
     * Get longitude of approximate coordinates
     * in database, longitude is positive for some reason. 
     * @return float
     */
    public function getLongitude()
    {
        return - $this->longitude;
    }
    
}
