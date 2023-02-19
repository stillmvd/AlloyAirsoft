<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GamesSeeder extends Seeder
{

    public function run()
    {
        DB::table('games')->insert([
            'name' => 'Woodpecker',
            'linkForIframe' => 'https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d6937.744505265537!2d-78.69070815757044!3d44.04823907288548!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sru!2sru!4v1667375703830!5m2!1sru!2sru',
            'linkForGoogle' => 'https://goo.gl/maps/xgxFBDFYjZ8Dvi4ZA',
            'polygon' => 'Clarington Woods',
            'date' => '2022.10.06',
            'time' => '10:30:00',
            'finished' => '1',
        ]);

        DB::table('infos')->insert([
            'title' => 'Hello mercenaries!',
            'text' => "Our company is extremely interested in renting your services for identification signals on territory hostile to us with a large group of unidentified armed individuals involved in activities and for information about which we Of course we will pay you.

According to our records, you may also be interfered with by our “Colleagues”, do with them at your own discretion, no fines or rewards for You don't have to remove them. To clarify one point, we cannot transfer a group of more than 11 people, so Choose your best fighters and equip as you see fit.  Take with you everything you need, because due to high risks we are not ready to transfer supplies to this territory. You have 24 hours for everything about everything, you will receive your payment at a personal meeting after evacuation from the area.",
            'game_id' => '1001',
        ]);

        DB::table('rules')->insert([
            'title' => 'Main game rules',
            'text' => '- There will be no team in the usual environment, only your group and an unknown number of other similar groups;
- The group can be any size from 2 to 11 people;
- There are no restrictions on equipment and camouflage for a group, the group gathers according to its destination.',
            'game_id' => '1001',
        ]);
        DB::table('rules')->insert([
            'title' => '2. Start of the game and interaction with the hosts',
            'text' => '- Registration takes place at the parking lot, after which the group is allowed to move to their spawn point;
- All players in a single group need to add a host in Messenger to receive tasks directly on the players mobile devices;
- To contact the host, you can use both mobile devices and a pre-installed radio wave;
- The conditions for completing the task will be transmitted to the players using the messenger, until then the conditions of any task will be unknown.',
            'game_id' => '1001',
        ]);
        DB::table('rules')->insert([
            'title' => '3. Injuries',
            'text' => '- The game has a wound system. Those. after the first hit anywhere, the player is considered wounded and must sit on the ground without a death bandage;
- Injured players are allowed to call their own for help;
- A wounded player can be lifted by bandaging any limb;
- The bandage can be removed 60 minutes after application.',
            'game_id' => '1001',
        ]);
        DB::table('rules')->insert([
            'title' => '4. Kill',
            'text' => '- The player is considered dead after a second hit in the status of wounded or with a bandage;
- The player is considered dead after being attacked with a melee weapon in any case.',
            'game_id' => '1001',
        ]);
        DB::table('rules')->insert([
            'title' => '5. Game bans',
            'text' => '- It is forbidden to replenish at the place of arrival at the game / parking lot. Anyone who replenishes / changes equipment automatically disqualifies the entire team;
- Act outside the boundaries of Canadian criminal law;
- Using any pyrotechnics (Grenades, Flares).',
            'game_id' => '1001',
        ]);

        DB::table('games')->insert([
            'name' => 'WinterHunt',
            'linkForIframe' => "https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d8189.281265925786!2d-79.77294934353556!3d44.32309478566562!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2sca!4v1675354287885!5m2!1sen!2sca",
            'linkForGoogle' => 'https://goo.gl/maps/9ZX292V3Gk9DSo2YA',
            'polygon' => 'Barrie Paintball',
            'date' => '2023.02.25',
            'time' => '11:00:00',
        ]);

        DB::table('infos')->insert([
            'title' => 'Greetings Mercenaries!',
            'text' => "Got a message from the distant village, that pays really generous

Muhosransk needs your services.
Our glorious settlement has always been at the center of many events, and now we have managed to scrape together some money to pay for your services.
We should also warn you that our land is located in an extremely cold area. Here an average person cannot stand for more than 2 hours, so rest assured that we will ensure that you can keep your body warm.
Thank you in advance.

Muhosransk Mayor, Tihomir Ivanov

As always - sign yourself up if you want to join the trip, pack yourself however you want, and we'll have some space to rest.",
            'game_id' => '1002',
        ]);

        DB::table('rules')->insert([
            'title' => 'Main game rules',
            'text' => '- After signing in to the game on the field, you aren’t obliged to do anything. You will have many activities and interactions where only you choose what you want to do;
- Due to amount of fields and activities in the game, some rules may be changed. Players will be warned about any changes before entering any field;
- Some actions or decisions players make may have the aftermath, good or bad;
- After sunset, you MUST use a tracer or flash unit, no matter whether you using NVG or NO after entering the main field;',
            'game_id' => '1002',
        ]);
        DB::table('rules')->insert([
            'title' => 'Start of the game and interaction with the hosts',
            'text' => '- Before the game starts, you will receive the file with your optional personal character mission/motivation and patch
- To be able to enter the field, player must take a mission from the bulletin board;
- To contact the host, you can use both mobile devices and a pre-installed radio wave;',
            'game_id' => '1002',
        ]);
        DB::table('rules')->insert([
            'title' => 'Injuries',
            'text' => '- The game has a wound system. After the first hit anywhere, the player is considered wounded and must sit on the ground without a death bandage;
- Injured players are allowed to call their own for help;
- A wounded player can be revived by bandaging any limb;
- Some in-game factions/activities may not have injuries. Players will be warned about this change before entering the field',
            'game_id' => '1002',
        ]);
        DB::table('rules')->insert([
            'title' => 'Kill',
            'text' => '- The player is considered dead after a second hit in the status of wounded or with a bandage;
- The player is considered dead after being attacked with a melee weapon in any case.',
            'game_id' => '1002',
        ]);
        DB::table('rules')->insert([
            'title' => 'Game bans',
            'text' => '- Walk in the wield without tracer or flash unit during the nighttime
- Act outside the boundaries of Canadian criminal law;
- Using any pyrotechnics (Grenades, Flares);',
            'game_id' => '1002',
        ]);

        DB::table('rules')->insert([
            'title' => 'Additional gear ',
            'text' => 'A list of an optional equipment that will give you an access to the additional missions during the game
- Gas mask (Required during cleaning missions)
- Radio (Required during recon missions)',
            'game_id' => '1002',
        ]);
    }

}
