<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeocodingController extends Controller
{
    public function search(Request $request)
    {
        $validated = $request->validate([
            'text' => ['required', 'string', 'min:3', 'max:150'],
            'limit' => ['nullable', 'integer', 'min:1', 'max: 5']
        ]);

        $apiKey = config('services.geoapify.key');

        if (!$apiKey) {
            return response()->json([
                'message' => 'Geocoding service is not configured.',
            ], 503);
        }

        $response = Http::timeout(10)->get(
            'https://api.geoapify.com/v1/geocode/autocomplete',
            [
                'text' => $validated['text'],
                'limit' => $validated['limit'] ?? 5,
                'filter' => 'countrycode:ph',
                'lang' => 'en',
                'apiKey' => $apiKey,
            ]
        );

        if (!$response->successful()) {
            return response()->json([
                'message' => 'Geocoding provider request failed.',
            ], 502);
        }

        $features = $response->json('features', []);

        $locations = collect($features)
            ->map(function ($feature) {
                $properties = $feature['properties'] ?? [];

                return [
                    'display_name' => $properties['formatted'] ?? null,
                    'lat' => $properties['lat'] ?? null,
                    'lon' => $properties['lon'] ?? null,
                ];
            })
            ->filter(fn ($location) =>
                $location['display_name'] &&
                $location['lat'] !== null &&
                $location['lon'] !== null
            )
            ->values();

        return response()->json($locations);
    }
}
