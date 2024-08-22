<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                'name' => 'Tech Conference 2024',
                'description' => 'Join industry leaders and technology enthusiasts for a comprehensive overview of the latest innovations in the tech world. This conference will cover emerging trends in AI, blockchain, cybersecurity, and more. Attendees will have the opportunity to participate in workshops, panel discussions, and networking sessions designed to foster collaboration and knowledge sharing.',
                'date' => '2024-09-15',
                'time' => '10:00:00',
                'location' => 'Yangon Convention Center',
            ],
            [
                'name' => 'Laravel Workshop',
                'description' => 'This hands-on workshop is perfect for developers looking to enhance their skills in building web applications with Laravel. The workshop will guide participants through the process of creating a fully functional application, from setup to deployment. Topics include Eloquent ORM, Blade templates, and API development. Ideal for both beginners and experienced developers.',
                'date' => '2024-09-20',
                'time' => '14:00:00',
                'location' => 'Online',
            ],
            [
                'name' => 'Vue.js Meetup',
                'description' => 'An informal gathering of Vue.js enthusiasts aimed at discussing best practices, sharing experiences, and exploring new features in the latest Vue.js release. Whether you’re a seasoned developer or just starting out with Vue, this meetup provides a platform for learning and collaboration in a relaxed environment. Refreshments will be provided.',
                'date' => '2024-10-05',
                'time' => '18:00:00',
                'location' => 'Yangon Tech Hub',
            ],
            [
                'name' => 'Product Launch',
                'description' => 'Be among the first to witness the unveiling of a groundbreaking new software product that promises to revolutionize the way businesses operate. The event will feature a live demo, insights from the development team, and testimonials from early adopters. Attendees will also have the chance to interact with the product team and provide feedback during a Q&A session.',
                'date' => '2024-10-12',
                'time' => '11:00:00',
                'location' => 'Yangon Innovation Center',
            ],
            [
                'name' => 'Upcoming Event',
                'description' => 'This upcoming event is still in the planning stages, but promises to offer unique insights and valuable experiences for those in attendance. Details regarding the theme, speakers, and venue will be announced soon. Stay tuned for more information on what’s sure to be an exciting and informative event.',
                'date' => '2024-11-01',
                'time' => '09:00:00',
                'location' => null,
            ],
            [
                'name' => 'Tech Conference 2024',
                'description' => 'Join industry leaders and technology enthusiasts for a comprehensive overview of the latest innovations in the tech world. This conference will cover emerging trends in AI, blockchain, cybersecurity, and more. Attendees will have the opportunity to participate in workshops, panel discussions, and networking sessions designed to foster collaboration and knowledge sharing.',
                'date' => '2024-09-15',
                'time' => '10:00:00',
                'location' => 'Yangon Convention Center',
            ],
            [
                'name' => 'Laravel Workshop',
                'description' => 'This hands-on workshop is perfect for developers looking to enhance their skills in building web applications with Laravel. The workshop will guide participants through the process of creating a fully functional application, from setup to deployment. Topics include Eloquent ORM, Blade templates, and API development. Ideal for both beginners and experienced developers.',
                'date' => '2024-09-20',
                'time' => '14:00:00',
                'location' => 'Online',
            ],
            [
                'name' => 'Vue.js Meetup',
                'description' => 'An informal gathering of Vue.js enthusiasts aimed at discussing best practices, sharing experiences, and exploring new features in the latest Vue.js release. Whether you’re a seasoned developer or just starting out with Vue, this meetup provides a platform for learning and collaboration in a relaxed environment. Refreshments will be provided.',
                'date' => '2024-10-05',
                'time' => '18:00:00',
                'location' => 'Yangon Tech Hub',
            ],
            [
                'name' => 'Product Launch',
                'description' => 'Be among the first to witness the unveiling of a groundbreaking new software product that promises to revolutionize the way businesses operate. The event will feature a live demo, insights from the development team, and testimonials from early adopters. Attendees will also have the chance to interact with the product team and provide feedback during a Q&A session.',
                'date' => '2024-10-12',
                'time' => '11:00:00',
                'location' => 'Yangon Innovation Center',
            ],
            [
                'name' => 'Upcoming Event',
                'description' => 'This upcoming event is still in the planning stages, but promises to offer unique insights and valuable experiences for those in attendance. Details regarding the theme, speakers, and venue will be announced soon. Stay tuned for more information on what’s sure to be an exciting and informative event.',
                'date' => '2024-11-01',
                'time' => '09:00:00',
                'location' => null,
            ],
        ];

        Event::insert($events);
    }
}
