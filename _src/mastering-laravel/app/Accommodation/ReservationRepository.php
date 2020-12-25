<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 19/06/15
 * Time: 2.19
 */

namespace MyCompany\Accommodation;


class ReservationRepository implements  RepositoryInterface {
    private $reservation;

    function __construct($reservationModel)
    {
        $this->reservationModel = $reservationModel;
    }

    public function create($attributes)
    {

        $modelAttributes= array_except($attributes, array('rooms'));

        $reservation = $this->reservationModel->create($modelAttributes);
        if (isset($attributes['rooms']) ) {
            $reservation->rooms()->sync($attributes['rooms']);
        }
        return $reservation;
    }
}