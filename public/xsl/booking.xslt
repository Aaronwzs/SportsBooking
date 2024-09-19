<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" indent="yes"/>
    
    <xsl:template match="/">
        <html>
        <head>
            <title>Booking List</title>
            <style>
                table {
                    width: 100%;
                    border-collapse: collapse;
                }
                table, th, td {
                    border: 1px solid black;
                }
                th, td {
                    padding: 10px;
                    text-align: left;
                }
            </style>
        </head>
        <body>
            <h1>Booking Data</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ref Code</th>
                        <th>User ID</th>
                        <th>Facility ID</th>
                        <th>Booking Date</th>
                        <th>Time From</th>
                        <th>Time To</th>
                        <th>Status</th>
                        <th>Date Created</th>
                        <th>Date Updated</th>
                    </tr>
                </thead>
                <tbody>
                    <xsl:for-each select="database/table/row">
                        <tr>
                            <td><xsl:value-of select="id"/></td>
                            <td><xsl:value-of select="ref_code"/></td>
                            <td><xsl:value-of select="user_id"/></td>
                            <td><xsl:value-of select="facility_id"/></td>
                            <td><xsl:value-of select="booking_date"/></td>
                            <td><xsl:value-of select="time_from"/></td>
                            <td><xsl:value-of select="time_to"/></td>
                            <td><xsl:value-of select="status"/></td>
                            <td><xsl:value-of select="date_created"/></td>
                            <td><xsl:value-of select="date_updated"/></td>
                        </tr>
                    </xsl:for-each>
                </tbody>
            </table>
        </body>
        </html>
    </xsl:template>
</xsl:stylesheet>