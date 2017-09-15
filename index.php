<?php
/*
 * This one reads urls from CSV list
 * and outputs the sitemap.xml
 *
 * Upload a csv file with all the urls on each line to process it into sitemap xml format.
 *
 * Author : Greg Colley
 * Date : 15/09/2017
 *
 */
if (empty($_FILES['uploaded_file'])) {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Upload your csv file to convert it into a sitemap.xml file</title>
        </head>
        <body>
            <form enctype="multipart/form-data" action="" method="POST">
                <p>Upload your file</p>
                <input type="file" name="uploaded_file"></input>
                <input type="submit" value="Process"></input>
            </form>
        </body>
    </html>
    <?php
} else {

    if ($_FILES['uploaded_file']['error'] == UPLOAD_ERR_OK               //checks for errors
            && is_uploaded_file($_FILES['uploaded_file']['tmp_name'])) { //checks that file is uploaded
        $fileUploaded = file_get_contents($_FILES['uploaded_file']['tmp_name']);

        $i = 0;

        $file = preg_split('/\s+/', $fileUploaded);

        // Write the sitemap.xml headers

        $nlcr = "\n";

        $xmlFile = "<?xml version=\"1.0\" encoding=\"utf-8\"?>$nlcr";
        $xmlFile .= "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">$nlcr";

        foreach ($file as $currentLine) {

            if (strlen(trim($currentLine))) {
                $xmlFile .= "<url>$nlcr";
                $xmlFile .= "	<loc>" . trim($currentLine) . "</loc>$nlcr";
                $xmlFile .= "	<lastmod>" . date('c') . "</lastmod>$nlcr";
                $xmlFile .= "	<changefreq>weekly</changefreq>$nlcr";
                $xmlFile .= "	<priority>1.0</priority>$nlcr";
                $xmlFile .= "</url>$nlcr";
            }

            $i++;
        }
        
        $xmlFile .= "</urlset>$nlcr";

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="sitemap.xml"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');

        file_put_contents("php://output", $xmlFile);
    } else {
        die('Error on the file');
    }
}
?>