<?php
/**
 * Controller for wrapping suggestions
 */
class Geocoder_IndexCtrl extends App_DbTableCtrl
{
    /**
     * @ctrlparam country
     * @ctrlparam zip
     */
    public function suggestAction()
    {
        $arrResult = array();
        
        $strZip = $this->_getParam('zip');
        $strCountry = $this->_getParam('country');
        
        if ( $strCountry == 'US' ) {
            $objZip = Geocoder_ZipUs::Table()->fetchByZip( $strZip );
            if ( is_object( $objZip ) ) {
                $arrResult []= array( 
                    'country' => $strCountry,
                    'zip'     => $objZip->getZip(),
                    'city'    => $objZip->getCity(),
                    'state'   => $objZip->getState(),
                    'longitude' => $objZip->getLongitude(),
                    'latitude'  => $objZip->getLatitude(),
                );
            }
        } else if ( $strCountry == 'CA' ) {
            $lstZipCa = Geocoder_ZipCanada::Table()->findByZip( $strZip );
            foreach ( $lstZipCa as $objZipCa ) {
                $arrResult []= array( 
                    'country' => $strCountry,
                    'zip'     => $objZipCa->getZip(),
                    'city'    => $objZipCa->getCity(),
                    'state'   => $objZipCa->getState(),
                    'longitude' => $objZipCa->getLongitude(),
                    'latitude'  => $objZipCa->getLatitude(),
                );
            }
        }
        
        $this->view->result = $arrResult;
    }
}
