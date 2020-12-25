<?php

namespace spec\MyCompany\Accommodation;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReservationValidatorSpec extends ObjectBehavior
{

    function its_start_date_must_come_before_the_end_date($start_date,$end_date,$room)
    {
        $rooms = [$room];
        $start_date = '2015-06-03';
        $end_date = '2015-06-03';
        $this->shouldThrow('\InvalidArgumentException')->duringValidate( $start_date, $end_date, $rooms);
    }


    function it_creates_a_reservation( $start_date, $end_date, $room)
    {
        $reservation_number="ABC123";
        $rooms_array= [$room];
        $start_date = '2015-06-03';
        $end_date = '2015-06-04';
        $this->validate($start_date,$end_date,$rooms_array,$reservation_number)->shouldBe($this);
        $this->validate($start_date,$end_date,$rooms_array,$reservation_number)->shouldBeObject();
        $this->validate($start_date,$end_date,$rooms_array,$reservation_number)->shouldNotBeString();
    }

    function it_cannot_be_made_for_more_than_fifteen_days( $start_date, $end_date, $room)
    {
        $start_date = '2015-06-01';
        $end_date = '2015-07-30';
        $rooms = [$room];
        $this->shouldThrow('\InvalidArgumentException')->duringValidate($start_date,$end_date,$rooms);

    }


    function it_gives_an_error_message_when_sent_wrong_parameters($start_date, $end_date, $room)
    {
        $reservation_number="ABC123";
        $start_date = '2015-06-03';
        $end_date = '2015-06-04';
        $this->shouldThrow('\InvalidArgumentException')->duringValidate( $start_date, $end_date, $room);
    }


    function it_cannot_contain_than_four_rooms( $start_date, $end_date, $room1, $room2, $room3, $room4,$room5)
    {
        $reservation_number="ABC123";
        $start_date = '2015-06-03';
        $end_date = '2015-06-06';
        $rooms = [$room1, $room2, $room3, $room4, $room5];
        $this->shouldThrow('\InvalidArgumentException')->duringValidate($start_date,$end_date,$rooms,$reservation_number);
    }

}
