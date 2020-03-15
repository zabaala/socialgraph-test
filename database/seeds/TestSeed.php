<?php

use App\Domains\SocialGraph\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class TestSeed extends Seeder
{
    /**
     * @return array
     */
    private function usersData()
    {
        return array(
            array(
                'id' => 1,
                'first_name' => 'Paul',
                'surname' => 'Crowe',
                'age' => 28,
                'gender' => 'male',
                'connections' => array(2),
                'cities' => array(
                    'Dublin' => 80,
                    'New York' => 100,
                    'Paris' => 95,
                    'Madrid' => 100,
                    'London' => 80,
                    'Barcelona' => 100,
                    'Moscow' => 20
                )

            ),
            array(
                'id' => 2,
                'first_name' => 'Rob',
                'surname' => 'Fitz',
                'age' => 23,
                'gender' => 'male',
                'connections' => array(1, 3),
                'cities' => array('Dublin' => 40, 'New York' => 100, 'Paris' => 65, 'Madrid' => 90)
            ),
            array(
                'id' => 3,
                'first_name' => 'Ben',
                'surname' => "O'Carolan",
                'age' => null,
                'gender' => 'male',
                'connections' => array(2, 4, 5, 7),
                'cities' => array('Paris' => 90, 'Madrid' => 40, 'London' => 85, 'Barcelona' => 90, 'Moscow' => 80)
            ),
            array(
                'id' => 4,
                'first_name' => 'Victor',
                'surname' => '',
                'age' => 28,
                'gender' => 'male',
                'connections' => array(3),
                'cities' => array('Paris' => 80, 'Madrid' => 80, 'London' => 80, 'Barcelona' => 80, 'Moscow' => 40)
            ),
            array(
                'id' => 5,
                'first_name' => 'Peter',
                'surname' => 'Mac',
                'age' => 29,
                'gender' => 'male',
                'connections' => array(3, 6, 11, 10, 7),
                'cities' => array('Dublin' => 60, 'New York' => 100, 'Paris' => 75)
            ),
            array(
                'id' => 6,
                'first_name' => 'John',
                'surname' => 'Barry',
                'age' => 18,
                'gender' => 'male',
                'connections' => array(5),
                'cities' => array('London' => 80)
            ),
            array(
                'id' => 7,
                'first_name' => 'Sarah',
                'surname' => 'Lane',
                'age' => 30,
                'gender' => 'female',
                'connections' => array(3, 5, 20, 12, 8),
                'cities' => array('New York' => 100, 'Chicago' => 70)
            ),
            array(
                'id' => 8,
                'first_name' => 'Susan',
                'surname' => 'Downe',
                'age' => 28,
                'gender' => 'female',
                'connections' => array(7),
                'cities' => array('Chicago' => 70, 'Dublin' => 80)
            ),
            array(
                'id' => 9,
                'first_name' => 'Jack',
                'surname' => 'Stam',
                'age' => 28,
                'gender' => 'male',
                'connections' => array(12),
                'cities' => array('Chicago' => 70)
            ),
            array(
                'id' => 10,
                'first_name' => 'Amy',
                'surname' => 'Lane',
                'age' => 24,
                'gender' => 'female',
                'connections' => array(5, 11),
                'cities' => array('Paris' => 95, 'Barcelona' => 80, 'Moscow' => 100)
            ),
            array(
                'id' => 11,
                'first_name' => 'Sandra',
                'surname' => 'Phelan',
                'age' => 28,
                'gender' => 'female',
                'connections' => array(5, 10, 19, 20),
                'cities' => array('Dublin' => 75, 'Chicago' => 60, 'Moscow' => 70)
            ),
            array(
                'id' => 12,
                'first_name' => 'Laura',
                'surname' => 'Murphy',
                'age' => 33,
                'gender' => 'female',
                'connections' => array(7, 9, 13, 20),
                'cities' => array('Dublin' => 75, 'Moscow' => 75)
            ),
            array(
                'id' => 13,
                'first_name' => 'Lisa',
                'surname' => 'Daly',
                'age' => 28,
                'gender' => 'female',
                'connections' => array(12, 14, 20),
                'cities' => array('Dublin' => 80)
            ),
            array(
                'id' => 14,
                'first_name' => 'Mark',
                'surname' => 'Johnson',
                'age' => 28,
                'gender' => 'male',
                'connections' => array(13, 15),
                'cities' => array('Dublin' => 80, 'New York' => 90, 'Moscow' => 50)
            ),
            array(
                'id' => 15,
                'first_name' => 'Seamus',
                'surname' => 'Crowe',
                'age' => 24,
                'gender' => 'male',
                'connections' => array(14),
                'cities' => array()
            ),
            array(
                'id' => 16,
                'first_name' => 'Daren',
                'surname' => 'Slater',
                'age' => 28,
                'gender' => 'male',
                'connections' => array(18, 20),
                'cities' => array('Paris' => 95, 'Chicago' => 80, 'Moscow' => 20)
            ),
            array(
                'id' => 17,
                'first_name' => 'Dara',
                'surname' => 'Zoltan',
                'age' => 48,
                'gender' => 'male',
                'connections' => array(18, 20),
                'cities' => array('Moscow' => 30)
            ),
            array(
                'id' => 18,
                'first_name' => 'Marie',
                'surname' => 'D',
                'age' => 28,
                'gender' => 'female',
                'connections' => array(17),
                'cities' => array('Chicago' => 30)
            ),
            array(
                'id' => 19,
                'first_name' => 'Catriona',
                'surname' => 'Long',
                'age' => 28,
                'gender' => 'female',
                'connections' => array(11, 20),
                'cities' => array('Chicago' => 40)
            ),
            array(
                'id' => 20,
                'first_name' => 'Katy',
                'surname' => 'Couch',
                'age' => 28,
                'gender' => 'female',
                'connections' => array(7, 11, 12, 13, 16, 17, 19),
                'cities' => array('Dublin' => 90, 'London' => 90)
            )
        );
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = $this->usersData();

        foreach ($users as $user) {
            User::create($user);
        }

        $this->command->info('Success: Great... Database seeded with success');
    }
}
