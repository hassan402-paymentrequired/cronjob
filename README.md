$offer = $provider->serviceOffer()->create([
            'price' => $request->price,
            'description' => $request->description,
            'image' => $path,
            'service_id' => $request->service
        ]);



Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation]  $table->foreignId('client_id')->constrained('users')->onDelete('cascade');
        $table->foreignId('provider_id')->constrained()->onDelete('cascade');
        $table->foreignId('service_id')->constrained()->onDelete('cascade');
        $table->date('booking_date');
        $table->time('start_time');
        $table->time('end_time');
        $table->enum('status', ['pending', 'completed', 'canceled'])->default('pending');
        

## Code of Conduct


<!-- get all service belong to a provider -->
$services = DB::table('provider_service')
    ->where('provider_id', $providerId)
    ->join('services', 'provider_service.service_id', '=', 'services.id')
    ->select('services.name', 'provider_service.price', 'provider_service.description', 'provider_service.availability')
    ->get();


<!-- add service to a provider -->
DB::table('provider_service')->insert([
    'provider_id' => $providerId,
    'service_id' => $serviceId,
    'price' => 500,
    'description' => 'Custom service description',
    'availability' => json_encode(['Mon' => '9-5', 'Tue' => '10-4']),
]);

