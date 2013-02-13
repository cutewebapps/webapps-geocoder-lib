<?php

/**
  * table for the storage of  Canadian ZIPS.
  * in 99% cases ZIPS are 6 digits, without spaces.
  * but there are cases when ZIP is 7,8,or 10 digits in some regions!
  * 
  * Zips are not unique in this table!
  * 
  * related classes: Geocoder_ZipCanada
  */
class Geocoder_ZipCanada_Table extends DBx_Table
{
    /**
     * database table name
     * @var string
     */
    protected $_name='geocoder_canada';
    /**
     * database table primary key
     * @var string
     */
    protected $_primary='id';
    
    /**
     * get single record matching given ZIP
     * 
     * @param string $strZip canadian zip, min 6 chars
     * @return Geocoder_ZipCanada
     */
    public function fetchByZip( $strZip )
    {
        $select = $this->select()
                ->where( 'zip = ?', $strZip )
                ->where( 'city <> ?', '' );
        return $this->fetchRow( $select );
    }
    
    /**
     * get multiple records matching given ZIP
     * 
     * @param string $strZip candaian zip, min 6 chars
     * @return Geocoder_ZipCanada_List
     */
    public function findByZip( $strZip )
    {
        $select = $this->select()
                ->where( 'zip = ?', $strZip )
                ->where( 'city <> ?', '' );
        return $this->fetchAll( $select );
    }
}
/**
 * class of the rowset
 */
class Geocoder_ZipCanada_List extends DBx_Table_Rowset
{
}

/**
 * class for extending form filtration
 */
class Geocoder_ZipCanada_Form_Filter extends App_Form_Filter
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
class Geocoder_ZipCanada_Form_Edit extends App_Form_Edit
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
class Geocoder_ZipCanada extends DBx_Table_Row
{
    /** 
      * Get class name - for php 5.2 compatibility
      * @return string 
      */
    public static function getClassName() { return 'Geocoder_ZipCanada'; }
    /** 
      * Get table class object 
      * @return string 
      */
    public static function TableClass() { return self::getClassName().'_Table'; }
    /** 
      *  Get table class instance
      *  @return Geocoder_ZipCanada_Table 
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
      * @return mixed 
      */
    public static function Form( $name ) { $strClass = self::getClassName().'_Form_'.$name; return new $strClass; }
    
 /**
     * Get canadian ZIP
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
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
     * @return float
     */
    public function getLongitude()
    {
        return  $this->longitude;
    }
}
