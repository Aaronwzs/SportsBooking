@extends('layouts.base')

@section('title', 'Admin Reports')

@section('header-title')
    {{ __('Admin Reports') }}
@endsection

@section('content')
    <div>
        <h2>{{ __('Welcome to the Admin Reports!') }}</h2>
        <div id="reportContent">
            <!-- The transformed content will be inserted here -->
        </div>
    </div>

    <script>
        // Function to fetch and apply XSLT transformation
        async function loadXMLAndXSLT() {
            try {
                // Fetch the XML and XSLT files
                //const xmlResponse = await fetch('/fetch-xml');
                const xmlResponse = await fetch('/xml/users.xml');
                const xsltResponse = await fetch('/xsl/users.xslt');

                if (!xmlResponse.ok || !xsltResponse.ok) {
                    throw new Error('Failed to fetch the XML or XSLT file.');
                }

                const xmlText = await xmlResponse.text();
                const xsltText = await xsltResponse.text();

                // Parse the XML and XSLT files
                const parser = new DOMParser();
                const xmlDoc = parser.parseFromString(xmlText, 'text/xml');
                const xsltDoc = parser.parseFromString(xsltText, 'text/xml');

                // Perform XSLT transformation
                const xsltProcessor = new XSLTProcessor();
                xsltProcessor.importStylesheet(xsltDoc);
                const resultDocument = xsltProcessor.transformToFragment(xmlDoc, document);

                // Append the result to the HTML element
                document.getElementById('reportContent').appendChild(resultDocument);

            } catch (error) {
                console.error('Error loading or transforming XML:', error);
                document.getElementById('reportContent').innerHTML = '<p>Failed to load the report.</p>';
            }
        }

        // Call the function to load and display the report
        loadXMLAndXSLT();
    </script>
@endsection
