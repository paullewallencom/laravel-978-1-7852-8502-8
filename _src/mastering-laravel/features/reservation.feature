Feature: Reserve Room
  In order to verify the reservation system
  As an accommodation reservation user
  I need to be able to create a reservation in the system
  Scenario: Reserve a Room
    When I create a reservation
    Then I should have one reservation
