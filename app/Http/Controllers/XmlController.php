<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Storage;

class XmlController extends Controller
{
    public function showReport()
    {
        // Load the XML file from public storage
        $xmlContent = Storage::disk('public')->get('xml/users.xml');

        // Check if the XML content is retrieved successfully
        if (empty($xmlContent)) {
            return back()->withErrors('XML file not found or is empty.');
        }

        // Load the XSLT file from the resources directory
        $xsltContent = file_get_contents(resource_path('views/xsl/user.xslt'));

        // Check if the XSLT content is retrieved successfully
        if (empty($xsltContent)) {
            return back()->withErrors('XSLT file not found or is empty.');
        }

        // Create a DOMDocument for the XML file
        $xml = new \DOMDocument();
        $xml->loadXML($xmlContent);

        // Create a DOMDocument for the XSLT file
        $xslt = new \DOMDocument();
        $xslt->loadXML($xsltContent);

        // Create an XSLT processor and import the stylesheet
        $proc = new \XSLTProcessor();
        $proc->importStylesheet($xslt);

        // Perform the transformation and check for errors
        $html = $proc->transformToXML($xml);
        if ($html === false) {
            return back()->withErrors('XSLT transformation failed.');
        }

        // Return the transformed HTML to the view
        return view('admin.reports', ['html' => $html]);
    }
    
    
    public function fetchXml()
    {
        // Query your database and convert the result to XML format
        // Assuming you're querying the 'users' table for this example
        $users = DB::table('users')->get();

        // Create a new DOMDocument instance to build XML
        $xml = new \DOMDocument('1.0', 'UTF-8');
        $xml->formatOutput = true;

        // Create the root element
        $root = $xml->createElement('users');
        $xml->appendChild($root);

        foreach ($users as $user) {
            $userElement = $xml->createElement('user');
            
            foreach ($user as $key => $value) {
                $element = $xml->createElement($key, htmlspecialchars($value));
                $userElement->appendChild($element);
            }
            
            $root->appendChild($userElement);
        }

        return response($xml->saveXML(), 200)
                ->header('Content-Type', 'application/xml');
    }
}
