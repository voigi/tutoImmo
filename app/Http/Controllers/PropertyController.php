<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyContactRequest;
use App\Http\Requests\SearchPropertiesRequest;
use App\Mail\PropertyContactMail;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PropertyController extends Controller
{
    public function index(SearchPropertiesRequest $request)
    {
        $query =  Property::query()->orderBy(
            'created_at',
            'asc'
        );
        // dd($request);
        if ($price = $request->validated('price')) {
            $query = $query->where('price', '<=', $price);
        }
        if ($surface = $request->validated('surface')) {
            $query = $query->where('surface', '>=', $surface);
        }
        if ($rooms = $request->validated('rooms')) {
            $query =  $query->where('rooms', '>=', $rooms);
        }
        if ($request->has('title')) {
            $query = $query->where('title', 'like', "%{$request->input('title')}%");
        }


        return view('property.index', [
            'properties' => $query->paginate(16),
            'input' => $request->validated()
        ]);
    }
    public function show(string $slug, Property $property)
    {
        $expectedSlug = $property->getslug();
        if ($slug !== $expectedSlug) {
            return to_route('property.show', ['slug' => $expectedSlug, 'property' => $property]);
        }
        return view('property.show', [
            'property' => $property
        ]);
        
    }
    public function contact (Property $property,PropertyContactRequest $request)
    {
        
        Mail::send(new PropertyContactMail($property,$request->validated()));
        return back()->with('success','Votre email a bien été envoyé');
    }
}
