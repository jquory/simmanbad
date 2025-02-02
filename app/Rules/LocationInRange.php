<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Log;

class LocationInRange implements Rule
{
    protected $latitude;
    protected $longitude;
    protected $maxDistance;  // in kilometers

    public function __construct($latitude, $longitude, $maxDistance = 0.5)
    {
        $this->latitude = (float)$latitude;
        $this->longitude = (float)$longitude;
        $this->maxDistance = (float)$maxDistance;  // Make distance configurable

        Log::info('LocationInRange Rule Constructed', [
            'latitude' => $this->latitude,
            'longitude' => $this->longitude
        ]);
    }

    public function passes($attribute, $value)
    {
        $userLatitude = (float)request()->input('latitude');
        $userLongitude = (float)request()->input('longitude');

        // Add debugging
        Log::info('Location Check', [
            'config_lat' => $this->latitude,
            'config_lng' => $this->longitude,
            'user_lat' => $userLatitude,
            'user_lng' => $userLongitude,
            'distance' => $this->haversine($this->latitude, $this->longitude, $userLatitude, $userLongitude)
        ]);

        // Validate coordinates are within possible ranges
        if (!$this->isValidCoordinate($userLatitude, $userLongitude) || 
            !$this->isValidCoordinate($this->latitude, $this->longitude)) {
            return false;
        }

        $distance = $this->haversine($this->latitude, $this->longitude, $userLatitude, $userLongitude);

        // Add more detailed logging
        Log::info('Distance calculation', [
            'distance_km' => $distance,
            'allowed' => ($distance <= 0.5 ? 'yes' : 'no')
        ]);
        
        return $distance <= $this->maxDistance;
    }

    public function message()
    {
        return sprintf('Lokasi anda terlalu jauh! Maksimal jarak adalah %d meter.', 
                      $this->maxDistance * 1000);
    }

    private function haversine($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371; // Earth's radius in kilometers

        $latDelta = deg2rad($lat2 - $lat1);
        $lonDelta = deg2rad($lon2 - $lon1);

        $a = sin($latDelta / 2) ** 2 +
             cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
             sin($lonDelta / 2) ** 2;

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $earthRadius * $c;
    }

    private function isValidCoordinate($lat, $lon)
    {
        return is_numeric($lat) && 
               is_numeric($lon) && 
               $lat >= -90 && 
               $lat <= 90 && 
               $lon >= -180 && 
               $lon <= 180;
    }
}