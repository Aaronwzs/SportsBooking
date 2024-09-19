<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" indent="yes"/>

    <xsl:template match="/">
        <html>
        <head>
            <title>User Report</title>
            <style>
                table {
                    width: 100%;
                    border-collapse: collapse;
                }
                th, td {
                    border: 1px solid #ddd;
                    padding: 8px;
                }
                th {
                    background-color: #f2f2f2;
                }
            </style>
        </head>
        <body>
            <h2>Users Report</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Email Verified At</th>
                    <th>Usertype</th>
                    <th>Created At</th>
                </tr>
                <xsl:for-each select="//table[@name='users']">
                    <tr>
                        <td><xsl:value-of select="column[@name='id']"/></td>
                        <td><xsl:value-of select="column[@name='name']"/></td>
                        <td><xsl:value-of select="column[@name='email']"/></td>
                        <td><xsl:value-of select="column[@name='email_verified_at']"/></td>
                        <td><xsl:value-of select="column[@name='usertype']"/></td>
                        <td><xsl:value-of select="column[@name='created_at']"/></td>
                    </tr>
                </xsl:for-each>
            </table>
        </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
