<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Tour;
use App\Models\TypeTour;
use App\Models\Booking;
use App\Models\Review;
use Session;


class HomeController extends Controller
{
    protected $destination;
    protected $tour;
    protected $typeTour;
    protected $booking;

    public function __construct(Destination $destination, Tour $tour, TypeTour $typeTour, Booking $booking, Review $review)
    {
        $this->destination = $destination;
        $this->tour = $tour;
        $this->typeTour = $typeTour;
        $this->booking = $booking;
        $this->review = $review;
    }

    public function index()
    {
        $typeTours = $this->typeTour->getAllTypeTours();
        $destinations = $this->destination->getAllDestinations();
        $tours = $this->tour->getAllTours();
        $review = $this->review;
        return view('homepage', compact('destinations', 'typeTours', 'tours', 'review'));
    }

    public function thanks()
    {
        return view('pages.thankyou');
    }    
    // view list of tour
    public function tour(Request $request) 
    {
        $typeTours = $this->typeTour->getAllTypeTours();
        $tours = $this->tour->getAllTours()->paginate(21);
        if($request->budget_max) {
            $tours = $this->tour->filter($request)->paginate(12);
        }
        $review = $this->review;
        return view('pages.list_tour', compact('typeTours', 'tours', 'review'));
    }

    // view contact
    public function contact()
    {
        return view('pages.contact');
    }

    // view tour detail
    public function tourDetail($slug)
    {
        $tour = $this->tour->getTourBySlug($slug);
        if(!empty($tour)) {
            if(!empty($tour->description)) {
                $tour->description = json_decode($tour->description);
            }
            $toursRelateds = $this->tour->getTourByDestination($tour->destination_id);
            $rating = $this->review->getInfoRating($tour->id);
            $reviews = $this->review;
            // get title both destination and typeTour
            return view('pages.tour_detail', compact('tour', 'toursRelateds', 'rating', 'reviews'));
        }
    }

    // view home search
    public function homeSearch(Request $request)
    {
        $tours = $this->tour->filter($request)->paginate(15);
        $review = $this->review;
        return view('pages.search', compact('tours', 'review'));
    }

    // view checkout
    public function checkout()
    {
        if(Session('Booking')) {
            $booking = Session('Booking');
            return view('pages.checkout', compact('booking'));
        }
    }
}
