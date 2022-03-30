<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\Datatables\Datatables;
use Session;
use Carbon\Carbon;
use App\Models\Mail;
use App\Models\Tour;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    public function getDataAjax($request)
    {
        $data = $this->select('*')->latest();
        if($request->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->filter(function ($query) use ($request) {
                    $this->customFilterDataTable($query, $request);
                })
                ->addColumn('fullname', function($data) {
                    $fullname = $data->first_name.' '.$data->last_name;
                    return $fullname;
                })
                ->addColumn('status', function($data) {
                    $data = $this->formatBookingData($data);
                    return $data->status;
                })
                ->addColumn('payment_status', function($data) {
                    $url = route('booking.status_payment', $data->id);
                    return view('admin.elements.status_payment', compact('data', 'url'));
                })
                ->addColumn('action', function($data) {
                    return view('admin.elements.act_booking', ['id' => $data->id]);
                })
                ->rawColumns(['fullname', 'status', 'action', 'payment_status'])
                ->make(true);
        }
    }

    public function customFilterDataTable($query, $request)
    {
        if(!empty($request->search)) {
            $query->where('booking_code', 'like', "%$request->search%")
                  ->orWhere('first_name', 'like', "%$request->search%")
                  ->orWhere('last_name', 'like', "%$request->search%")
                  ->orWhere('phone', $request->search)
                  ->orWhere('email', $request->search);      
        }
        if(!empty($request->status)) {
            $query->where('status', $request->status);
        }
        if(!empty($request->departure_date)) {
            $query->where('departure_date', $request->departure_date);
        }
        if(!empty($request->payment_status)) {
            $query->where('payment_status', $request->payment_status);
        }
    }

    public function createBookingSession($request)
    {
        $this->resetSession();
        $request->session()->put('Booking', $request->all());
    }

    public function resetSession()
    {
        if(Session('Booking')) {
            session()->forget('Booking');
        }
    }

    public function saveRecord($request, $booking)
    {
        try {
            $departure_date = Carbon::createFromFormat('d/m/Y', $booking['departure_date'])->format('Y-m-d');
            $request->request->add(['departure_date' => $departure_date]);
            $request->request->add(['tour_id' => $booking['tour_id']]);
            $request->request->add(['number_people' => $booking['number_people']]);
            $request->request->add(['total_price' => $booking['total_price']]);
            $model = $this->create($request->all());
            $this->generateBookingCode($model->id);
            $this->resetSession();
            $this->sendMailBooking($model->id);
            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }

    public function generateBookingCode($id)
    {
        $model = $this->findOrFail($id);
        $model->booking_code = 'nd-'.str_pad($id, 4, '0', STR_PAD_LEFT);
        $model->save();
    }

    public function sendMailBooking($id)
    {
        $booking = $this->findOrFail($id);
        $booking = $this->formatBookingData($booking);
        $mail = new Mail($booking);
        $mail->sendMail();
    }

    public function getBookingById($id)
    {
        return $this->findOrFail($id);
    }

    public function formatBookingData($booking)
    {
        $booking->departure_date = Carbon::createFromFormat('Y-m-d', $booking['departure_date'])->format('m/d/Y');
        switch ($booking->status) {
            case '2':
                $booking->status = 'Confirmed';
                break;
            case '3':
                $booking->status = 'Cancel';
                break;
            case '4':
                $booking->status = 'Completed';
                break;    
            default:
                $booking->status = 'New';
                break;
        }
        switch ($booking->payment_method) {
            case '1':
                $booking->payment_method = 'Credit Card';
                break;
            case '2':
                $booking->payment_method = 'Paypal';
                break;
            default:
                $booking->payment_method = 'Pay in cash';
                break;
        }
        switch ($booking->payment_status) {
            case '2':
                $booking->payment_status = 'paid';
                break;
            default:
                $booking->payment_status = 'unpaid';
                break;
        }
        return $booking;
    }

    public function changeStatusPaymentAjax($request, $id) 
    {
        $booking = $this->getBookingById($id);
        if($request->ajax()) {
            $booking->payment_status = $request->status;
            $booking->save();
        } 
    }

    public function changeStatus($status, $id)
    {
        $booking = $this->getBookingById($id);
        $booking->status = $status;
        $booking->save();
    }
}
