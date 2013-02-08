<?php

/**
 * standard database table controller for Geocoder_ZipUs model
 */
class GeocoderZipUsCtrl extends App_DbTableCtrl
{
    /**
     * get class of the model
     * @return string
     */
    public function getClassName() 
    {
        return 'Geocoder_ZipUs';
    }
}