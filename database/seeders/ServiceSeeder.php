<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            ['name' => 'Graphic Design'],
            ['name' => 'Web Development'],
            ['name' => 'Mobile App Development'],
            ['name' => 'Content Writing'],
            ['name' => 'Digital Marketing'],
            ['name' => 'SEO Optimization'],
            ['name' => 'Copywriting'],
            ['name' => 'Video Editing'],
            ['name' => 'Photography'],
            ['name' => 'Accounting and Bookkeeping'],
            ['name' => 'House Cleaning'],
            ['name' => 'Plumbing'],
            ['name' => 'Electrical Repairs'],
            ['name' => 'Painting'],
            ['name' => 'Pest Control'],
            ['name' => 'Carpentry'],
            ['name' => 'Appliance Repair'],
            ['name' => 'Landscaping'],
            ['name' => 'Moving and Relocation'],
            ['name' => 'Handyman Services'],
            ['name' => 'Personal Training'],
            ['name' => 'Yoga Classes'],
            ['name' => 'Massage Therapy'],
            ['name' => 'Diet and Nutrition Consulting'],
            ['name' => 'Mental Health Counseling'],
            ['name' => 'Physiotherapy'],
            ['name' => 'Spa Treatments'],
            ['name' => 'Dental Care'],
            ['name' => 'Vision Care'],
            ['name' => 'Home Nursing Services'],
            ['name' => 'Online Tutoring'],
            ['name' => 'Test Preparation'],
            ['name' => 'Language Lessons'],
            ['name' => 'Music Lessons'],
            ['name' => 'Art and Craft Classes'],
            ['name' => 'Coding and Programming Classes'],
            ['name' => 'Business Coaching'],
            ['name' => 'Career Counseling'],
            ['name' => 'Public Speaking Coaching'],
            ['name' => 'Writing Workshops'],
            ['name' => 'IT Support and Maintenance'],
            ['name' => 'Cloud Setup and Management'],
            ['name' => 'Network Installation'],
            ['name' => 'Cybersecurity Consulting'],
            ['name' => 'Data Recovery'],
            ['name' => 'Software Development'],
            ['name' => 'CRM Setup and Training'],
            ['name' => 'Database Management'],
            ['name' => 'Virtual Assistance'],
            ['name' => 'Hardware Repair'],
            ['name' => 'Event Planning'],
            ['name' => 'Catering Services'],
            ['name' => 'DJ and Music Services'],
            ['name' => 'Photography and Videography'],
            ['name' => 'Florist Services'],
            ['name' => 'Lighting and Decor'],
            ['name' => 'Makeup and Hair Styling'],
            ['name' => 'Venue Setup and Cleaning'],
            ['name' => 'Security Services'],
            ['name' => 'Transportation and Logistics']
        ];


        array_map(fn($service) => Service::create($service), $services);
    }
}
