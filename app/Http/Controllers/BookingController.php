<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleXMLElement;
use App\Models\Booking;
class BookingController extends Controller
{
    public function exportXml()
    {
        // Fetch data from the database
        $data = DB::table('booking')->get();
        
        // Create a new XML document
        $xml = new SimpleXMLElement('<database/>');
        $xml->addAttribute('name', 'sport_venue_booking');
        
        // Add table element
        $table = $xml->addChild('table');
        $table->addAttribute('name', 'users');
        
        // Iterate over the data and add it to the XML
        foreach ($data as $row) {
            $rowElement = $table->addChild('row');
            foreach ($row as $key => $value) {
                $rowElement->addChild($key, htmlspecialchars($value));
            }
        }

        // Return XML response
        return response($xml->asXML(), 200)->header('Content-Type', 'application/xml');
    }

    public function approve($id)
    {
        $booking = Booking::find($id);
        if ($booking) {
            $booking->status = 1; // Set status to approved
            $booking->save();
        }
        return redirect()->route('admin.booking')->with('status', 'Booking approved!');
    }

    public function reject($id)
    {
        $booking = Booking::find($id);
        if ($booking) {
            $booking->status = 2; // Set status to rejected
            $booking->save();
        }
        return redirect()->route('admin.booking')->with('status', 'Booking rejected!');
    }
}